<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplicationType extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $appends = ['is_deleted'];

    protected $fillable = [
        'name',
    ];

    protected function isDeleted(): Attribute
    {
        $data = false;

        if ($this->deleted_at) {
            $data = true;
        }

        return Attribute::make(
            get: fn ($value) => $data,
        );
    }
}
