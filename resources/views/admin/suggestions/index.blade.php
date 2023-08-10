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
            <div class="col-12 ">
              <h2>Suggestions & Complaints</h2>
            </div>
        </div>
        <!-- End row nav -->
        <div class="row">

            <div class="col bg-dark p-5">
                @foreach ($suggestions as $suggestion)
                    <h2 class="text-center">{{ $suggestion->type }}</h2>
                    <p>From / {{ $suggestion->user->firstname }}</p>
                    <p>E-mail / {{ $suggestion->user->email }}</p>
                    <p>Pohone / {{ $suggestion->user->phone }}</p>
                    <div class="text bg-light p-2">
                        {{ $suggestion->subject}}
                    </div>
                    <td>
                        <form action="{{ route('suggestions.destroy', $suggestion->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger mt-2 text-center "><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </td>
                @endforeach
            </div>
        </div>

        <!-- Start pagination -->
            <div class="mt-3">
                {{ $suggestions->links() }}
            </div>
        <!-- End pagination -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection

