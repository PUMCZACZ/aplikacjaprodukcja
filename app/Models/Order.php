<?php
namespace App\Models;

use App\Money;
use App\OrderTypeEnum;
use App\Services\CostService;
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
 * @property Carbon|null   completed_at
 * @property Carbon        updated_at
 * @property Carbon        created_at
 * @property Carbon        deadline
 * @property int           admin_id
 * @property float         packing_cost
 */
class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'order_type'   => OrderTypeEnum::class,
        'completed_at' => 'datetime',
        'deadline'     => 'datetime',
    ];

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function isCompleted(): bool
    {
        return $this->completed_at !== null;
    }

    public function priceToDolars(): string
    {
        return Money::centsToFloat($this->price);
    }

    public function recalculatePrices(): void
    {
        if ($this->isCompleted()) {
            return;
        }

        /** @var CostService $costService */
        $costService = app(CostService::class);

        $this->update([
            'packing_cost' => $costService->getPackingCost($this),
            'price'        => $costService->price($this),
        ]);
    }
}
