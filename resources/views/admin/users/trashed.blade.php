@extends('layouts.admin')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <!-- start row nav -->
        <div class="row">
            <div class="col-12 d-flex">
              <h2>Users</h2>
              <div class="mt-1 ml-auto">
                <a href="{{ route('users.index') }}" type="button" class="btn btn-primary"><i class="fa-solid fa-rotate-left"></i> List Of Users</a>
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
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Phone</th>
                <th scope="col">Restore</th>
                <th scope="col">Force Delete</th>
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
                        <td>
                            <form action="{{ route('users.restore', $user->id) }}" method="post">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-primary"><i class="fas fa-trash-restore"></i> Restore</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('users.force-delete', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Force Delete</button>
                            </form>
                        </td>
                     </tr>
                @endforeach
            </tbody>
          </table>
         </div>
        <!-- Start pagination -->
        {{ $users->links() }}
        <!-- End pagination -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
