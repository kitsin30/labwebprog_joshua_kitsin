@extends('format.layout')
@section('title', 'Register')
@section('content')
    <div class="centerdiv">
        <h5 class="text-center">Register</h5>
        <form action={{route("createAccount")}} method="POST" class="mt-3">
            @csrf
            <div class="form-group col-md-4 mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="userHelp" placeholder="Enter Your Name">
            </div>

            <div class="form-group col-md-4 mb-3">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Your Email">
            </div>

            <div class="form-group col-md-4 mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password">
            </div>

            <div class="form-group col-md-4 mb-3">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Re-type Your Password">
            </div>

            <fieldset class="form-group col-md-4 mb-3">
                <div class="row">
                  <label for="gender">Gender</label>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                      <label class="form-check-label" for="male">
                        male
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                      <label class="form-check-label" for="female">
                        female
                      </label>
                    </div>
                  </div>
                </div>
            </fieldset>

            <div class="form-group col-md-4 mb-3">
                <label for="date">Date of Birth</label>
                <input type="date" class="form-control" name="date" id="date">
            </div>

            <div class="form-group col-md-4 mb-3">
                <label for="country">Country</label>
                <select id="country" class="form-control" name="country">
                  <option>indonesia</option>
                  <option>malaysia</option>
                  <option>thailand</option>
                  <option>filipina</option>
                  <option>kamboja</option>
                  <option>singapore</option>
                </select>
            </div>

            <div class="text-center mb-3">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-warning">{{$error}}</p>
            @endforeach
        @endif

        <div>Have an account? <a href="/login">Login Here</a></div>
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
        justify-content: center;
        align-items: center
    }
</style>
