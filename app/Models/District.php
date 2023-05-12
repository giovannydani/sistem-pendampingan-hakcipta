<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory, HasUuids;

    
    protected $fillable = [
        'province_id',
        'number',
        'name',
    ];

    public function Province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function subdistricts()
    {
        return $this->hasMany(Subdistrict::class, 'district_id');
    }
}
