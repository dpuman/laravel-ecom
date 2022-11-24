<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static $image,$imageName,$imageDirectory,$product,$imagePath,$imageExtension;

    public static function getImageUrl($request){
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$imageExtension;
        self::$imageDirectory = 'product-image/';
        self::$image->move(self::$imageDirectory,self::$imageName);

        return self::$imageDirectory.self::$imageName;
    }

    public static function createProduct($request){
        self::$product = new Product();
        self::$product->category_id= $request->category_id;
        self::$product->brand_id= $request->brand_id;
        self::$product->title= $request->title;
        self::$product->description=$request->description;
        self::$product->image=self::getImageUrl($request);
        self::$product->code=$request->code;
        self::$product->save();
    }

    public static function updateProduct($request,$id){
        self::$product = Product::find($id);
        if($request->file('image')){
            if(file_exists(self::$product->image)){
                unlink(self::$product->image);
            }

            self::$imagePath = self::getImageUrl($request);

        }
        else{
            self::$imagePath = self::$product->image;
        }

        self::$product->category_id= $request->category_id;
        self::$product->brand_id= $request->brand_id;
        self::$product->title= $request->title;
        self::$product->description=$request->description;
        self::$product->image=self::$imagePath;
        self::$product->code=$request->code;
        self::$product->save();
    }

    public static function productDelete($id){
        self::$product= Product::find($id);
        if (file_exists(self::$product->image)){
            unlink(self::$product->image);
        }
        self::$product->delete();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
