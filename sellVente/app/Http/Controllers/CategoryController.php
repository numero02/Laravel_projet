<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
    
     */
    public function index()
    {
        // return Ad::all();
        $data = Category::all();
        return view('category',["list" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
    
     */
    public function create()
    {
        //
        $type="ajouter";
        return view('category-new',['type'=>$type]);
    }

    /**
     * Store a newly created resource in storage.
     *
    
     */
    public function store(Request $request)
    {
        //return Category::create($request->all());
        request()->validate([
            
            'name'          =>  'required',          
        ]);

        $category= new Category();
        
        $category->name = request('name');
        $category->save();

        return redirect("/categories");

    }

    /**
     * Display the specified resource.
     *

     */
    public function show($id)
    {
        return Category::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
    
     */
    public function edit(Category $id)
    {
        //
        return view('category-edit',["data"=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, $id)
    {
        request()->validate([      
            'name'          =>  'required',

        ]);

        $category=Category::find($id);
        
        $category->name = request('name');
        $category->save();

        
        return redirect("/categories");
    }

    /**
     * Remove the specified resource from storage.
     *
   
     */
    public function destroy($id)
    {
       
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back();
    }
}
