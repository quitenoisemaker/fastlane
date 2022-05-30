<?php

namespace App\Http\Controllers\fastlane;

use App\Http\Controllers\Controller;
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
    public function store(Request $request, CinemaService $cinema)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function edit(Cinema $cinema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cinema $cinema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cinema $cinema)
    {
        //
    }

    public function getShowtimeToCinema($id)
    {
        # code...
        $cinema = Cinema::findOrFail($id);
        $showtimes = Showtime::where('cinema_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.cinema.add_showtime', compact('cinema', 'showtimes'));
    }

    public function showtimeStore(Request $request, CinemaService $showtime)
    {
        # code...
        $showtime->createCinemaShowtime($request);
        return back();
    }

    public function movieStore(Request $request, CinemaService $movie)
    {
        # code...
        $movie->createCinemaMovie($request);
        return back();
    }
}
