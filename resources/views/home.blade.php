@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <strong class="bold"> {{ Auth::user()->name}}</strong></div>
              
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a type="button" href="{{route('user.details',Crypt::encryptString('2') )}}" class="btn btn-sm btn-primary"> View Rantu</a>
                </div>
               
              

            </div>
            <br>
            <br>
            <div class="card-body">
                <div class="card-header"> <h2> Numberic password makin</h2></div>
                <form method="post" action="{{route('store.user')}}">

                    @csrf
                    <div class="mb-3">
                    
              
                   
                    <br>
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
<br>
<br>
<br>
              <div class="class_div">
                <div class="card-header"> <strong>Class And Student</strong></strong></div>
                <a href="{{route('class.index')}}" class="btn btn-sm btn-primary"> class</a>
                <a href="{{route('students.index')}}" class="btn btn-sm btn-primary"> Student </a>
              </div>



            </div> 
     

            
        </div>
    </div>
</div>
@endsection
