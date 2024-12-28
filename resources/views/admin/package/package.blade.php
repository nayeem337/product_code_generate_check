@extends('admin.master')
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">

                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('store.package')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="form-group">
                            <label> Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Sub Title</label>
                            <input type="text" name="sub_title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        @php

                            $softwares= \App\Models\Software::all();
                        @endphp


                        <div class="form-group">
                            <label>Software</label>
                            <select class="form-control" name="add_home">
                                <option  value="">Select One</option>

                                @foreach ($softwares as $software)
                                <option value="{{ $software->id }}">{{ $software->title }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Features</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="featurs"></textarea>
                        </div>


                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-responsive m-t-40">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Price</th>
                        <th>Feature</th>

{{--                        <th>Details</th>--}}
                        {{-- <th>Active/Deactive</th> --}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($packages as $package)
                        <tr>
                            <td><img src="{{ asset($package->image) }}" style="height: 100px"></td>
                            <td>{{ $package->title ?? null }}</td>
                            <td>{{ $package->sub_title ?? null }}</td>

                            <td>{{ $package->price ?? null }}</td>
                            <td>{!! $package->featurs ?? null !!}</td>
{{--                            <td>{!! $service->service_details_small ?? null !!}</td>--}}
                            {{-- <td>
                                @if ($service->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($service->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td> --}}
                            <td>
                                <a href="{{ route('edit.package',['id'=>$package->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>
                                <a href="{{ route('delete.package',['id'=>$package->id]) }}" class="btn btn-danger btn-sm editProduct">Delete</a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
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

    {{-- <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-responsive m-t-40">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($galleries as $gallery)
                        <tr>
                            <td><img src="{{ asset($gallery->image) }}" style="height: 100px"></td>

                            <td>
                                @if ($gallery->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($gallery->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('edit.gallery',['id'=>$gallery->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                </div>
            </div>
        </div>
    </div> --}}
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
@endsection