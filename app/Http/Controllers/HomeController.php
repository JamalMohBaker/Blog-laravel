<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::latest('updated_at')
                    ->select('*' , DB::raw("SUBSTRING_INDEX(subject, ' ', 33) as short_subject"))
                    ->filter($request)
                    ->paginate(9);
        $logo = Logo::latest('updated_at')->first();
        $image = $logo->image;
        return view('blog.home' , [
            'articles' => $articles,
            'image' => $image,
        ]);
    }

    public function show($id){

    }
}
