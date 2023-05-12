<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreationType extends Model
{
    use HasFactory, HasUuids;

    
    protected $fillable = [
        'name',
    ];

    public function subtypes()
    {
        return $this->hasMany(CreationSubtype::class, 'type_id');
    }
}
