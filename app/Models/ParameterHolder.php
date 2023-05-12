<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParameterHolder extends Model
{
    use HasFactory, HasUuids;

    public static function count()
    {
        return self::all('id')->count();
    }

    protected $appends = ['indonesian'];

    protected $fillable = [
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
    ];

    public function nationality()
    {
        return $this->belongsTo(Country::class ,'nationality_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class ,'country_id');
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

    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class, 'subdistrict_id');
    }

    protected function indonesian(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->country_id == "8d1458c5-dde2-3ac3-901b-29d55074c4ec",
        );
    }
}
