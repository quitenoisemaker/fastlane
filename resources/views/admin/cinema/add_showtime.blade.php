@extends('layouts.app')

@section('content')
<div class="container">
    <div><h2>Create showtimes For this cinema</h2></div>
    <div class="p-2">
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-id="">Add Showtime</button>
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
                      </tr>
                    </thead>
                    <tbody>
                            @if (count($showtimes)>0)
                                @foreach ($showtimes as $showtime)
                                        <tr>
                                            <td>{{$showtime->created_at->diffForHumans()}}</td>
                                            <td>{{ucfirst($showtime->session)}}</td>
                                            <td>{{\Carbon\Carbon::parse($showtime->start_time)->format('h:s a')}}</td>
                                        </tr>
                                @endforeach
                                    @else
                                        {{'List empty, please click on the add button to add showtime to cinema'}}
                            @endif
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection

 <!--  modal content -->
 <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Create Showtime </h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{ route('showtime.store') }}" class="myForm">
                            @csrf 
                            <div class="form-row">
                                <input type="hidden" name="cinema_id" value="{{$cinema->id}}">
                                <div class="form-group col-md-6">
                                    <label for="name">Session<span class="text-danger">*</span></label>
                                    <select class="form-control" name="session">
                                        <option value="" selected disabled>Select session</option>
                                        <option value="morning"> Morning</option>
                                        <option value="afternoon"> Afternoon</option>
                                        <option value="evening"> Evening</option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="time">Time</label>
                                    <input type="time" class="form-control" name="time" id="time">
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
{{-- Modal End --}}