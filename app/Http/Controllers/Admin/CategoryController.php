<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();
        //dd($categories);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        //return $request->all();

        $this->validate($request,[
          'name' => 'required|unique:categories|max:255',
          'color' => 'required',
        ]);
        
        $category = Category::create([
            'name' => $request->get('name'),
            'slug' => str_slug($request->get('name')),
            'description' => $request->get('description'),
            'color' => $request->get('color')
        ]);
        
        $message = $category ? 'Categoría agregada correctamente!' : 'La Categoría NO pudo agregarse!';
        
        return redirect()->route('admin.category.index')->with('message', $message);
    }

  public function show(Category $category){
 	
    return $category;

  }

  public function edit(Category $category){
 	   return view('admin.category.edit', compact('category'));
  }

  public function update(Request $request, Category $category){
 	
      $this->validate($request, [
          'name' => 'required|max:255',
          'color' => 'required',
        ]);

        $category->fill($request->all());
        $category->slug = str_slug($request->get('name'));
        
        $updated = $category->save();
        
        $message = $updated ? 'Categoría actualizada correctamente!' : 'La Categoría NO pudo actualizarse!';
        
        return redirect()->route('admin.category.index')->with('message', $message);

  }

   public function destroy(Category $category){
 	   
     $deleted = $category->delete();
        
    $message = $deleted ? 'Categoría eliminada correctamente!' : 'La Categoría NO pudo eliminarse!';
        
    return redirect()->route('admin.category.index')->with('message', $message);
  }
}
