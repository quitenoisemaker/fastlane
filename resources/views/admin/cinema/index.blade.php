@extends('layouts.app')

@section('content')
<div class="container">
    <div class="p-2">
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-id="">Add Cinema</button>
    </div>
    <div class="row justify-content-center">
        
        
        <div class="col-md-8">
            <div class="card text-center">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Date created</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                            @if (count($cinemas)>0)
                                @foreach ($cinemas as $cinema)
                                    <tr>
                                
                                        <td>{{$cinema->created_at->diffForHumans()}}</td>
                                        <td>{{$cinema->name}}</td>
                                        <td>{{$cinema->desc}}</td>
                                        <td><a href="" class="btn btn-success btn-sm">add showtime</a>
                                            <a href="" class="btn btn-warning btn-sm">View</a></td>
                                    
                                    </tr>
                                @endforeach
                            @else
                          {{'List empty, please click on the add button to add cinema'}}
                        @endif
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection

 <!-- sample modal2 content -->
 <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Create Cinema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{ route('cinema.store') }}" class="myForm">
                            @csrf 
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="name" id="name">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="description"> Description</label>
                                    <input type="text" class="form-control" name="description" id="description">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                          </form>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 