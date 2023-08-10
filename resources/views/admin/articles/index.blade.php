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
              <h2>Articles</h2>
              <div class="mt-1 ml-auto">
                <a href="{{ route('articles.create') }}" type="button" class="btn btn-primary"><i class="fa-solid fa-circle-plus "></i> Create Article</a>
                <a href="{{ route('articles.trashed') }}" type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i> View Trashed</a>
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
                <th scope="col">title</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        {{-- src="/storage/{{ $logo->image }}"  --}}
                        <th scope="row">{{ $article->id }}</th>
                        {{-- <td><img src="storage/{{ $article->image_url }}" width="60px" alt=""></td> --}}
                        <td><img src="{{ $article->image_url }}" width="60px" alt=""></td>
                        <td>{{ $article->subject }}</td>
                        <td>
                        <a href="{{ route('articles.edit' , $article->id )  }}" class="btn btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>
                        </td>
                        <td>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="post">
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
        {{ $articles->links()}}
        <!-- End pagination -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
