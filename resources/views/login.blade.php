@extends('format.layout')
@section('title', 'Login')
@section('content')
    <div class="centerdiv">
        <h3 class="text-center mt-5">Login</h3>

        <form class="mt-5">
            <div class="form-group row col-md-4 mb-4">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <div class="form-group row col-md-4 mb-4">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>
            <div class="form-group row col-md-4 mb-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">
                    Remember Me
                  </label>
                </div>
              </div>

            <div class="text-center mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

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
