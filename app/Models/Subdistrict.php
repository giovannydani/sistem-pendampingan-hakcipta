<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    use HasFactory, HasUuids;

    
    protected $fillable = [
        'district_id',
        'name',
    ];

    public function District()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
