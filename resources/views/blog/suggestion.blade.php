<x-blog-layout title="Suggestions | Blog">
    <div class="container">
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
        @if(session()->has('status'))
            <script>
                alert(' {{ session('status') }}' );
            </script>
        @endif
        <div class="form mt-5">
         <form action="{{ route('suggestionss.store') }}" method="POST">
            @csrf
            <input name="user_id" type="hidden" value="{{ $user_id }}" id="">
             <div class="form-group">
                 <select class="form-control" name="type">
                     <option value="Suggestions">Suggestions </option>
                     <option value="Complaints">Complaints </option>
                 </select>
             </div>
           {{-- <input type="text" value="{{ Auth::user()->id }}" name="" id=""> --}}
             <div class="form-group">
                 <textarea class="form-control" name="subject"  rows="3">Write what you want
                 </textarea>
               </div>
             <div class="form-group text-center">
                 <button class="btn btn-outline-primary" type="submit">Send <i class="fa-solid fa-paper-plane"></i></button>
             </div>

         </form>
        </div>
     </div>




</x-blog-layout>

