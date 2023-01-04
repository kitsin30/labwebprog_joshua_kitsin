@extends('format.layout')
@section('title', 'Category')
@section('content')
    <div>
        <h1>{{$category->name}}</h1>
        @foreach ($productData as $product)
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <a href="/product/{{$product->id}}" class="nav-link active">                                <div class="card h-100">
                        <img src="{{asset($product->photo)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->category_id}}</h5>
                            <p class="card-text">IDR {{$product->price}}</p>
                        </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach

        {{$productData->links()}}
    </div>
@endsection
