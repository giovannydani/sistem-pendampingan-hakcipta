<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentHakcipta extends Model
{
    use HasFactory;

    protected $fillable = [
        'detail_hakcipta_id',
        'comment',
    ];

    public function hakcipta()
    {
        return $this->belongsTo(DetailHakcipta::class, 'detail_hakcipta_id');
    }
}
