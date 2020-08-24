<?php

namespace Swarovsky\Subscriptions\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Swarovsky\Core\Models\AdvancedModel;
use Swarovsky\Core\Models\User;

/**
 * Class UserSubscription
 * @package Swarovsky\Subscriptions\Models
 * @property int $id
 * @property int $user_id
 * @property User $user
 * @property int $subscription_id
 * @property Subscription $subscription
 * @property int $user_payment_method_id
 * @property UserPaymentMethod $user_payment_method
 * @property bool $is_paid
 * @property Timestamp $payment_next_try_date
 * @property int $payment_tries
 * @property bool $automatically_renew
 * @property Timestamp $next_billing_at
 */
class UserSubscription extends AdvancedModel
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'provider_model', 'provider_user_data_id'];
    protected $relations = [
        'user_id' => User::class,
        'subscription_id' => Subscription::class,
        'user_payment_method_id' => UserPaymentMethod::class
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    public function user_payment_method(): HasOne
    {
        return $this->hasOne(UserPaymentMethod::class);
    }
}
