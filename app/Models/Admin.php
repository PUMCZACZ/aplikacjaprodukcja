<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $netto_price
 * @property int $brutto_price
 * @property int bag_price
 * @property int bigbag_price
 * @property int loose_price
 * @property int bag_packing_cost_price
 * @property int bigbag_packing_cost_price
 * @property int loose_packing_cost_price
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Admin extends Model
{
    protected $guarded = [];
}
