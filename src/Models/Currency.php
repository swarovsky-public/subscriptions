<?php

namespace Swarovsky\Subscriptions\Models;

use Swarovsky\Core\Models\AdvancedModel;

/**
 * Class Currency
 * @package Swarovsky\Subscriptions\Models
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property string $symbol
 */
class Currency extends AdvancedModel{
    protected $fillable = ['name', 'short_name', 'symbol'];
}
