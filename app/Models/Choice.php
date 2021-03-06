<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    protected $table= 'choosen_subjects';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
