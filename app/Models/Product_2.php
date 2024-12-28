<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_2 extends Model
{
    use HasFactory;

    private static $product, $images, $imageName, $directory, $imageUrls;

    public static function getImageUrls($request)
    {
        self::$images = [];
        self::$directory = 'upload/product_2-images/';

        // Process image_1, image_2, and image_3
        foreach (['image_1', 'image_2', 'image_3'] as $imageField) {
            if ($request->file($imageField)) {
                $image = $request->file($imageField);
                $imageName = uniqid() . '_' . $image->getClientOriginalName();
                $image->move(self::$directory, $imageName);
                self::$images[$imageField] = self::$directory . $imageName;
            } else {
                self::$images[$imageField] = null;
            }
        }

        return self::$images;
    }

    public static function newProduct($request)
    {
        $imageUrls = self::getImageUrls($request);

        self::$product = new Product_2();
        self::$product->title           = $request->title;
        self::$product->image_1        = $imageUrls['image_1'] ?? null;
        self::$product->image_2        = $imageUrls['image_2'] ?? null;
        self::$product->image_3        = $imageUrls['image_3'] ?? null;
        self::$product->description    = $request->description;
        self::$product->save();
    }


    public static function updateProduct($request, $id)
    {

        self::$product = Product_2::find($id);

        self::$product->title = $request->title;
        self::$product->description = $request->description;


        $imageUrls = self::getImageUrls($request);
        foreach (['image_1', 'image_2', 'image_3'] as $imageField) {
            if ($request->hasFile($imageField)) {
                if (file_exists(public_path(self::$product->$imageField)) && self::$product->$imageField !== null) {
                    unlink(public_path(self::$product->$imageField));
                }
                self::$product->$imageField = $imageUrls[$imageField] ?? self::$product->$imageField;
            } else {
                self::$product->$imageField = self::$product->$imageField;
            }
        }
        self::$product->save();
    }

    public static function deleteProduct($id)
    {
        self::$product = Product_2::find($id);

        // Delete images
        foreach (['image_1', 'image_2', 'image_3'] as $imageField) {
            if (file_exists(self::$product->$imageField)) {
                unlink(self::$product->$imageField);
            }
        }
        self::$product->delete();
    }
}
