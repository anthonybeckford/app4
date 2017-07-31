<?php

// Add this route for checkout or submit form to pass the item into paypal

\Route::group(['prefix' => 'paypal', 'namespace' => 'Lib\Paypal\Controllers'], function () {
    Route::any('payment', array(
        'as' => 'payment',
        'uses' => 'PaypalController@postPayment',
    ));

// this is after make the payment, PayPal redirect back to your site
    Route::get('payment/status', array(
        'as' => 'payment.status',
        'uses' => 'PaypalController@getPaymentStatus',
    ));
});

