<?php

namespace App\Http\Controllers;

use App\News;
use App\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = News::all();
        return view('news.index')->with('titles', $titles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('news.create')->with('categories', $categories);
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
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);
        $news = new News;
        $news->title = $request->title;
        $news->category_id = $request->category_id;
        $news->content = $request->content;
        $news->save();
        return redirect('/news');
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
        $title = News::find($id);
        $categories = Category::all();
        return view('news.edit')->with('title', $title)->with('categories', $categories);
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
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $news = News::find($id);
        $news->title = $request->title;
        $news->category_id = $request->category_id;
        $news->content = $request->content;
        $news->save();
        return redirect('/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('/news');
    }

    public function date()
    {
        return view('news.partials.dates');
    }

    public function result(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $results = News::whereBetween('created_at', [$from, $to])->get()->all();
        return view('news.partials.results')->with('results', $results);
    }
}
