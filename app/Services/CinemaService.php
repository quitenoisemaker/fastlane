<?php

namespace App\Services;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Showtime;

class CinemaService
{
    public function getListCinema()
    {
        # code...
        $cinemas = Cinema::orderBy('id', 'DESC')->get();
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

    public function createCinemaShowtime($request)
    {
        # code...
        $showtime = new Showtime();
        $showtime->cinema_id = $request->cinema_id;
        $showtime->session = $request->session;
        $showtime->start_time = $request->start_time;
        $showtime->save();
        return $showtime;
    }
    public function createCinemaMovie($request)
    {
        # code...
        $movie = new Movie;
        $movie->showtime_id = $request->showtime_id;
        $movie->title = $request->title;
        $movie->genre = $request->genre;
        $movie->save();
        return $movie;
    }
}
