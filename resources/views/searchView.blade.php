@extends('format.layout')
@section('title', 'Barbatos Shop')
@section('content')
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
        <form class="d-flex" role="search" action={{route("search")}} method="POST">
            @csrf
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </nav>

    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <p class="navbar-brand">Search Result</p>
            </div>
        </nav>
        @foreach ($searchData as $search)
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <a href="/product/{{$search->id}}" class="nav-link active">
                        <div class="card h-100">
                            <img src="{{asset($search->photo)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$search->name}}}</h5>
                                <p class="card-text">IDR {{$search->price}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
        <div>
            {{$searchData->links()}}
        </div>
    </div>
@endsection
