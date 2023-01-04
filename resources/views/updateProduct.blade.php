@extends('format.layout')
@section('title', 'Update Product')
@section('content')
    <a href="/manageProduct" class="btn btn-primary ms-3 mt-3">back</a>

    <div class="centerdiv">
        <h5 class="text-center">Update Product</h5>
        <form action={{route("updateProduct", ["productID" => $productData->id])}} method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            @method("PATCH")
            <div class="form-group col-md-4 mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$productData->name}}" aria-describedby="productHelp">
            </div>

            <div class="form-group col-md-4 mb-3">
                <label for="category">Category</label>
                <select id="category" class="form-control" name="category">
                    @foreach ($categoryData as $category)
                        @if ($productData->category_id == $category->id)
                            <option selected>{{$category->name}}</option>
                        @else
                            <option>{{$category->name}}</option>
                        @endif

                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-4 mb-3">
                <label for="detail">Detail</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{$productData->description}}</textarea>
            </div>


            <div class="form-group col-md-4 mb-3">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" value="{{$productData->price}}" aria-describedby="priceHelp">
            </div>

            <div class="form-group col-md-4 mb-3">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" name="photo" id="photo" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-warning">{{$error}}</p>
            @endforeach
        @endif
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
