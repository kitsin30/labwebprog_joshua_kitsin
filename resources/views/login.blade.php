@extends('format.layout')
@section('title', 'Login')
@section('content')
    <div class="centerdiv">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @endif

        <h3 class="text-center mt-5">Login</h3>

        <form action={{route("loginAccount")}} method="POST" class="mt-5">
            @csrf
            <div class="form-group row col-md-4 mb-4">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="emailInput" id="inputEmail3" placeholder="Email" value="{{Cookie::get('CookieEmail') !== null ? Cookie::get('CookieEmail') : ""}}">
                </div>
            </div>
            <div class="form-group row col-md-4 mb-4">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="passwordInput" id="inputPassword3" placeholder="Password" value="{{Cookie::get('CookiePassword') !== null ? Cookie::get('CookiePassword') : ""}}">
                </div>
            </div>
            <div class="form-group row col-md-4 mb-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="rememberInput" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">
                    Remember Me
                  </label>
                </div>
              </div>

            <div class="text-center mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-warning">{{$error}}</p>
                @endforeach
            @endif

            <div>Don't have an account? <a href="/register">Register Here</a></div>
        </form>
    </div>
@endsection

<style>
    .centerdiv{
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center
    }
    form{
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center
    }
</style>
