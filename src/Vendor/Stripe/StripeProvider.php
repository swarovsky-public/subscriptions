<?php

namespace Swarovsky\Subscriptions\Vendor\Stripe;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Swarovsky\Core\Helpers\SessionHelper;
use Swarovsky\Subscriptions\Models\Currency;

class StripeProvider
{
    protected array $configuration;

    public function __construct()
    {
        $this->configuration = require(__DIR__ . 'config.php');
    }


    public function createPaymentIntent(int $amount, Currency $currency)
    {
        $request = Http::post($this->configuration['endpoints']['payment_intent']['create'], [
            'amount' => $amount,
            'currency' => $currency->short_name,
            "payment_method_types[]" => 'card'
        ])->withBasicAuth(env('STRIPE_SECRET'));

        if($request->successful()){
            $response = $request->json();
            return new PaymentIntent($response);
        }
        if($request->failed()){
            Log::error('Stripe provider, request failed');
        }
        if($request->clientError()){
            Log::error('Stripe provider, client Error');
        }
        if($request->serverError()){
            Log::error('Stripe provider, server Error');
        }
        $request->throw();
    }


}
