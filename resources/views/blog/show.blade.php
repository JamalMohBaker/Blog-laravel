<x-blog-layout :title=" $article->title " >

    <section id="details" class="mt-5 mb-5">
        <div class="container">
            <div class="all">
               <div class="box">
                <div class="d-flex justify-content-center align-items-center">
                        <div class="card">
                            <h2 class="text-center">{{ $article->title }}</h2>
                            <div class="card-body">
                                <p class="card-text">{{ $article->subject }}</p>
                              </div>
                            <img src="{{ $article->image_url }}"  id="bigImage" class="card-img-top img-fluid" alt="...">
                            @if($images)
                            <div class="sub-image">
                                <div class="all-images d-flex justify-content-start justify-content-sm-center m-1 flex-wrap">
                                    @foreach ($images as $image)
                                        <!-- Start Sub images  -->
                                        <div class="box m-2 " >
                                            <img src="{{ $image->url }}" alt="">
                                        </div>
                                        <!-- End Sub images  -->
                                    @endforeach

                                </div>
                            </div>
                            @endif
                        </div>
                </div>

                <div class="reactions d-flex justify-content-between ml-2 mt-3 ">
                    <div class="like">

                        {{-- <div class="icon">
                            <button class="like1" >
                                @foreach ($likes as $like)
                                    @if(($user_id == $like->user_id) && ($article->id == $like->article_id) && ($like->type == '1'))
                                        <form action="{{ route('blog.articles.destroy') }}" method="POST" class="b d-none">
                                            @csrf
                                            @method('delete')
                                            <button type="submit">
                                                <i class="fa-solid fa-thumbs-up like-click liked"></i> UnLike
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('blog.articles.store') }}" method="POST" class="a ">
                                            @csrf
                                            <input type="hidden" name="type" value="1" id="">
                                            <input type="hidden" name="user_id" value=" {{ $user_id }} " id="">
                                            <input type="hidden" name="article_id" value=" {{ $article->id }} " id="">
                                            <button type="submit">
                                                <i class="fa-solid fa-thumbs-up like-click  "></i> Like
                                            </button>
                                        </form>
                                    @endif
                                @endforeach

                            </button>
                        </div> --}}
                        <div class="icon">
                            <button class="like1">
                                @php
                                    $liked = false;
                                    foreach ($likes as $like) {
                                        if ($user_id == $like->user_id && $article->id == $like->article_id && $like->type == '1') {
                                            $liked = true;
                                            break;
                                        }
                                    }
                                @endphp

                                @if ($liked)
                                    <form action="{{ route('blog.likes.destroy' , $like->id) }}" method="POST" class="unlike-form d-none">
                                        @csrf
                                        @method('delete')

                                        <button type="submit">
                                            <i class="fa-solid fa-thumbs-up like-click liked"></i> UnLike
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('blog.articles.store') }}" method="POST" class="like-form">
                                        @csrf
                                        <input type="hidden" name="type" value="1">
                                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                                        <button type="submit">
                                            <i class="fa-solid fa-thumbs-up like-click"></i> Like
                                        </button>
                                    </form>
                                @endif
                            </button>
                        </div>

                        <button class="btn count " data-toggle="modal" data-target="#exampleModal">
                         255 like
                        </button>
                    </div>
                    <div class="comment">
                        <div class="icon">
                            <button>
                               <i class="fa-regular fa-comment"></i> Comment
                            </button>
                        </div>
                    </div>
                    <div class="rate">
                        <div class="icon">
                            <button>
                                <i class="fa-solid fa-star-half-stroke"></i> Rate
                            </button>
                        </div>
                    </div>
                    <div class="favorated">
                        <div class="icon">
                            <button>
                               <i class="fa-solid fa-heart favo"></i> Favorated

                        </div>
                        {{-- {{ $rate_id->user_id }} --}}
                    </div>
                </div>
                  <div class="add-comment dis">
                    <form action="{{ route('blog.articles.store1', $user_id )}}" method="POST">
                        @csrf
                        <div class="form-group d-flex">
                            <input type="text" class="form-control"  name="comment" placeholder="Write your comment">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <button type="submit" class="ml-2"><i class="fa-solid fa-paper-plane"></i></button>
                        </div>
                    </form>
                  </div>
                  @if($rate_id)
                    @if(!($rate_id->user_id == $user_id) && ($rate->article->id == $article->id ) )
                        <div class="add-rate dis ">
                            <form action="{{ route('blog.articles.storeRate' , $user_id  )}}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user_id }}">
                                <input type="hidden" name="article_id" value="{{ $article->id }}">
                                <div class="form-group d-flex">
                                    <select class="form-control" name="rate">
                                    <option value="1">1 Star</option>
                                    <option value="2">2 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="5">5 Stars</option>
                                    </select>
                                    <button type="submit" class="ml-2"><i class="fa-solid fa-paper-plane"></i></button>
                                </div>
                            </form>
                        </div>
                    @endif
                  @else
                  <div class="add-rate dis ">
                    <form action="{{ route('blog.articles.storeRate' , $user_id  )}}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="form-group d-flex">
                            <select class="form-control" name="rate">
                            <option value="1">1 Star</option>
                            <option value="2">2 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="5">5 Stars</option>
                            </select>
                            <button type="submit" class="ml-2"><i class="fa-solid fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
                  @endif
               </div>
               <h3>Comments & Rate</h3>
               <div class="comments mt-3">

                <!-- Start Comments -->


                    @foreach($comments as $comment)
                        @if($article->id == $comment->article->id)
                            <div class="box">
                                <div class="image-star  mt-2 d-flex ">
                                    <img src="{{ $comment->user->image_url }}" alt="">
                                    <div class="start ml-2 mt-3">
                                        @if($rates)

                                         @foreach ($rates as $rate)
                                            @if($rate_id == $rate->user->id)
                                                @if($comment->user->id == $rate->user->id )
                                                        @php
                                                            $rate_number = $rate->rate;
                                                        @endphp
                                                        @for ($i = 0; $i < $rate_number; $i++)
                                                            <i class="fa-solid fa-star"></i>
                                                        @endfor
                                                @endif
                                            @endif
                                         @endforeach

                                        @endif
                                        <h5>{{ $comment->user->firstname }}</h5>
                                    </div>
                                </div>
                                <p class="ml-3">
                                    {{ $comment->comment }}
                                </p>
                            </div>
                        @endif
                        <!-- End Comments -->
                    @endforeach

               </div>
            </div>
        </div>
    </section>



    <!-- Modal -->
    <section id="modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">255 like </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body scroll">
                    <div class="all ">
                        <!-- Start box -->
                        <div class="box d-flex mt-3">
                            <img src="images/logo.jpg" alt="">
                            <h5 class="mt-3 ml-3">FirstName</h5>
                        </div>
                        <!-- End box -->
                        <!-- Start box -->
                        <div class="box d-flex mt-3">
                            <img src="images/logo.jpg" alt="">
                            <h5 class="mt-3 ml-3">FirstName</h5>
                        </div>
                        <!-- End box -->
                        <!-- Start box -->
                        <div class="box d-flex mt-3">
                            <img src="images/logo.jpg" alt="">
                            <h5 class="mt-3 ml-3">FirstName</h5>
                        </div>
                        <!-- End box -->
                        <!-- Start box -->
                        <div class="box d-flex mt-3">
                            <img src="images/logo.jpg" alt="">
                            <h5 class="mt-3 ml-3">FirstName</h5>
                        </div>
                        <!-- End box -->
                        <!-- Start box -->
                        <div class="box d-flex mt-3">
                            <img src="images/logo.jpg" alt="">
                            <h5 class="mt-3 ml-3">FirstName</h5>
                        </div>
                        <!-- End box -->
                        <!-- Start box -->
                        <div class="box d-flex mt-3">
                            <img src="images/logo.jpg" alt="">
                            <h5 class="mt-3 ml-3">FirstName</h5>
                        </div>
                        <!-- End box -->
                        <!-- Start box -->
                        <div class="box d-flex mt-3">
                            <img src="images/logo.jpg" alt="">
                            <h5 class="mt-3 ml-3">FirstName</h5>
                        </div>
                        <!-- End box -->
                        <!-- Start box -->
                        <div class="box d-flex mt-3">
                            <img src="images/logo.jpg" alt="">
                            <h5 class="mt-3 ml-3">FirstName</h5>
                        </div>
                        <!-- End box -->
                        <!-- Start box -->
                        <div class="box d-flex mt-3">
                            <img src="images/logo.jpg" alt="">
                            <h5 class="mt-3 ml-3">FirstName</h5>
                        </div>
                        <!-- End box -->
                        <!-- Start box -->
                        <div class="box d-flex mt-3">
                            <img src="images/logo.jpg" alt="">
                            <h5 class="mt-3 ml-3">FirstName</h5>
                        </div>
                        <!-- End box -->
                        <!-- Start box -->
                        <div class="box d-flex mt-3">
                            <img src="images/logo.jpg" alt="">
                            <h5 class="mt-3 ml-3">FirstName</h5>
                        </div>
                        <!-- End box -->
                    </div>
                </div>

            </div>
            </div>
        </div>
    </section>


</x-blog-layout>
