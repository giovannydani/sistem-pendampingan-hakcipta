<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\AjuanStatus;
use App\Enums\UserRole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// class User extends Authenticatable
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'role' => AsEnumCollection::class.':'.UserRole::class,
        'role' => UserRole::class,
    ];

    public function isAdmin() : Attribute
    {
        return Attribute::make(
            get: fn () => $this->role->isAdmin(),
        );
    }

    public function isUser() : Attribute
    {
        return Attribute::make(
            get: fn () => $this->role->isUser(),
        );
    }

    public function scopeUser(Builder $query): void
    {
        $query->where('role', UserRole::USER->value);
    }

    public function scopeAdmin(Builder $query): void
    {
        $query->where('role', UserRole::ADMIN->value);
    }

    public function scopeAdminAndSuperAdmin(Builder $query): void
    {
        $query->whereIn('role', [UserRole::ADMIN->value, UserRole::SUPERADMIN->value]);
    }

    public function scopeVerified(Builder $query): void
    {
        $query->where('email_verified_at', '!=', null);
    }

    public function hasNotVerifiedEmail() : bool
    {
        return $this->email_verified_at != NULL;
    }
    
    public function applications()
    {
        return $this->hasMany(DetailHakcipta::class, 'owner_id')->where('is_submited', 1);
    }
    
    public function applications_finish()
    {
        return $this->hasMany(DetailHakcipta::class, 'owner_id')->where('status', AjuanStatus::Finish->value)->where('is_submited', 1);
    }
    
    public function applications_process()
    {
        return $this->hasMany(DetailHakcipta::class, 'owner_id')->where('status', AjuanStatus::AdminProcess->value)->where('is_submited', 1);
    }
    
    public function applications_revision()
    {
        return $this->hasMany(DetailHakcipta::class, 'owner_id')->where('status', AjuanStatus::Revision->value)->where('is_submited', 1);
    }
}
