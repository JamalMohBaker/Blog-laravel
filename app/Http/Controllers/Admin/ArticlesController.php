<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(5);
        return view('admin.articles.index',[
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create',[
            'article' => new Article(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

            $file = $request->file('image'); // return UploadedFile object
            $path =  $file->store('uploads' , 'public'); //return file path after store
            //**public=>locale storage** / ** uploade/images file for storage**
            $data['image'] = $path;

        $article = Article::create($data);
        if($request->hasFile('gallery')){
            foreach($request->file('gallery') as $file){
                PostImage::create([
                    'article_id' => $article->id,
                    'image' =>$file->store('uploads/images','public'),
                ]);
            }

        }
        return redirect()
       ->back()
       ->with('success',"Article ({ $article->title }) created!");
               // if ($request->hasFile('gallery')) {
        //     foreach($request->file('gallery') as $file){
        //         productimage::create([
        //             'product_id' => $product->id,
        //             'image' => $file->store('uploads/images' , 'public'),
        //         ]);
        //     }
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $gallery = PostImage::where('article_id' , '=' , $article->id)->get();
        return view('admin.articles.edit' ,[
            'article' => $article,
            'gallery' => $gallery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            $file = $request->file('image'); // return UploadedFile object
            $path =  $file->store('uploads/images','public'); //return file path after store
            //**public=>locale storage** / ** uploade/images file for storage**
            $data['image'] = $path;

        }
        $old_image = $article->image;
        //Mass assignment
        $article->update($data);

        if ($old_image && $old_image != $article->image){
            Storage::disk('public')->delete($old_image);
        }

        if($request->hasFile('gallery')){
            foreach($request->file('gallery') as $file){
                PostImage::create([
                    'article_id' => $article->id,
                    'image' =>$file->store('uploads/images','public'),
                ]);
            }

        }


        return redirect()->route('articles.index')
       ->with('success',"article ({$article->title}) Updated!");
    }

    /**
     * Remove the specified resource from storage.
     **/
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')
        ->with('success',"user ({$article->title}) deleted!");
    }
    public function trashed(){
        $articles = Article::onlyTrashed()->paginate();
        return view('admin.articles.trashed',[
            'articles' => $articles ,
        ]);
    }
    public function restore($id){
        $article = Article::onlyTrashed()->findOrFail($id);
        $article->restore();
        return redirect()
               ->route('articles.index')
               ->with('success' , "Article ({$article->title}) restored");

    }
    public function forceDelete( $id)
    {
        $article = Article::onlyTrashed()->findOrFail($id);
        $article->forceDelete();
        return redirect()
                ->route('articles.index')
               ->with('success' , "Article ({$article->title}) deleted forever! ");
    }
}
