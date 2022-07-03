<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Place;
use App\Sponsorship;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BraintreeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $sponsorship_id, $place_id)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        // qui entra la seconda volta, quando ha gia il token
        if($request->has('nonce')){
            // se l'utente sta pagando entra qui
            $nonceFromTheClient = $request->input('nonce');

            $chosen_sponsorship = Sponsorship::where('id', $sponsorship_id)->first();
            $sponsored_place = Place::where('id', $place_id)->first();

            // il $place already sponsored
            if ($sponsored_place->activeSponsorship() != null) return redirect()->route('host.places.index');

            $result = $gateway->transaction()->sale([
                'amount' => $chosen_sponsorship->price,
                'paymentMethodNonce' => $nonceFromTheClient,
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);

            $sponsored_place->sponsorships()->attach($chosen_sponsorship, [
                'end_time' => Carbon::now()->addHours($chosen_sponsorship->duration)
            ]);

            // TODO payment success view
            return redirect()->route('host.places.index');
        }

        // se ha solo appena scelto (!has(nonce)) la sponsorizzazione va qui
        $token = $gateway->clientToken()->generate(
            // TODO ['customer_id' => generate id???]
        );

        return view('host.payment', compact('token', 'sponsorship_id', 'place_id'));
    }
}

