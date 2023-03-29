<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function transports(): HasOne
    {
        return $this->hasOne(Transport::class);
    }
}
