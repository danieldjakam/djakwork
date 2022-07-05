<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $fillable = ['receiver', 'sender', 'job_id'];


    public function messages()
    {
        return $this->hasMany('\App\Models\Message');
    }

    public function job()
    {
        return $this->belongsTo('\App\Models\Job');
    }
}
