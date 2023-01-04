@extends('format.layout')
@section('title', 'Barbatos Shop')
@section('content')
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
        <form class="d-flex" role="search" action={{route("search")}}>
            @csrf
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </nav>

    <div>
        @foreach ($categoryData as $category)
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <p class="navbar-brand">{{$category->name}}</p>
                    <a href="/category/{{$category->id}}" class="nav-link active">View All</a>
                </div>
            </nav>
            @foreach ($productData as $product)
                @if ($category->id == $product->category_id)
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <a href="/product/{{$product->id}}" class="nav-link active">
                                <div class="card h-100">
                                <img src="{{asset($product->photo)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <p class="card-text">IDR {{$product->price}}</p>
                                </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
            <div>
                {{$productData->links()}}
            </div>
        @endforeach
    </div>
@endsection
