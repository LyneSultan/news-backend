<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class AdminController extends Controller
{
    function create_news(Request $request){
        $news=News::create(['title'=>$request->title,
        'content'=>$request->content,
        'age_restriction'=>$request->age]);
        return response()->json(["created_news"=>$news]);

    }
    function edit_news(Request $request,$id){
        $news= News::find($id)->update([
        'title'=>$request->title,
        'content'=>$request->content,
        'age_restriction'=>$request->age
        ]);
        return response()->json([
            "updated_news" => $news
        ]);

    }
    function delete_news(Request $request,$id){
        $news = News::find($id);

        if (!$news) {
            return response()->json([
                "error" => "News item not found."
            ], 404);
        }
        $news->delete();
        $news=News::find($request->id)->delete();
        return response()->json([
            "deleted_news" => $news
        ]);
    }
    function restrict_news(Request $request,$id){
        $news= News::find($id)->update([
        'age_restriction'=>$request->age_restriction,
        ]);
        return response()->json([
            "updated_news" => $news
        ]);

    }
}
