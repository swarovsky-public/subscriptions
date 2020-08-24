<?php
return [
    'endpoints' => [
        'payment_intent' => [
            'create' => '/v1/payment_intents', #POST
            'get' => '/v1/payment_intents/:id', #GET
            '/v1/payment_intents/:id', #POST
            '/v1/payment_intents/:id/confirm', #GET
            '/v1/payment_intents/:id/capture', #POST
            '/v1/payment_intents/:id/cancel', #POST
            '/v1/payment_intents' #GET
        ]
    ]


];
