<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.users.index',[
            'users' => $users,
        ]);
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
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        $userTypes = User::userTypes();
        $status_options = User::statusOptions();
        return view('admin.users.edit' , [
            'user' => $user,
            'userTypes' => $userTypes,
            'status_options' => $status_options,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        // dd($user);
        $data = $request->validated();
        // $user->update($data);
        $user->update($data);
        return redirect()->route('users.index')
       ->with('success',"User ({$user->firstname}) Updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
        ->with('success',"user ({$user->firstname}) deleted!");
    }
    public function trashed(){
        $users = User::onlyTrashed()->paginate();
        return view('admin.users.trashed',[
            'users' => $users ,
        ]);
    }
    public function restore($id){
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();
        return redirect()
               ->route('users.index')
               ->with('success' , "User ({$user->firstname}) restored");

    }
    public function forceDelete( $id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect()
                ->route('users.index')
               ->with('success' , "User ({$user->firstname}) deleted forever! ");
    }
}
