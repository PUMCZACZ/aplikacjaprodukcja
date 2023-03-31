<?php
namespace App\Models;

use App\CompanyTagEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int id
 * @property string name_of_company
 * @property CompanyTagEnum tag
 * @property int phone_number
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

//    protected $casts = [
//        'created_at' => Carbon::class,
//        'updated_at' => Carbon::class,
//    ];

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function transports(): HasOne
    {
        return $this->hasOne(Transport::class);
    }
}
