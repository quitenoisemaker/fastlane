<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    //
    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }

    public function movies()
    {
        return $this->hasManyThrough('App\Models\Movie', 'App\Models\Showtime');
    }
}
