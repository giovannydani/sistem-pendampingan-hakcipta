<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HolderHakcipta extends Model
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
        'district_id',
        'district',
        'subdistrict_id',
        'postal_code',
        'is_company',
        'is_manageable',
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

    public function countMoreThan(int $number)
    {
        // return $this === self::ADMIN || $this === self::SUPERADMIN;
        return self::count('id');
    }

    protected $casts = [
        'no_telp' => 'encrypted',
    ];
}
