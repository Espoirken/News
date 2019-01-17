<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Session;
use App\News;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
=======
use App\News;
use App\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
>>>>>>> 5a773785949cc9482452adef7156e70b83305850
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = News::all();
<<<<<<< HEAD
        $categories = Category::all();
        if ($titles->count() == 0) {
            toastr()->error('Create a book first!');
            return redirect('/news/create');
        }
        return view('news.index')->with('titles', $titles)->with('categories', $categories);
=======
        return view('news.index')->with('titles', $titles);
>>>>>>> 5a773785949cc9482452adef7156e70b83305850
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
<<<<<<< HEAD
            'title' => 'required|unique:news',
            'category_id' => 'required',
            'content' => 'required|unique:news',
        ]);
        $news = new News;
        $user = Auth::user();
        $news->title = $request->title;
        $news->category_id = $request->category_id;
        $news->content = $request->content;
        $news->published_from = $request->published_from;
        $news->published_to = $request->published_to;
        $news->created_by = $user->name;
        $news->updated_by = $user->name;
        $news->save();
        if(!$news->save()) {
            toastr()->error('News was not saved!');
            return redirect('/news/create');
        } else {
            toastr()->success('News created successfully!');
            return redirect('/news');
        }
=======
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
<<<<<<< HEAD
            'published_from' => 'required',
            'published_to' => 'required',
=======
>>>>>>> 5a773785949cc9482452adef7156e70b83305850
        ]);

        $news = News::find($id);
        $news->title = $request->title;
        $news->category_id = $request->category_id;
        $news->content = $request->content;
<<<<<<< HEAD
        $news->published_from = $request->published_from;
        $news->published_to = $request->published_to;
        $news->save();
        if(!$news->save()) {
            toastr()->error('News was not updated!');
            return redirect('/news/' . $id .'/edit');
        } else {
            toastr()->success('News was updated successfully!');
            return redirect('/news');
        }
=======
        $news->save();
        return redirect('/news');
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
        $news = News::findOrFail($id);
        $news->delete();
        if (!$news->delete()) {
            toastr()->error('News was not deleted!');
            return redirect('/news')->with('error','News was not deleted!');
        } else {
            toastr()->success('News was deleted successfully!');
        return redirect('/news');
        }
    }

    public function result(Request $request)
    {
        $from = $request->published_from;
        $to = $request->published_to;
        
        $date = News::whereBetween('published_from', [$from, $to]);
        $results = $date->get()->all();
        // dd($from > $to);
        if($from < $to) {
            return view('news.partials.results')->with('results', $results);
        } else {
            return redirect('/news')->with('error','Invalid date!');
        }
    }

    public function search(Request $request)
    {   
        // $searches = News::whereHas('category', function ($query) use ($request) {
        //     $query->where('category_name', 'like', "%{$request->search}%");
        // })
        // ->orWhere('title', 'like', '%' . request('search') . '%')
        // ->paginate(10);
        $searches = News::whereHas('category', function ($query) use ($request) {
                $query->where('category_name', 'like', "%{$request->category}%");
            })
            ->where('title', 'like', '%' . request('search') . '%')
            ->paginate(10);


        return view('news.partials.search')->with('searches', $searches);
=======
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
>>>>>>> 5a773785949cc9482452adef7156e70b83305850
    }
}
