<?php

namespace Swarovsky\Subscriptions\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Swarovsky\Core\Models\AdvancedModel;
use Swarovsky\Core\Models\User;

/**
 * Class UserPaymentMethod
 * @package Swarovsky\Subscriptions\Models
 * @property int $id
 * @property int $user_id
 * @property User $user
 * @property int $payment_provider_id
 * @property PaymentProvider $payment_provider
 *
 */
class UserPaymentMethod extends AdvancedModel
{
    protected $fillable = ['user_id', 'provider_model', 'provider_user_data_id'];
    protected $relations = ['user_id' => User::class, 'payment_provider_id' => PaymentProvider::class];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function payment_provider(): BelongsTo
    {
        return $this->belongsTo(PaymentProvider::class);
    }
}
