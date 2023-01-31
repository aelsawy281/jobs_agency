@extends('adminlte::page')

@section('title', 'Create Package')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Jobs List </h1>
    @if(session()->has('success'))
    <div class="alert alert-success float-right">
        <span>{{ session()->get('success') }}</span>
    </div>
@endif
</div>
@stop

@section('content')
  


  
  

  
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Jobs List                           
                              <a href="{{ route('create_job') }}" class="btn btn-primary float-right">Job Create</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Job Name</th>
                                    <th>Speciality</th>
                                    <th>Created by</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        foreach($jobs as $job)
                                        {
                                          
                                            ?>
                                            <tr>
                                                <td>{{$job['id'] }}</td>
                                                <td>{{$job['title'] }}</td>
                                                <td>{{$job->speciality->name }} </td>
                                                <td>{{$job->user->name  }}</td>
                                                <td>
                                                    <a href="" class="btn btn-info btn-sm">View</a>
                                                    <a href="{{ route('job_edit',$job->id ) }}" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="{{ route('job_delete',$job->id) }}" method="POST" class="d-inline">
                                                        {{ method_field('delete')}}
                                                        @csrf
                                                        <button type="submit" name="delete_job" value="{{$job['id']}}" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop