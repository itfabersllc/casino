import React, { useState } from 'react';
import { Button, Collapse, Stack, OutlinedInput, Typography, Alert } from '@mui/material';
import { LoadingButton } from '@mui/lab';
import KeyboardArrowUpIcon from '@mui/icons-material/KeyboardArrowUp';
import KeyboardArrowDownIcon from '@mui/icons-material/KeyboardArrowDown';

const Payment = () => {
    const [depositOption, setDepositOption] = useState(0);
    const [values, setValues] = useState({ crypto: '' });
    const [cryptoLoading, setCryptoLoading] = useState(false);
    const [error, setError] = useState({});
    const [serverError, setServerError] = useState({});

    const handleChange = (field) => (event) => {
        setValues({ ...values, [field]: event.target.value });
    };

    const depositAction = async (method) => {
        setCryptoLoading(true);
        try {
            // Simulate a server request
            await new Promise((resolve) => setTimeout(resolve, 1000));
            // Handle success case here (e.g., reset values, show success message)
        } catch (err) {
            setServerError({ crypto: 'An error occurred during the transaction.' });
        } finally {
            setCryptoLoading(false);
        }
    };

    return (
        <React.Fragment>
            <Button
                sx={{ width: '100%', justifyContent: 'space-between' }}
                endIcon={depositOption === 1 ? <KeyboardArrowUpIcon sx={{ color: '#a9aeb7' }} /> : <KeyboardArrowDownIcon sx={{ color: '#a9aeb7' }} />}
                onClick={() => setDepositOption(depositOption === 1 ? 0 : 1)}
            >
                <Stack direction="row" alignItems="center" justifyContent="space-between" sx={{ width: '100%' }}>
                    <Typography sx={{ color: '#5e6266', fontWeight: 600 }}>Crypto Payment</Typography>
                </Stack>
            </Button>
            <Collapse in={depositOption === 1} timeout="auto" unmountOnExit>
                <Stack sx={{ my: 2 }} spacing={2}>
                    <Stack direction="row" alignItems="center" justifyContent="space-between">
                        <Button className="btn success" sx={{ width: '40%' }}>$EUR ETC</Button>
                        <OutlinedInput
                            type="number"
                            placeholder="Enter Amount"
                            value={values.crypto}
                            onChange={handleChange('crypto')}
                            sx={{
                                '& fieldset': { display: 'none' },
                                '& input': {
                                    bgcolor: '#edf0f7',
                                    color: '#070c19cc',
                                    padding: 2,
                                    borderRadius: '12px',
                                    fontSize: '12px',
                                    '&:-webkit-autofill': {
                                        WebkitBoxShadow: 'unset',
                                        WebkitTextFillColor: '#070c19cc',
                                        borderRadius: '12px',
                                    }
                                }
                            }}
                        />
                    </Stack>
                    {error.crypto && (
                        <Alert variant="outlined" severity="warning" sx={{ mt: 1, borderRadius: 2, py: 0 }}>
                            {serverError.crypto ? serverError.crypto : 'Please enter the correct amount.'}
                        </Alert>
                    )}
                    <LoadingButton
                        loading={cryptoLoading}
                        className="btn success"
                        sx={{ mb: 2, padding: 3, fontSize: 18, width: '100%', borderRadius: '10px' }}
                        onClick={() => depositAction('crypto')}
                    >
                        {cryptoLoading ? '' : 'Pay Balance'}
                    </LoadingButton>
                </Stack>
            </Collapse>
        </React.Fragment>
    );
};

export default Payment;
