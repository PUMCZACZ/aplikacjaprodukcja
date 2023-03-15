<?php
namespace App\Models;

use App\ClientTypeEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string lastname
 * @property string city
 * @property int status
 * @property int phone_number
 * @property ClientTypeEnum type_of_client
 * @property string name_of_company
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'type_of_client' => ClientTypeEnum::class,
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function formatPhoneNumber(): string
    {
        return preg_replace("/^1?(\d{3})(\d{3})(\d{3})$/", "$1-$2-$3", $this->phone_number);
    }
}
