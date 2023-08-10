<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\LikeRequest;
use App\Http\Requests\RateRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use App\Models\PostImage;
use App\Models\Rate;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LikeRequest $request)
    {
        $data = $request->validated();
        Like::create($data);
        return redirect()->back();
    }
    public function store1(CommentRequest $request)
    {
        // this for add comment
        $data = $request->validated();
        Comment::create($data);
        return redirect()->back();
    }
    public function storeRate(RateRequest $request)
    {
        $data = $request->validated();
        Rate::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        $images = $article->images;
        $user_id = auth()->user()->id;
        $likes = Like::get();
        $comments = Comment::get();
        $rates = Rate::get();
        $rate_id = Rate::where('user_id' ,  $user_id)->first();

        return view('blog.show',[
            'article' => $article ,
            'images' => $images ,
            'user_id' => $user_id ,
            'likes' => $likes ,
            'comments' => $comments ,
            'rates' => $rates ,
            'rate_id' => $rate_id ,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Like $like)
    // {
    //     dd($like);
    //     $like->delete();
    //     return redirect()->back();
    // }
}
