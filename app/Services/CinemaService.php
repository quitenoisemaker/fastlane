<?php

namespace App\Services;

use App\Models\Cinema;

class CinemaService
{
    public function getListCinema()
    {
        # code...
        $cinemas = Cinema::all();
        return $cinemas;
    }

    public function createCinema($request)
    {
        # code...
        $cinema = new Cinema;
        $cinema->name = $request->name;
        $cinema->desc = $request->description;
        $cinema->save();
        return $cinema;
    }
}
