<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = News::all();
        $categories = Category::all();
        if ($categories->count() == 0) {
            toastr()->error('Create a category first!');
            return redirect('/categories/create');
        } else {
        if ($titles->count() == 0) {
            toastr()->error('Create a news first!');
            return redirect('/news/create');
        }
    }

        
        return view('news.index')->with('titles', $titles)->with('categories', $categories);
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
            'image' => 'required|image',
            'title' => 'required|unique:news',
            'category_id' => 'required',
            'content' => 'required|unique:news',
            'published_from' => 'required',
            'published_to' => 'required',
        ]);

        // if ($request->hasFile('image')) {
        //Get filename with extension
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        //Get filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get extension
        $extension = $request->file('image')->getClientOriginalExtension();
        //Create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        //Upload image
        $path = $request->file('image')->storeAs('public/image/'.$request->input('image'), $filenameToStore);
        //Upload Photo
        // dd($filenameToStore);
        $user = Auth::user();
        $news = new News;
        $news->image = $filenameToStore;
        $news->title = $request->title;
        $news->category_id = $request->category_id;
        $news->content = $request->content;
        $news->published_from = $request->published_from;
        $news->published_to = $request->published_to;
        $news->created_by = $user->name;
        $news->updated_by = $user->name;

        $from = $request->published_from;
        $to = $request->published_to;
        if ($from >= $to) {
            toastr()->error('Invalid Date!');
            return redirect('/news/create');
        } else {
            $news->save();
            if (!$news->save()) {
                toastr()->error('News was not saved!');
                return redirect('/news/create');
            } else {
                toastr()->success('News created successfully!');
                return redirect('/news');
            }
        }
        // }
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
            'published_from' => 'required',
            'published_to' => 'required',
        ]);

        $news = News::find($id);
        $news->title = $request->title;
        $news->category_id = $request->category_id;
        $news->content = $request->content;
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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

        //Date backend validation
        if (empty($from)|| empty($to)) {
            toastr()->error('Date is empty!');
        }

        //Show results
        $date = News::whereBetween('published_from', [$from, $to]);
        $results = $date->get()->all();
        
        //Avoid date backwards
        if($from <= $to) {
            if (empty($results)) {
                toastr()->error('No news found!');
                return redirect('/news');
            } else {
                toastr()->success('List found!');
                return view('news.partials.results')->with('results', $results); 
            }
        } else {
            toastr()->error('Invalid Date!');
            return redirect('/news');
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
    }
}
