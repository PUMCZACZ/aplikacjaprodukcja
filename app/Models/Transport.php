<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    use HasFactory;
}
