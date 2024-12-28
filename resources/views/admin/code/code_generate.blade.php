@extends('admin.master')

@section('title')
    Product
@endsection

@section('body')
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-xl border-light rounded-3">
                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
            @endif

            <!-- Button to trigger modal or code generation -->
                <div class="d-grid mb-4">
                    <button type="button" class="btn btn-primary btn-lg" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 30px; padding: 15px 30px; color: white; font-weight: bold; box-shadow: 0 10px 30px rgba(0, 123, 255, 0.2); transition: all 0.4s ease;">
                        Generate Code
                    </button>
                </div>

                <div class="card-body">
                    <form action="{{route('generate-code.new')}}" method="POST">
                        @csrf



                        <input type="hidden" value="{{$product->id}}" name="product_id">


                        {{--                            <div class="mb-3">--}}
                        {{--                                <label for="product_id" class="form-label">Product ID</label>--}}
                        {{--                                <input type="number" name="product_id" class="form-control" id="product_id" placeholder="Enter Product ID" required>--}}
                        {{--                                @error('product_id')--}}
                        {{--                                <small class="text-danger">{{ $message }}</small>--}}
                        {{--                                @enderror--}}
                        {{--                            </div>--}}

                        <div class="mb-3">
                            <label for="quantity" class="form-label"> Generate Code</label>
                            <input type="number" name="quantity" class="form-control" id="quantity" placeholder="" min="1" required>
                            @error('quantity')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>



                        <!-- Submit Button -->
                        <div class="d-grid col-lg-4 mx-auto">
                            <button type="submit" class="btn btn-success btn-lg" style="border-radius: 50px; padding: 15px 40px; background: linear-gradient(45deg, #28a745, #1e7e34); color: white; font-weight: bold; box-shadow: 0 10px 30px rgba(40, 167, 69, 0.3); transition: all 0.3s ease;">
                                Submit Code
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
                        <th>code</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($codes as $code)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$code->code}}</td>
                            <td>
                                <a href="{{ route('generate-code.edit',['id'=>$code->id?? null]) }}" class="btn btn-success btn-sm editProduct">Edit</a>
                                <a href="{{ route('generate-code.delete',['id'=>$code->id?? null]) }}" class="btn btn-danger btn-sm deleteProduct">Delete</a>
{{--                                <a href="{{ route('code-generate',['id'=>$product->id?? null]) }}" class="btn btn-primary btn-sm manageProduct">  Generate Code </a>--}}

                            </td>
                        </tr>


                    </tbody>
                    @endforeach
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
