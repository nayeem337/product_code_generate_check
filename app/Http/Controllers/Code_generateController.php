<?php

namespace App\Http\Controllers;

use App\Models\Code_generate;
use App\Models\Product_2;
use Illuminate\Http\Request;

class Code_generateController extends Controller
{
    public function code_generate($id)

    {
        $product = Product_2::findorFail($id);
        $productId = $product->id;

//       dd($product);
        return view('admin.code.code_generate', [
            'product' => $product,

            'codes' => Code_generate::where('product_id', $productId)->get(),

        ]);
    }


//    public function create(Request $request)
//    {
//        Code_generate::newCode($request);
//        return back()->with('message', 'Code info create successfully.');
//    }

    public function create(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity'   => 'required|integer|min:1'
        ]);

        Code_generate::newCode($request, $request->quantity);

        return back()->with('message', 'Code info created successfully.');
    }


//    public function manage()
//    {
//        return view('admin.code.manage', ['codes' => Code_generate::all()]);
//    }

//    public function edit($id)
//    {
//        return view('admin.code.edit', ['code' => Code_generate::find($id)]);
//    }

    public function edit($id)
    {
        $code = Code_generate::find($id);

        if ($code) {
            return view('admin.code.edit', compact('code'));
        } else {
            return back()->with('error', 'Code not found.');
        }
    }


    public function update(Request $request, $id)
    {
            Code_generate::updateCode($request, $id);

            return back()->with('message', 'Code info updated successfully.');
        }


    public function delete($id)
    {
        try {
            Code_generate::deleteCode($id);

            return back()->with('message', 'Code info deleted successfully.');
        } catch (\Exception $e) {

            return back()->with('error', 'Failed to delete code: ' . $e->getMessage());
        }
    }



}
