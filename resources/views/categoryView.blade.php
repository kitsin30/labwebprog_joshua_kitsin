@extends('format.layout')
@section('title', 'Category')
@section('content')
    <div>
        <h3 class="ms-5 mt-3">{{$category->name}}</h3>
        @foreach ($productData as $product)
            <div class="row row-cols-1 row-cols-md-3 g-4 m-3">
                <div class="col">
                    <a href="/product/{{$product->id}}" class="nav-link active">                                <div class="card h-100">
                        <img src="{{asset($product->photo)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">IDR {{$product->price}}</p>
                        </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
        <div>
            {{$productData->links()}}
        </div>
    </div>
@endsection
