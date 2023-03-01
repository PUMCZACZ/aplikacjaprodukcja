<?php
namespace App\Models;

use App\OrderTypeEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int           id
 * @property OrderTypeEnum order_type
 * @property int           client_id
 * @property int           quantity
 * @property int           weight
 * @property int           price
 * @property bool          is_completed
 * @property Carbon        updated_at
 * @property Carbon        created_at
 * @property Carbon        deadline
 * @property int           admin_id
 *
 * @property float         packing_price
 */
class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'order_type' => OrderTypeEnum::class,
    ];

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function priceToDolars(): float
    {
        return $this->price / 100;
    }
}
