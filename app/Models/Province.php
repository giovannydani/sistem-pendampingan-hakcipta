<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'number',
        'name',
    ];

    public function districts()
    {
        return $this->hasMany(District::class, 'province_id');
    }
}
