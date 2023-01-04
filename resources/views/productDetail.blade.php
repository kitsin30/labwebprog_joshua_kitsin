@extends('format.layout')
@section('title', 'Product detail')
@section('content')
    <div class="card m-5" style="max-width: 100%;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset($product->photo)}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <div>
                        <div class="row">
                        <div class="col">
                            description:
                        </div>
                        <div class="col">
                            {{$product->description}}
                        </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                        <div class="col">
                            price:
                        </div>
                        <div class="col">
                            {{$product->price}}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
