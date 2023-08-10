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
              <h2>Logo</h2>
              <div class="mt-1 ml-auto">
                <a href="{{ route('logos.create')}}" type="button" class="btn btn-primary"><i class="fa-solid fa-circle-plus "></i> Add New Logo</a>
              </div>
            </div>
        </div>
        <!-- End row nav -->

         <div id="table" class="mt-3">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Logo</th>
                <th scope="col">Delete</th>

              </tr>
            </thead>
            <tbody>
             @foreach ($logos as $logo)
                <tr>
                    <th scope="row">{{ $logo->id }}</th>
                    <td><img src="/storage/{{ $logo->image }}" width="60px" height="40px" alt=""></td>
                    <td>
                        <form action="{{ route('logos.destroy', $logo->id) }}" method="post">
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
        {{ $logos->links() }}
        <!-- End pagination -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- /.content-wrapper -->

<script>
    // to hidden flash message after 5 seconed
    setTimeout(function(){
        var successMessage = document.getElementById('success-message');
        if(successMessage) {
            successMessage.style.display = 'none';
        }
    },5000);
</script>

@endsection

