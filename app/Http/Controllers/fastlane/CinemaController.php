<?php

namespace App\Http\Controllers\fastlane;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCinemaRequest;
use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\CreateShowtimeRequest;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Showtime;
use App\Services\CinemaService;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CinemaService $listCinema)
    {
        //
        $cinemas = $listCinema->getListCinema();
        return view('admin.cinema.index', compact('cinemas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCinemaRequest $request, CinemaService $cinema)
    {
        //
        $cinema->createCinema($request);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cinema = Cinema::findOrFail($id);
        $showtimes = $cinema->showtimes;
        $movies = $cinema->movies;;
        return view('admin.cinema.show', compact('cinema', 'movies', 'showtimes'));
    }

    public function getShowtimeToCinema($id)
    {
        # code...
        $cinema = Cinema::findOrFail($id);
        $showtimes = Showtime::where('cinema_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.cinema.add_showtime', compact('cinema', 'showtimes'));
    }

    public function showtimeStore(CreateShowtimeRequest $request, CinemaService $showtime)
    {
        # code...
        $showtime->createCinemaShowtime($request);
        return back();
    }

    public function movieStore(CreateMovieRequest $request, CinemaService $movie)
    {
        # code...
        $movie->createCinemaMovie($request);
        return back();
    }
}
