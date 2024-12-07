<!DOCTYPE html>
<html>
<head>
    <title>{{ $game->title }}</title>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
      <style>
         body,
         html {
         position: fixed;
         } 
      </style>
   <script>
        function injectCSS() {
            var iframe = document.getElementById('game');
            var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;

            var style = document.createElement('style');
            style.type = 'text/css';
            var css = `
                html, body {
                    background-color: transparent;
                }
                #Desktop, #Desktop body {
                    display:flex;
                    align-items: center;
                    justify-content: center;
                }
                canvas {
                   max-width: 1300px;
                   height: auto
                }
            `;

            style.appendChild(document.createTextNode(css));

            // Append <style> element to iframe's <head>
            iframeDocument.head.appendChild(style);
        }
    </script>
</head>



<body onload="injectCSS()"  style="display:flex;    justify-content: center;     align-items: center;margin:0px;width:100%;background-color:black;overflow:hidden">

<script>

    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }
	
var exitUrl='';
		if(document.location.href.split("api_exit=")[1]!=undefined){
		exitUrl=document.location.href.split("api_exit=")[1].split("&")[0];
		}	
addEventListener('message',function(ev){
	
if(ev.data=='CloseGame'){
	
if(window != window.top || document != top.document || self.location != top.location){
var isFramed = false;
try {
	isFramed = window != window.top || document != top.document || self.location != top.location;
} catch (e) {
	isFramed = true;
}

if(isFramed ){
window.parent.postMessage('CloseGame',"*");	
}		
window.parent.postMessage({
    'func': 'parentFunc',
    'message': 'close'
}, "*");
	
}else{
document.location.href=exitUrl;	
}	
	
	
}
	
	});
</script>

<iframe id='game' style="margin:0px;border:0px;width:1300px;height:100vh;max-width:100%" src='/games/PirateIG/index.html?curr=@if( auth()->user()->present()->shop ){{ auth()->user()->present()->shop->currency }}@endif&lang=en' allowfullscreen>


</iframe>




</body>
<script>
	function	FormatViewport(){
	
var gm=document.getElementById("game");	

gm.style['height']=window.innerHeight+'px';	
	
}
	
	
window.onresize=FormatViewport;	
FormatViewport();	
</script>
</html>
