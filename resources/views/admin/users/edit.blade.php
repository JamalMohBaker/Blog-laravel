@php
  use Carbon\Carbon ;

@endphp
@extends('layouts.admin')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            @if($errors->any())
                <div class="alert alert-danger">
                    you have some errors:
                    <ul>
                        @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <!-- start row nav -->
                <div class="">
                    <h2>Now Your edit user <span class="btn-info p-1"> {{$user->firstname }} </span>
                         and his id <span class="btn-info p-2"> {{  $user->id }} </span> </h2>
                    , and this is his picture
                    <img src="{{ $user->image_url }}"  style="border-radius: 50%" alt="">
                </div>
            <form action="{{ route('users.update' , $user->id) }}" method="post" >
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="row">

                        <div class="col-12">
                            <div class="form-group ">
                                <label for="exampleFormControlSelect1">User Status</label>
                                <select class="form-control @error('type') is-invalid @enderror " id="exampleFormControlSelect1" name="type">
                                    @foreach ($userTypes as $type)
                                        <option @selected($type ==  old('type',$user->type)) value="{{ $type }}" >
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                    @error('type')
                                     <p class="text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="exampleFormControlSelect1">User Status</label>
                                <select class="form-control @error('status') is-invalid @enderror " id="exampleFormControlSelect1" name="status">
                                    @foreach ($status_options as $status)
                                        <option @selected($status ==  old('type',$user->status)) value="{{ $status }}" >
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                    @error('status')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                   @enderror
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="exampleFormControlSelect1">email_verified_at</label>
                                <select class="form-control @error('status') is-invalid @enderror " id="exampleFormControlSelect1" name="email_verified_at">
                                    @if($user->email_verified_at == null)
                                        <option value="null"></option>
                                        <option value="{{ Carbon::now()->format('Y-m-d h:i A') }}">{{ Carbon::now()->format('Y-m-d h:i A') }}</option>
                                    @else
                                        <option value="{{ $user->email_verified_at }}" >
                                                {{ $user->email_verified_at }}
                                        </option>
                                    @endif

                                    @error('status')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                   @enderror
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="form-group">
                                <label for="">email_verified_at</label>
                                <input class="form-control @error('email_verified_at') is-invalid @enderror " type="text" name="email_verified_at" value="{{ Carbon::now()->format('Y-m-d h:i A') }}" id="">
                            </div>
                        </div> --}}


                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-info"> <i class="fa-solid fa-paper-plane"></i> Update </button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection
