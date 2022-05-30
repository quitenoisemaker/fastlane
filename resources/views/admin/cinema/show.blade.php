@extends('layouts.app')

@section('content')
<div class="container">
    <div><h2>Create Movies For this cinema</h2></div>
    <div class="p-2">
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-id="">Add Movie</button>
    </div>
    <div class="row justify-content-center">
        {{-- show errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        {{-- end --}}
        
        <div class="col-md-8">
            <div class="card text-center">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Date created</th>
                        <th scope="col">Session</th>
                        <th scope="col">Time</th>
                        <th scope="col">Title</th>
                        <th scope="col">Genre</th>
                      </tr>
                    </thead>
                    <tbody>
                            @if (count($movies)>0)
                                @foreach ($movies as $movie)
                                    <tr>
                                
                                        <td>{{$movie->created_at->diffForHumans()}}</td>
                                        <td>{{$movie->showtime->session}}</td>
                                        <td>{{\Carbon\Carbon::parse($movie->showtime->start_time)->format('h:s a')}}</td>
                                
                                        <td>{{$movie->title}}</td>
                                        <td>{{$movie->genre}}</td>
                                    </tr>
                                @endforeach
                                @else
                                {{'List empty, please click on the add button to add Movie to cinema'}}
                            @endif
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection

 <!-- modal content -->
 <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Create Movie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{ route('movie.store') }}" class="myForm">
                            @csrf 
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    <input type="title" class="form-control" name="title" id="title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="genre">Genre</label>
                                    <select class="form-control" name="genre">
                                        <option value="" selected disabled>Select Movie Genre</option>
                                        <option value="Drama"> Drama</option>
                                        <option value="Action"> Action</option>
                                        <option value="Horror"> Horror</option>
                                        <option value="Comedy"> Comedy</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="showtime">Session<span class="text-danger">*</span></label>
                                    <select class="form-control" name="showtime_id">
                                        <option value="" selected disabled>Select session</option>
                                        @if (count($showtimes)>0)
                                            @foreach ($showtimes as $showtime)
                                                <option value="{{$showtime->id}}">{{ucfirst($showtime->session)}} {{\Carbon\Carbon::parse($showtime->start_time)->format('h:s a')}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal Ends --}}