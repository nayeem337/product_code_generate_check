<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_sub_menu($request)
    {
        self::$data = new SubMenu();
        self::$data->title = $request->title??null;
        self::$data->designation = $request->designation??null;
        self::$data->name = $request->name??null;
        self::$data->menu_id = $request->menu_id??null;
        self::$data->details1 = $request->details1??null;
        // self::$data->details2 = $request->details2??null;
        self::$data->banner_image = self::saveBannerImage($request);
        self::$data->image = self::saveImage($request);
        // self::$data->details_image1 = self::saveDetailsImage1($request);
        // self::$data->details_image2 = self::saveDetailsImage2($request);
        // self::$data->details_image3 = self::saveDetailsImage3($request);
        self::$data->save();
    }
    public static function update_sub_menu($request)
    {
        self::$data = SubMenu::find($request->id);
        self::$data->title = $request->title??null;
        self::$data->designation = $request->designation??null;
        self::$data->name = $request->name??null;
        self::$data->menu_id = $request->menu_id??null;
        self::$data->details1 = $request->details1??null;
        // self::$data->details2 = $request->details2??null;
        if($request->file('banner_image')){
            if(self::$data->banner_image){
                if(file_exists(self::$data->banner_image)){
                    unlink(self::$data->banner_image);
                    self::$data->banner_image = self::saveBannerImage($request);
                }
            }
            else{
                self::$data->banner_image = self::saveBannerImage($request);
            }
        }
        if($request->file('image')){
            if(self::$data->image){
                if(file_exists(self::$data->image)){
                    unlink(self::$data->image);
                    self::$data->image = self::saveImage($request);
                }
            }
            else{
                self::$data->image = self::saveImage($request);
            }
        }
        if($request->file('details_image1')){
            if(self::$data->details_image1){
                if(file_exists(self::$data->details_image1)){
                    unlink(self::$data->details_image1);
                    self::$data->details_image1 = self::saveDetailsImage1($request);
                }
            }
            else{
                self::$data->details_image1 = self::saveDetailsImage1($request);
            }
        }
        if($request->file('details_image2')){
            if(self::$data->details_image2){
                if(file_exists(self::$data->details_image2)){
                    unlink(self::$data->details_image2);
                    self::$data->details_image2 = self::saveDetailsImage2($request);
                }
            }
            else{
                self::$data->details_image2 = self::saveDetailsImage2($request);
            }
        }
        if($request->file('details_image3')){
            if(self::$data->details_image3){
                if(file_exists(self::$data->details_image3)){
                    unlink(self::$data->details_image3);
                    self::$data->details_image3 = self::saveDetailsImage3($request);
                }
            }
            else{
                self::$data->details_image3 = self::saveDetailsImage3($request);
            }
        }
        self::$data->save();
    }
    private static function saveBannerImage($request){
        self::$image = $request->file('banner_image');
        self::$imageName = 'consultancy_banner_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'consultancy/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageName = 'consultancy_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'consultancyImage/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveDetailsImage1($request){
        self::$image = $request->file('details_image1');
        self::$imageName = 'consultancy_details_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'consultancy/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveDetailsImage2($request){
        self::$image = $request->file('details_image2');
        self::$imageName = 'consultancy_details_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'consultancy/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveDetailsImage3($request){
        self::$image = $request->file('details_image3');
        self::$imageName = 'consultancy_details_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'consultancy/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }

}
