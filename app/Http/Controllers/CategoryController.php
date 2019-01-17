<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
<<<<<<< HEAD
    public function __construct()
    {
        $this->middleware('auth');
    }
=======
>>>>>>> 5a773785949cc9482452adef7156e70b83305850
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $categories = Category::orderBy('category_name', 'asc')->get();
=======
        $categories = Category::all();
>>>>>>> 5a773785949cc9482452adef7156e70b83305850
        return view('news.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
<<<<<<< HEAD
            'category_name' => 'required|unique:categories',
=======
            'category_name' => 'required',
>>>>>>> 5a773785949cc9482452adef7156e70b83305850
        ]);
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();
<<<<<<< HEAD

        if(!$category->save()) {
            return redirect('/categories/create')->with('error','Categories was not saved!');
        } else {
            return redirect('/categories');
        }
=======
        return redirect('/categories');
>>>>>>> 5a773785949cc9482452adef7156e70b83305850
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('news.categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);

        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();
<<<<<<< HEAD

        if(!$category->save()) {
            return redirect('/categories/' . $id . '/edit')->with('error','Categories was not updated!');
        } else {
        return redirect('/categories');
        }
=======
        return redirect('/categories');
>>>>>>> 5a773785949cc9482452adef7156e70b83305850
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        $categories = Category::find($id);
        foreach ($categories->news as $category) {
            $category->delete();
        }
        $categories->delete();
        if (!$categories->delete()) {
            return redirect('/categories')->with('error','Categories was not deleted!');
        } else {
            return redirect('/categories');
        }
        
=======
        $category = Category::find($id);
        $category->delete();
        return redirect('/categories');
>>>>>>> 5a773785949cc9482452adef7156e70b83305850
    }
}
