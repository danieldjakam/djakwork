<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('\App\Models\Role');
    }

    public function likes()
    {
        return $this->belongsToMany('\App\Models\Job');
    }

    public function jobs()
    {
        return $this->hasMany('\App\Models\Job');
    }

    public function proposals()
    {
        return $this->hasMany('\App\Models\Proposal');
    }

    public function conversations(){
        return Conversation::where(function($q){
            return $q->where('sender', $this->id)
                    ->orWhere('receiver', $this->id);
        });
    }

    public function getConversations()
    {
        return $this->conversations()->first()->latest()->get();
    }
}
