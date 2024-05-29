<?php

// Define your routes here
$routes = [
    'GET /payment/form' => 'PaymentController@showPaymentForm',
    'POST /payment/process' => 'PaymentController@processPayment',
    'GET /payment/callback' => 'PaymentController@handleCallback',
];

?>
