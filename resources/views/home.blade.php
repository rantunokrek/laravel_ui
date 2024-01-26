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
                </div>
                <a type="button" href="{{route('user.details',Crypt::encryptString('2') )}}" class="btn btn-sm btn-primary"> View Rantu</a>
      

            </div>
            <br>
            <br>
                  
            <form method="post" action="{{route('store.user')}}">
         @csrf
                <div class="mb-3">
                  <h2> Numberic password making Has</h2>
                    <br>
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  </div>
            
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

            
        </div>
    </div>
</div>
@endsection
