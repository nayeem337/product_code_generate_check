@extends('frontend.master')
@section('title')
    Home
@endsection
@section('content')

    {{--    @include('frontend.slider.slider')--}}


{{--    <div id="rs-about" class="rs-about style1 pb-100 md-pt-70" style="background-color: black ">--}}


    <div id="rs-about" class="rs-about style1" style="background-color: black; padding: 10px 0;">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: 10px;">
                <div class="col-md-6 text-center">
                    <!-- Illustration Section -->


                    <!-- Form Section -->

                </div>
            </div>
        </div>
    </div>



    <div id="rs-about" class="rs-about style1 pb-100 md-pt-70" style="">
        <br>
        <br>
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="col-md-6 text-center">
                    <!-- Illustration Section -->

                    <h3 class="text-center mb-3" style="font-size: medium; ">
                        আপনার প্রোডাক্টটি অরিজিনাল কিনা চেক করুন !</h3>

                    <h3 class="text-center mb-3" style="font-size: medium; ">
                        আপনার কাছে থাকা প্রোডাক্টের প্যাকেটে থাকা ডিজিটাল সিকিউরিটি কোডটি এখানে লিখুন।
                    </h3>



                    <!-- Form Section -->
                    <form action="{{route('product.match')}}" method="POST" enctype="multipart/form-data" onsubmit="return trackProduct(event)" style="background: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px;">
                        @csrf
                        <div class="row align-items-center">
                            <div class="col-md-8 mb-3">
                                <input type="text" class="form-control" name="code" id="pcode" placeholder="আপনার কোড লিখুন" style="border-radius: 5px; font-size: 12px;;">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success w-100" style="border-radius: 5px; margin-bottom: 16px;" >Check</button>
                            </div>

                        </div>
                    </form>

                    <div>
                        <h3 class="text-danger">আপনার প্রডাক্টের সিরিয়াল নাম্বার আমাদের সার্ভারের আওতাভুক্ত নয়।
                            <br>
                         আপনার প্রডাক্টটি  নকল ঘোষণা করা হলো। </h3> <br>

                    </div>
                    <img src="{{ asset('/') }}product-check/fake.png" alt="Illustration" style="max-width: 30%; height: auto; margin-bottom: 20px;">

                </div>
            </div>
        </div>
    </div>



@endsection
