<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $news = News::orderBy('created_at', 'DESC')->paginate(20);
        $users = User::all();

        return view('index', compact('news', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required',
            'title' => 'required|min:10|max:100',
            'description' => 'required|min:10|max:1000',
            'user_id' => 'nullable|exists:users,id',
            ]);
    
            $news = new News();
            $news->author = $request->input('author');
            $news->title = $request->input('title');
            $news->description = $request->input('description');
            $news->user_id = $request->input('user_id');
            $news->save();
        
        return redirect()->back()->with('status', 'Successful create news!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */

    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */

    public function edit(News $news) 
    {   
        $news = News::findOrFail($news->id);

        Gate::authorize('update-user_news', [$news]);

        return view('news-edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, News $news)
    {
        $request->validate([
            'author' => 'required',
            'title' => 'required|min:10|max:100',
            'description' => 'required|min:10|max:1000',
            'user_id' => 'nullable|exists:users,id',
            ]);
    
        $news = News::findOrFail($news->id);

        $news->update([
            'author' => $request->author,
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
            ]);
        
        return redirect()->back()->with('status', 'Successful update news!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(News $news)
    {
        News::findOrFail($news->id)->delete();

        return redirect()->back()->with('status', 'Successful delete news!');
    }
}
