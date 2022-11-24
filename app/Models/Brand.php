<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public static $image,$imageName,$imageDirectory,$brand,$imagePath,$imageExtension;

    public static function getImageUrl($request){
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$imageExtension;
        self::$imageDirectory = 'brand-image/';
        self::$image->move(self::$imageDirectory,self::$imageName);

        return self::$imageDirectory.self::$imageName;
    }

    public static function createBrand($request){

        self::$brand = new Brand();
        self::$brand->name= $request->name;
        self::$brand->description=$request->description;
        self::$brand->image=self::getImageUrl($request);
        self::$brand->save();
    }

    public static function updateBrand($request,$id){
        self::$brand = Brand::find($id);
        if($request->file('image')){
            if(file_exists(self::$brand->image)){
                unlink(self::$brand->image);
            }

            self::$imagePath = self::getImageUrl($request);

        }
        else{
            self::$imagePath = self::$brand->image;
        }

        self::$brand->name= $request->name;
        self::$brand->description=$request->description;
        self::$brand->image=self::$imagePath;
        self::$brand->save();
    }

    public static function brandDelete($id){
        self::$brand= Brand::find($id);
        if (file_exists(self::$brand->image)){
            unlink(self::$brand->image);
        }
        self::$brand->delete();


    }
}
