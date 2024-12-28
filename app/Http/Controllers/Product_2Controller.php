<?php

namespace App\Http\Controllers;

use App\Models\Code_generate;
use App\Models\Product;
use App\Models\Product_2;
use Illuminate\Http\Request;

class Product_2Controller extends Controller
{
    public function index()
    {
        return view('admin.product_2.index', ['products' => Product_2::all()]);
    }

    public function create(Request $request)
    {
        Product_2::newProduct($request);
        return back()->with('message', 'Product info create successfully!');
    }

//    public function manage()
//    {
//        return view('admin.product_2.manage', ['products' => Product_2::all()]);
//    }

    public function edit($id)
    {
        return view('admin.product_2.edit', ['product' => Product_2::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Product_2::updateProduct($request, $id);
        return back()->with('message', 'Product info update successfully!');
    }

    public function delete($id)
    {
        Product_2::deleteProduct($id);
        return back()->with('message', 'Product info delete successfully!');
    }




    // Product track on front-end

    public function tech_web_track_product(Request $request){

        $code = $request->input('code');

//        dd($code);

        $pCode = Code_generate::where('code', '=', $code)->first();

//        $productId = $pCode->product_id;
//
//        $product = Product_2::where('id', $productId)->first();

        if($pCode ){
            return response()->json([
                'status'    => 'success',
                'message'   => 'Product is original'
            ], 200);
        }else{
            return response()->json([
                'status'    => 'fail',
                'message'   => 'Product is fake'
            ], 401);

        }


    }


//productMatch

//public function productMatch(Request $request)
//{
//
//    $code = $request->input('code');
//
//    $pCode = Code_generate::where('code', '=', $code)->first();
//    $productDetails = Product_2::where('id', $pCode->product_id)->first();
//
//    return view('frontend.track.check-product', compact('pCode', 'productDetails'));
//
//
//}




//MAIN

    public function productMatch(Request $request)
    {
        $code = $request->input('code');

        $pCode = Code_generate::where('code', '=', $code)->first();

        if ($pCode) {
            
        $productDetails = Product_2::where('id', $pCode->product_id)->first();

        return view('frontend.track.check-product', compact('pCode', 'productDetails'));
           
        }else{
            return view('frontend.track.fake-product');
        }

    }


















    public function checkProduct()
    {
        return view('frontend.track.check-product');
    }


    public function fakeproduct()
    {
        return view('frontend.track.fake-product');
    }





}
