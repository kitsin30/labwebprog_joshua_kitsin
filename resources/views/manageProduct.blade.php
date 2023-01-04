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

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif

    <div class="text-end me-5">
        <a href="/manageAddProduct" class="btn btn-primary">add Product</a>
    </div>
    <div class="text-center">
        @foreach ($productData as $product)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{asset($product->photo)}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <div class="d-flex flex-column">
                                <div class="text-center mt-3 mb-3">
                                    <a href={{route("updateView", ["productID" => $product->id])}} class="btn btn-primary col-md-4">Update</a>
                                </div>
                                <form action={{route("deleteProduct")}} method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <div class="text-center">
                                        <input type="hidden" name="deleteData" value={{$product->id}}>
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
