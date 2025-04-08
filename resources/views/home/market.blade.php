<div class="currently-market">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <div class="line-dec"></div>
                    <h2><em>Items</em> Currently In The Market.</h2>
                </div>
            </div>

            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-bs-dismiss='alert' aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>

            @endif
            <div class="col-lg-6">
                <div class="filters">
                    <ul>
                        <li data-filter="*"  class="active">All Books</li>
                          @foreach ($categories as $category)
                        <li data-filter=".msc"><a href="{{route('category.search',$category->id)}}">{{$category->cat_title}}</a></li>
                          @endforeach



                      </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row grid">
                    @foreach ($books as $book)

                    <div class="col-lg-6 currently-market-item all msc">
                        <div class="item">
                            <div class="left-image">
                                <img src="{{asset('book/'.$book->book_img)}}" alt="" style="border-radius: 20px; min-width: 195px;">
                            </div>
                            <div class="right-content">
                                <h4>{{$book->title}}</h4>
                                <span class="author">
                                    <img src="{{asset('author/'.$book->author_img)}}" alt="" style="max-width: 50px; border-radius: 50%;">
                                    <h6>{{$book->author_name}}</h6>
                                </span>
                                <div class="line-dec"></div>
                                <span class="bid">
                                    Current Available<br><strong>{{$book->quantity}}</strong><br>
                                </span>
                                <span class="ends">
                                    Total<br><strong>{{$book->quantity}}</strong><br>
                                </span>
                                <div class="text-button">
                                    <a href="details.html">
                                        @foreach ($categories as $category)
                                        @if ($category->id == $book->category_id)
                                            {{$category->cat_title}}
                                        @endif
                                    @endforeach</a>
                                </div>
                                <div class="text-button">
                                    <a href="{{route('book.details', $book->id)}}">View Item Details</a>
                                </div>
                                <div class="text-button">
                                    <a href="{{route('book.borrow',$book->id)}}" class="btn btn-primary text-white" >Apply To Borrow</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach






                </div>
            </div>
        </div>
    </div>
</div>
