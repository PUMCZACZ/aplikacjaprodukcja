<?php
namespace App\Models;

use App\OrderTypeEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property OrderTypeEnum order_type
 * @property int client_id
 * @property int quantity
 * @property int price
 * @property bool is_completed
 * @property Carbon updated_at
 * @property Carbon created_at
 * @property Carbon deadline
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

    public function showMoneyInPln(): string
    {
        return $this->price / 100 . " zł";
    }

    public function showQuantity(): string
    {
        return $this->quantity . ' szt';
    }
}
