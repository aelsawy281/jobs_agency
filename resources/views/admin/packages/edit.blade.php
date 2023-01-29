@extends('adminlte::page')

@section('title', 'Create Package')

@section('content_header')
    <h1>Create Package</h1>
@stop

@section('content')
  


  
    <div class="container mt-5">
        <div class="row">
            
                    <div class="card-body">
                        <form action="{{ route('package_update',$package->id ) }}" method="POST">
@csrf
                            <div class="mb-3">
                                <label>Package Name</label>
                                <input type="text" name="name" class="form-control" value ={{ $package->title }}>
                                @if ($errors->has('name'))
                       <div class="error">
                           {{ $errors->first('name') }}
                       </div>
                              @endif
                            </div>

                            <div class="mb-3">
                                <label>Package Description</label>
                                <textarea class="form-control" name="desc" cols="50" rows="10">{{ $package->desc }}</textarea>
                                @if ($errors->has('desc'))
                                <div class="error">
                                    {{ $errors->first('desc') }}
                                </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label>Number of ads</label>
                                <input type="number" name="number_of_ads" class="form-control"  value ={{ $package->number_of_ads }}>
                                @if ($errors->has('number_of_ads'))
                                <div class="error">
                                    {{ $errors->first('number_of_ads') }}
                                </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label>Package Price</label>
                                <input type="number" name="price" class="form-control" step=.0000000000001 value ={{ $package->price }}>
                                @if ($errors->has('price'))
                                <div class="error">
                                    {{ $errors->first('price') }}
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