@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <!-- start row nav -->
        <div class="row">
            @if(session()->has('success'))
                <div id="success-message" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-12 d-flex">
              <h2>Users</h2>
              <div class="mt-1 ml-auto">
                <a href="{{ route('users.trashed') }}" type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i> View Trashed</a>
              </div>
            </div>
        </div>
        <!-- End row nav -->

         <div id="table" class="mt-3">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Image</th>
                <th scope="col">FName</th>
                <th scope="col">E-mail</th>
                <th scope="col">Phone</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td><img src="{{ $user->image_url }}" style="border-radius: 50%" alt=""></td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->type }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                        <a href="{{ route('users.edit', $user->id) }}"
                        class="btn btn-outline-primary">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach


            </tbody>
          </table>
         </div>
        <!-- Start pagination -->
        {{$users->links()}}
        <!-- End pagination -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
