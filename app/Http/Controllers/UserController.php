<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;


class UserController extends Controller
{

    public function get_news($userId){
    $user = User::find($userId);

    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }
    $userAge = $user->age;
    $news = News::where('age_restriction', '<=', $userAge)->get();
    return response()->json(['news' => $news]);
    }

    function post_articles(Request $request){
        $news=Article::create([
         'content'=>$request->content,
        'news_id'=>$request->news_id,
        'user_id'=>$request->user_id]);
        return response()->json(["created_news"=>$news]);
    }
}
