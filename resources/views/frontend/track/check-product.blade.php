@extends('frontend.master')
@section('title')
    Home
@endsection

@section('content')


{{--    <div id="rs-about" class="rs-about style1 pb-100 md-pt-70 mt-5" style="width: 100%; background-color: black; padding: 60px 0">--}}


<div id="rs-about" class="rs-about style1" style="background-color: black; padding: 10px 0;">

    </div>

    <div id="rs-about" class="rs-about style1 pb-100 md-pt-70">
        <br>
        <br>
        <br>
        <br>
        <br>

    <div class="container">
        <div class="row justify-content-center align-items-center" style="">

            <div class="col-md-6 text-center" style="">

                {{-- <div class="col-md-6 text-center" style="background-image: url('http://127.0.0.1:8000/product-check/check (2).jpeg'); height: 500px;  background-size: cover; background-position: center;"> --}}

                <!-- Illustration Section -->

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center mb-3" style="font-size: medium;">আপনার প্রোডাক্টটি অরিজিনাল কিনা চেক করুন !</h4>

                <p class="text-center mb-4" style="font-size: medium;">আপনার কাছে থাকা প্রোডাক্টের প্যাকেটে থাকা ডিজিটাল সিকিউরিটি কোডটি এখানে লিখুন।</p>

                    </div>
                </div>

                <!-- Form Section -->
                <br>
                <form action="{{route('product.match')}}" method="POST" enctype="multipart/form-data" style="background: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px;">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-md-8 mb-3">
                            <input type="text" class="form-control" name="code"  placeholder="আপনার কোড লিখুন" style="border-radius: 5px;">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success w-100" style="border-radius: 5px; margin-bottom: 16px;" >Check</button>
                        </div>


                    </div>
                </form>


            </div>
        </div>
    </div>


    <div class="row justify-content-center align-items-center" style="">

        <div class="col-md-6 text-center" style="">

                        <!-- Product Details Section -->
                        @if($productDetails)
                            <div class="product-details text-light">
                                {{-- <h4 class="mb-3 text-success" style="font-size: 1.8rem;">{{ @$productDetails->title }}</h4> --}}
                                <div class="mb-4">

                                    <div class="pDetails" style="; background-color:#fff; opacity:.7">

                                        <h4 class="mb-3 text-success" style="font-size: 1.8rem;">{{ @$productDetails->title }}</h4>
                                        
                                        <h5 class="mb-3 text-success" >This product is original product</h5>

                               

                                    </div>


                                    <div class="" style="width:300px; height:300px; margin: 0 auto; background-image: url('{{ @$productDetails->image_1 }}');  background-size: cover; background-position: center;" >
                                        <div style="width:100%; height:100%; background-color:#020202; opacity:.8; z-index:1">

                                           <img src="https://images.vexels.com/content/131641/preview/original-round-label-562fa7.png" alt="">

                                        </div>

                                    </div>


                                    {{-- <img src="{{ asset($productDetails->image_1) }}" alt="Image 1" class="img-fluid mx-2 rounded shadow-lg" style="height: 200px; width: auto;"> --}}
                                    {{--                                    <img src="{{ asset($productDetails->image_2) }}" alt="Image 2" class="img-fluid mx-2 rounded shadow-lg" style="height: 200px; width: auto;">--}}
                                    {{--                                    <img src="{{ asset($productDetails->image_3) }}" alt="Image 3" class="img-fluid mx-2 rounded shadow-lg" style="height: 200px; width: auto;">--}}
                                </div>
                            
                           
                            </div>
                            <span>{!! $productDetails->description !!}</span>
                        @else
                            <p class="text-danger mt-3" style="font-size: 1.5rem;">This product is fake!</p>
                        @endif

        </div>
    </div>


</div>



@endsection
