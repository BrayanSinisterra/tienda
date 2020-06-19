<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Products;
use App\Category;

class StoreController extends Controller
{
    public function index()
    {
        $product = Products::all();
        $category = Category::all();
        if(isset($_GET["buscar"])){
         $buscar = htmlspecialchars(input::get("buscar")); 
         $product = Products::where('name', 'LIKE','%'.$buscar.'%')->orwhere('description','LIKE','%'.$buscar.'%')->paginate(4); 
      
        }else{
            $product = Products::paginate(8); 
        }

       
        return view('store.index', compact('product'), compact('category'));
    }

    public function show($slug)
    {
        $product = Products::where('slug', $slug)->first();
        //dd($product);

        return view('store.show', compact('product'));
    }

    public function category($id)
    {
        $category = Category::all();
        //dd($category);
        $product = Products::where('category_id', $id)->get();
       
       
        return view('store.category', compact('product'),compact('category'));
    }


   


}