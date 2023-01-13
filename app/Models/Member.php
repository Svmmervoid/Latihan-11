<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member';
    protected $guarded = [];

    // Relasi ke trainer
    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id', 'id');
    } 
    
}

