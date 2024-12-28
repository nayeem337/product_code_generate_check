@extends('admin.master')
@section('title')
    Product
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif


                <div class="d-grid">
                    <button type="button"  style="background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;"class="btn btn-primary">
                        Edit Product
                    </button>
                </div>

                <div class="card-body mt-3">
                    <form action="{{route('product.update',['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                    {{--                        <h2 class="text-center text-success">{{ session('message') }}</h2>--}}
                    @csrf

                        <input type="hidden" value="{{$product->id}}">


                    <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control"  value="{{$product->title}}" name="title" id="title" placeholder="Enter Title" >
                        </div>

                        <!-- Image 1 -->
                        <div class="mb-3">
                            <label for="image_1" class="form-label">Image 1 <span class="text-danger">*</span></label>
                            <input value="{{asset($product->image_1)}}" type="file" class="form-control" name="image_1" id="image_1" accept="image/*" >
                            <img src="{{asset($product->image_1)}}" alt="" height="80" width="80">
                        </div>

                        <!-- Image 2 -->
                        <div class="mb-3">
                            <label for="image_2" class="form-label">Image 2</label>
                            <input type="file" class="form-control" name="image_2" id="image_2" accept="image/*">
                            <img src="{{asset($product->image_2)}}" alt="" height="80" width="80">
                        </div>

                        <!-- Image 3 -->
                        <div class="mb-3">
                            <label for="image_3" class="form-label">Image 3</label>
                            <input type="file" class="form-control" name="image_3" id="image_3" accept="image/*">
                            <img src="{{asset($product->image_3)}}" alt="" height="80" width="80">
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea id="description" class="form-control" name="description" rows="5" placeholder="Enter Description" > {{$product->description}} </textarea>
                        </div>




                        <!-- Submit Button -->
                        {{--                        <div class="d-grid">--}}
                        {{--                            <button type="submit" class="btn btn-primary">Create New Product</button>--}}
                        {{--                        </div>--}}

                        <div class="d-grid">
                            <button type="submit" style="background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                                Update Product
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>






    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
@endsection
