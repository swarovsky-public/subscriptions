<?php

namespace Swarovsky\Subscriptions\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Swarovsky\Subscriptions\Models\Subscription;
use Swarovsky\Subscriptions\Models\UserPaymentMethod;
use Swarovsky\Subscriptions\Models\UserSubscription;

/**
 * Trait Billable
 * @package Swarovsky\Subscriptions\Traits
 * @property Subscription[] $subscriptions
 * @property UserSubscription[] $user_subscriptions
 * @property UserPaymentMethod[] $payment_methods
 */
Trait Billable
{
    public function subscriptions(): BelongsToMany
    {
        return $this->belongsToMany(
            Subscription::class,
            UserSubscription::class,
            'user_id',
            'subscription_id'
        );
    }

    public function user_subscriptions(): HasMany
    {
        return $this->hasMany(UserSubscription::class);
    }

    public function payment_methods(): HasMany
    {
        return $this->hasMany(UserPaymentMethod::class);
    }

}
