@extends('adminlte::page')

@section('title', 'Create Package')

@section('content_header')
    <h1>Create Package</h1>
@stop

@section('content')
  


  
    <div class="container mt-5">
        <div class="row">
            
                    <div class="card-body">
                        <form action="{{ route('job_update',$job->id ) }}" method="POST">
@csrf
                            <div class="mb-3">
                                <label>Job Name</label>
                                <input type="text" name="title" class="form-control" value ={{ $job->title }}>
                                @if ($errors->has('title'))
                       <div class="error">
                           {{ $errors->first('title') }}
                       </div>
                              @endif
                            </div>

                            <div class="mb-3">
                                <label>Job Description</label>
                                <textarea class="form-control" name="desc" cols="50" rows="10">{{ $job->desc }}</textarea>
                                @if ($errors->has('desc'))
                                <div class="error">
                                    {{ $errors->first('desc') }}
                                </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label>Speciality Name</label>
                                <select name="speciality_name"  required class="form-control">
                                    @foreach ($specialty_name as $item )
                                    <option value="{{$item->name}}"> {{$item->name}}</option>
                                    @endforeach   
                            </select>
                                @if ($errors->has('speciality_name'))
                                <div class="error">
                                    {{ $errors->first('speciality_name') }}
                                </div>
                                @endif
                            </div>
                            
                        
                            <div class="mb-3">
                                <button type="submit" name="save_book" class="btn btn-primary">Update Package</button>
                            </div>


                        </form>
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