<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuggestionRequest;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('blog.suggestion');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd();
        $user_id = auth()->user()->id;
        // dd($user_id);
        return view('blog.suggestion' , [
            'suggestion' => new Suggestion(),
            'user_id' => $user_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuggestionRequest $request , Suggestion $suggestion)
    {
        $data = $request->validated();
        $suggestion = Suggestion::create($data);

        return redirect()->back()->with('status' , " {{ $suggestion->type }} send!");
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
    public function destroy(string $id)
    {
        //
    }
}
