<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogoRequest;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $logos = Logo::paginate(5);
        return view('admin.logos.index',[
            'logos' => $logos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.logos.create',[
            'logo' => new Logo(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LogoRequest $request)
    {
            $data = $request->validated();
            $file = $request->file('image');
            $path = $file->store('uploads' , 'public');
            $data['image'] = $path;
            $logo = Logo::create($data);
            return redirect()
            ->route('logos.index')
            ->with('success',"Logo Successfully created!");
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
    public function destroy(Logo $logo)
    {
        $logo->delete();
        Storage::disk('public')->delete($logo->image);
        return redirect()
            ->route('logos.index')
            ->with('success', "Logo Successfully Deleted!");
    }
}
