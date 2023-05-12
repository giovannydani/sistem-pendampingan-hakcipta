<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatorHakcipta extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'detail_hakcipta_id',
        'name',
        'email',
        'no_telp',
        'nationality_id',
        'address',
        'country_id',
        'province_id',
        'district',
        'district_id',
        'subdistrict_id',
        'postal_code',
        'is_company',
    ];

    public function nationality()
    {
        return $this->belongsTo(Country::class ,'nationality_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function districta()
    {
        return $this->district();
    }

    protected $casts = [
        'no_telp' => 'encrypted',
    ];
}
