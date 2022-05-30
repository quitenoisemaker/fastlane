<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    public function showtime()
    {
        return $this->belongsTo(Showtime::class, 'showtime_id');
    }
}
