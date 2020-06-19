<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SaveProductRequest;
use App\Http\Controllers\Controller;
use App\Products;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Products::orderBy('id', 'desc')->paginate(5);
        $paginate =Products::paginate(5);
       
        //dd($products);
        return view('admin.products.index', compact('products'), compact('paginate'));
    }

   
    public function create(){

    $categories = Category::orderBy('id', 'desc')->lists('name', 'id');
    //dd($categories);
    return view('admin.products.create', compact('categories'));
       
    }

   
    public function store(SaveProductRequest $request)
    {
       $data = [
            'name'          => $request->get('name'),
            'slug'          => str_slug($request->get('name')),
            'description'   => $request->get('description'),
            'extract'       => $request->get('extract'),
            'price'         => $request->get('price'),
            'image'         => $request->get('image'),
            'visible'       => $request->has('visible') ? 1 : 0,
            'category_id'   => $request->get('category_id')
        ];

        $product = Products::create($data);

        $message = $product ? 'Producto agregado correctamente!' : 'El producto NO pudo agregarse!';
        
        return redirect()->route('admin.product.index')->with('message', $message);
    }

    
    public function show(Products $product)
    {
       return $product;
    }


    public function edit(Products $product)
    {
    	$categories = Category::orderBy('id', 'desc')->lists('name', 'id');

        return view('admin.products.edit', compact('categories', 'product'));
      
    }


    public function update(SaveProductRequest $request, Products $product)
    {
    	$product->fill($request->all());
        $product->slug = str_slug($request->get('name'));
        $product->visible = $request->has('visible') ? 1 : 0;
        
        $updated = $product->save();
        
        $message = $updated ? 'Producto actualizado correctamente!' : 'El Producto NO pudo actualizarse!';
        
        return redirect()->route('admin.product.index')->with('message', $message);
       
    }

    public function destroy(Products $product)
    {
        $deleted = $product->delete();
        
        $message = $deleted ? 'Producto eliminado correctamente!' : 'El producto NO pudo eliminarse!';
        
        return redirect()->route('admin.product.index')->with('message', $message);
    }
}