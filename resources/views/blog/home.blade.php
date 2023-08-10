<x-blog-layout title="Home | Blog" :image="$image">
    @if( auth()->check() && auth()->user()->type === 'admin')
        <section id="add">
            <div class="container text-center mt-5">
                <button class="btn btn-outline-primary text-center" data-toggle="modal" data-target="#exampleModal">
                    Add Artical <i class="fa-solid fa-circle-plus ad"></i>
                </button>

            </div>
        </section>
    @endif
    <section id="posts" class="mt-5">
        <div class="container">
            <div class="row mb-3">
                @foreach ($articles as $article)
                    <!-- Start box -->
                        <div class="col-lg-4 col-md-6 col-12  mt-2 mb-2 box" >
                            <a href="{{ route('blog.articles.show' , $article->id) }}" target="_blank">
                               <x-blog-card :article="$article" />
                            </a>
                        </div>
                        <!-- End box -->
                @endforeach

            </div>
            <!-- Start pagination -->
            {{$articles->links()}}
           <!-- End pagination -->
        </div>
    </section>

    {{-- <img src="{{ '/storage/' . $image  }}" alt="image"> --}}
 <!-- Modal -->
    @if( auth()->check() && auth()->user()->type === 'admin' )
        <section id="modal">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Artical </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('articles.store') }} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="title of article">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control " name="subject" cols="30" rows="10">  </textarea>
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

                </div>
                </div>
            </div>
        </section>
    @endif

</x-blog-layout>
