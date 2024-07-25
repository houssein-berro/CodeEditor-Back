<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    public function message()
    {
        $this->hasMany(Message::class);
    }

    public function user()
    {
        $this->hasMany(User::class);
    }
   
}
