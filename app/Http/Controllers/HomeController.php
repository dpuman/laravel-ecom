<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $categories,$brands,$products,$product;
    public function index(){
        $this->categories = Category::all();
        $this->brands = Brand::all();
        return view('home.index',['categories'=>$this->categories,'brands'=>$this->brands]);
    }

    public function categoryProducts($id){
        $this->products = Product::where('category_id' , $id)->get();
        return view('home.products',['products'=>$this->products]);
    }

    public function brandProducts($id){
        $this->products = Product::where('brand_id' , $id)->get();
        return view('home.products',['products'=>$this->products]);
    }

    public function productDetails($id){
        $this->product = Product::find($id);
        return view('home.detail',['product'=>$this->product]);
    }
}
