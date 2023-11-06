<?php

namespace App\Models;

use App\Enums\AjuanStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailHakcipta extends Model
{
    use HasFactory, HasUuids;

    protected $appends = [
        'status_text',
        'is_admin_process',
        'is_revision',
        'is_finish',
        'submited_at',
    ];

    protected $fillable = [
        'number',
        'owner_id',
        'application_type_id',
        'creation_type_id',
        'creation_subtype_id',
        'title',
        'short_description',
        'first_announced_date',
        'first_announced_country_id',
        'first_announced_city',
        'status',
        'is_submited',
    ];

    protected $casts = [
        'number' => 'encrypted',
        'status' => AjuanStatus::class,
        // 'first_announced_date' => 'date:d F Y',
    ];

    public function ApplicationType()
    {
        return $this->belongsTo(ApplicationType::class, 'application_type_id');
    }

    public function CreationType()
    {
        return $this->belongsTo(CreationType::class, 'creation_type_id');
    }
    
    public function CreationSubtype()
    {
        return $this->belongsTo(CreationSubtype::class, 'creation_subtype_id');
    }

    public function FirstAnnouncedCountry()
    {
        return $this->belongsTo(Country::class, 'first_announced_country_id');
    }

    public function attachment()
    {
        return $this->hasOne(AttachmentHakcipta::class, 'detail_hakcipta_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function application_type()
    {
        return $this->belongsTo(ApplicationType::class, 'application_type_id')->withTrashed();
    }

    public function creation_type()
    {
        return $this->belongsTo(CreationType::class, 'creation_type_id');
    }

    public function creation_subtype()
    {
        return $this->belongsTo(CreationSubtype::class, 'creation_subtype_id');
    }

    public function first_announced_country()
    {
        return $this->belongsTo(Country::class, 'first_announced_country_id');
    }

    public function creators()
    {
        return $this->hasMany(CreatorHakcipta::class, 'detail_hakcipta_id');
    }

    public function holders()
    {
        return $this->hasMany(HolderHakcipta::class, 'detail_hakcipta_id');
    }

    public function comments()
    {
        return $this->hasMany(CommentHakcipta::class, 'detail_hakcipta_id');
    }

    public function newcomment()
    {
        return $this->hasOne(CommentHakcipta::class, 'detail_hakcipta_id')->orderBy('created_at', 'desc');
    }

    public function isHolderExist(int $number)
    {
        // return $this === self::ADMIN || $this === self::SUPERADMIN;
        $defaultHolder = ParameterHolder::count();
        if (self::holders()->count() < ($number + $defaultHolder)){
            $result = [
                'status' => false,
                'message' => "Pemegang Hakcipta harus lebih dari ". $number,
            ];
        }else {
            $result = [
                'status' => true,
                'message' => true,
            ];
        }

        return (object) $result;
    }

    public function isCreatorExist(int $number)
    {
        // return $this === self::ADMIN || $this === self::SUPERADMIN;
        if (self::creators()->count() < $number){
            $result = [
                'status' => false,
                'message' => "Pencipta harus lebih dari ". $number,
            ];
        }else {
            $result = [
                'status' => true,
                'message' => true,
            ];
        }
        // return $number;

        return (object) $result;
    }

    protected function statusText(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->status->text(),
        );
    }

    protected function isAdminProcess(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->status->isAdminProcess(),
        );
    }

    protected function isRevision(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->status->isRevision(),
        );
    }

    protected function isFinish(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->status->isFinish(),
        );
    }

    protected function submitedAt(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->updated_at)->format('d-m-Y'),
        );
    }

    public function scopeAdminProcess(Builder $query): void
    {
        $query->where('status', AjuanStatus::AdminProcess->value);
    }

    public function scopeRevision(Builder $query): void
    {
        $query->where('status', AjuanStatus::Revision->value);
    }

    public function scopeFinish(Builder $query): void
    {
        $query->where('status', AjuanStatus::Finish->value);
    }

    public function scopeIsSubmited(Builder $query): void
    {
        $query->where('is_submited', 1);
    }
}
