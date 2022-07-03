<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class SearchController extends Controller
{
    function search(Request $request){
        
        $users = User::all();

        if(isset($_GET['query'])){
        $search_title = $_GET['query'];
        $news = News::orderBy('created_at', 'DESC')
        ->where('title', 'LIKE', '%' .$search_title. '%')->Paginate(20);
        $news->appends($request->all());

        return view('/search-news', compact('news', 'users'));

        }else{
        return view('/');
        }
    }
}
