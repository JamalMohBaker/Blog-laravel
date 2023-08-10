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
              <h2>Create Articles</h2>
              <div class="mt-1 ml-auto">
                <a type="button" href="{{ route('articles.index') }}" class="btn btn-primary"><i class="fa-solid fa-rotate-left"></i> List of News</a>
              </div>
            </div>
        </div>
        <!-- End row nav -->
        <!-- Start create  -->
        <div class="container-fluid">
            <form action="{{ route('articles.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $article->title }}" name="title" placeholder="title of article">
                </div>
                <div class="form-group">
                    <textarea class="form-control " name="subject" cols="30" rows="10"> {{ $article->subject }} </textarea>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload Main image</span>
                    </div>
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon02">Upload Gallery images</span>
                    </div>
                    <div class="custom-file">
                    <input type="file" multiple class="custom-file-input" name="gallery[]" id="inputGroupFile02" aria-describedby="inputGroupFileAddon02">
                    <label class="custom-file-label" for="inputGroupFile02">Choose files</label>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary" type="submit">Post</button>
                </div>

            </form>
        </div>
        <!-- End create  -->

      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
