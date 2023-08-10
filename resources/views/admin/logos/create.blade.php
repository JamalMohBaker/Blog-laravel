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
              <h2>Add new Logo</h2>
              <div class="mt-1 ml-auto">
                <a href="{{ route('logos.index') }}" type="button" class="btn btn-primary"><i class="fa-solid fa-rotate-left"></i>  List Of Logo</a>
              </div>
            </div>
        </div>
        <!-- End row nav -->
        <div class="container-fluid">
            <form action="{{ route('logos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mt-5">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input @error('image') is-invalid @enderror"  name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">

                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>

                    </div>
                  </div>
                         @error('logo')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                 <button class="btn btn-primary mt-3 " type="submit">Add Logo </button>
            </form>
        </div>


      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- /.content-wrapper -->

@endsection
