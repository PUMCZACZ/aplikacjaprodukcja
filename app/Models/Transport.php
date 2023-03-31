<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property string name_of_company
 * @property string type_of_product
 * @property Carbon delivered_at
 * @property int product_amount
 * @property int product_price
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property string tag
 * @property Carbon completed_at
 */
class Transport extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function companies(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'name_of_company', 'id');
    }
}
