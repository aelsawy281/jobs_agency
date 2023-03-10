@extends('adminlte::page')

@section('title', 'Create Package')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Packages List </h1>
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
                        <h4>Packages List                           
                              <a href="{{ route('create_package') }}" class="btn btn-primary float-right">Package Create</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Package Name</th>
                                    <th>Price</th>
                                    <th>Number Of Ads</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        foreach($packages as $package)
                                        {
                                    
                                            ?>
                                            <tr>
                                                <td>{{$package['id'] }}</td>
                                                <td>{{$package['title'] }}</td>
                                                <td>{{$package['price'] }} </td>
                                                <td>{{$package['number_of_ads'] }}</td>
                                                <td>
                                                    <a href="" class="btn btn-info btn-sm">View</a>
                                                    <a href="{{ route('package_edit',$package->id ) }}" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="{{ route('package_delete',$package->id) }}" method="POST" class="d-inline">
                                                        {{ method_field('delete')}}
                                                        @csrf
                                                        <button type="submit" name="delete_book" value="{{$package['id']}}" class="btn btn-danger btn-sm">Delete</button>
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