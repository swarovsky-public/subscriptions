<?php

namespace Swarovsky\Subscriptions\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Swarovsky\Core\Models\AdvancedModel;
use Swarovsky\Core\Models\User;

/**
 * Class PaymentProvider
 * @package Swarovsky\Subscriptions\Models
 * @property int $id
 * @property string $name
 */
class PaymentProvider extends AdvancedModel
{
    protected $fillable = ['name'];
}
