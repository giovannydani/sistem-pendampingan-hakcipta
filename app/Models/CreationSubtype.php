<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreationSubtype extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'type_id',
        'name',
    ];

    public function Type()
    {
        return $this->belongsTo(CreationType::class, 'type_id');
    }
}
