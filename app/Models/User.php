<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hospital_id',
        'speciality_id',
        'name',
        'username',
        'profile_image',
        'description',
        'address',
        'country',
        'state',
        'zip_code',
        'date_of_birth',
        'gender',
        'age',
        'blood_group',
        'email',
        'mobile',
        'user_type',
        'password',
        'pricing',
        'twitter',
        'facebook',
        'linkedin',
        'pinterest',
        'instagram',
        'youtube',
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
    ];

    // User Types
    public const ADMIN = 'A';
    public const HOSPITAL = 'H';
    public const DOCTOR = 'D';
    public const PATIENT = 'U';
    public const PHARMACY = 'P';

    public function is_admin()
    {
        return $this->user_type == User::ADMIN;
    }
    public function is_hospital()
    {
        return $this->user_type == User::HOSPITAL;
    }
    public function is_doctor()
    {
        return $this->user_type == User::DOCTOR;
    }
    public function is_patient()
    {
        return $this->user_type == User::PATIENT;
    }
    public function is_pharmacy()
    {
        return $this->user_type == User::PHARMACY;
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
    public function education()
    {
        return $this->hasMany(Education::class);
    }
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
