<?php
namespace Swarovsky\Subscriptions\Vendor\Stripe;

use Carbon\Traits\Timestamp;

/**
 * Class PaymentIntent
 * @package Swarovsky\Subscriptions\Vendor\Stripe
 */
class PaymentIntent{
    private string $id;
    private string $object;
    private int $amount;
    private int $amount_capturable;
    private int $amount_received;
    private string $application;
    private int $application_fee_amount;
    private Timestamp $canceled_at;
    private string $cancellation_reason;
    // private ENUM $capture_method;
   // private pbkect $charges
    private string $client_secret;
    // private ENUM $confirmation_method;
    private Timestamp $created;
    private string $currency; #shortname
    private string $payment_method;

    private object $payment_method_options;
    private array $payment_method_types;




}
/*

"customer": null,
"description": null,
"invoice": null,
"last_payment_error": null,
"livemode": false,
"metadata": {},
"next_action": null,
"on_behalf_of": null,
"receipt_email": null,
"review": null,
"setup_future_usage": null,
"shipping": null,
"statement_descriptor": null,
"statement_descriptor_suffix": null,
"status": "requires_payment_method",
"transfer_data": null,
"transfer_group": null

}
