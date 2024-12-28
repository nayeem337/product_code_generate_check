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
                            Add Product
                        </button>
                    </div>

                    <div class="card-body mt-3">
                    <form action="{{route('product.new')}}" method="POST" enctype="multipart/form-data">
{{--                        <h2 class="text-center text-success">{{ session('message') }}</h2>--}}
                    @csrf

                    <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" >
                        </div>

                        <!-- Image 1 -->
                        <div class="mb-3">
                            <label for="image_1" class="form-label">Image 1 <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="image_1" id="image_1" accept="image/*" >
                        </div>

                        <!-- Image 2 -->
                        <div class="mb-3">
                            <label for="image_2" class="form-label">Image 2</label>
                            <input type="file" class="form-control" name="image_2" id="image_2" accept="image/*">
                        </div>

                        <!-- Image 3 -->
                        <div class="mb-3">
                            <label for="image_3" class="form-label">Image 3</label>
                            <input type="file" class="form-control" name="image_3" id="image_3" accept="image/*">
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea id="description" class="form-control" name="description" rows="5" placeholder="Enter Description" required></textarea>
                        </div>




                        <!-- Submit Button -->
{{--                        <div class="d-grid">--}}
{{--                            <button type="submit" class="btn btn-primary">Create New Product</button>--}}
{{--                        </div>--}}

                        <div class="d-grid">
                            <button type="submit" style="background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                                Create New Product
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th> SL </th>
                        <th>Title</th>
                        <th>Image</th>
                        {{-- <th>Description</th> --}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $product->title ?? null }}</td>
                            <td><img src="{{ asset($product->image_1?? null) }}" width="100" height="100"></td>
                            {{-- <td>{{ $product->description ?? null }}</td> --}}
{{--                            <td>--}}
{{--                                @if ($product->status == 1)--}}
{{--                                    <button class="btn btn-sm btn-primary">Active</button>--}}
{{--                                @elseif($product->status == 0)--}}
{{--                                    <button class="btn btn-sm btn-danger">Deactive</button>--}}
{{--                                @endif--}}
{{--                            </td>--}}
                            <td>
                                <a href="{{ route('product.edit',['id'=>$product->id?? null]) }}" class="btn btn-success btn-sm editProduct">Edit</a>
                                <a href="{{ route('product.delete',['id'=>$product->id?? null]) }}" class="btn btn-danger btn-sm deleteProduct">Delete</a>
                                <a href="{{ route('code-generate',['id'=>$product->id?? null]) }}" class="btn btn-primary btn-sm manageProduct">  Generate Code </a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
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
