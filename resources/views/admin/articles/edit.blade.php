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
              <h2>Edit Article</h2>

            </div>
        </div>
        <!-- End row nav -->
        <!-- Start Edit -->

        <div class="container-fluid">
           <div class="row">
            <div class="col-8">
                <form action="{{ route('articles.update' , $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title" value="{{ $article->title }}" placeholder="title of article">
                        @error('title')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="subject" class="form-control @error('subject') is-invalid @enderror " cols="30" rows="10"> {{ $article->subject }} </textarea>
                        @error('subject')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload Main image</span>
                        </div>
                        <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon02">Upload Sub images</span>
                        </div>
                        <div class="custom-file">
                        <input type="file" multiple class="custom-file-input" name="gallery[]" id="inputGroupFile02" aria-describedby="inputGroupFileAddon02">
                        <label class="custom-file-label" for="inputGroupFile02">Choose files</label>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit"> <i class="fa-solid fa-cloud-arrow-up"></i> Update</button>
                    </div>

                </form>
            </div>
            <div class="col-4">
                <div class="main-image">
                    <h2>Main Image</h2>
                    <img src="{{ $article->image_url}}" class="img-fluid" alt="">
                </div>
                @if($gallery)
                    <div class="sub-image">
                        <h2>Sub Images</h2>
                        <div class="d-flex flex-wrap">
                            @foreach($gallery as $image)
                                <img src="{{ $image->url }}" width="150" class="img-fluid m-1" alt="">
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
           </div>
        </div>

        <!-- End Edit -->


      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
