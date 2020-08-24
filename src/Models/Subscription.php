<?php

namespace Swarovsky\Subscriptions\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Swarovsky\Core\Models\AdvancedModel;

/**
 * Class Subscription
 * @package Swarovsky\Subscriptions\Models
 * @property int $id
 * @property string $name
 * @property int $currency_id
 * @property Currency $currency
 * @property int $amount
 * @property int $recursion_in_months
 */
class Subscription extends AdvancedModel
{
    protected $fillable = ['name', 'currency_id', 'amount', 'recursion_in_months'];
    protected $relations = ['currency_id' => Currency::class];

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }
}
