<?php

namespace App\Http\Controllers;

use BitWasp\Bitcoin\Address\AddressCreator;
use BitWasp\Bitcoin\Key\Factory\PrivateKeyFactory;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CryptoPaymentController extends Controller
{
    // Generate a unique Bitcoin address for the order
    public function createBitcoinAddress($orderId)
    {
        $keyFactory = new PrivateKeyFactory();
        $privateKey = $keyFactory->generateCompressed();
        $publicKey = $privateKey->getPublicKey();

        $addressCreator = new AddressCreator();
        $address = $addressCreator->fromOutputScript($publicKey->getScriptPubKey());

        // Here, save the address to the order record
        $order = Order::find($orderId);
        $order->bitcoin_address = $address->getAddress();
        $order->save();

        return response()->json(['address' => $address->getAddress()]);
    }

    // Generate and display the QR code for the Bitcoin address
    public function showPaymentPage($orderId)
    {
        $order = Order::find($orderId);
        $bitcoinAddress = $order->bitcoin_address;

        return view('crypto.payment', compact('bitcoinAddress'));
    }

    // Monitor payments using BlockCypher API
    public function checkPayment($address)
    {
        $client = new Client();
        $apiKey = env('BLOCKCYPHER_API_KEY');
        
        $response = $client->get("https://api.blockcypher.com/v1/btc/main/addrs/{$address}/balance?token={$apiKey}");
        $data = json_decode($response->getBody(), true);

        // If final_balance is greater than 0, payment has been received
        if ($data['final_balance'] > 0) {
            // Update the order status to "paid"
            $order = Order::where('bitcoin_address', $address)->first();
            $order->status = 'paid';
            $order->save();

            return response()->json(['status' => 'paid']);
        }

        return response()->json(['status' => 'pending']);
    }
}
