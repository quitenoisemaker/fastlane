<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    //
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
}
