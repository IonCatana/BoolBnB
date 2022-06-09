<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Place;
use App\Sponsorship;
use Illuminate\Http\Request;

class BraintreeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function token(Request $request, $sponsorship_id, $place_id)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        $token = $gateway->clientToken()->generate(
            // TODO ['customer_id' => generate id???]
        );

        return view('host.payment', compact('token', 'sponsorship_id', 'place_id'));
    }

    public function nonce(Request $request)
    {

    }
}

