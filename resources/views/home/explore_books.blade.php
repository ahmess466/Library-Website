<!DOCTYPE html>
<html lang="en">

    <head>

@include('home.css')
    </head>

<body>

   @include('home.header')

   <div class="discover-items">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading">

            <h2>Discover Some Of Our <em>Items</em>.</h2>
          </div>
        </div>
        {{-- <div class="col-lg-7">
          <form id="search-form" name="gs" method="submit" role="search" action="#">
            <div class="row">
              <div class="col-lg-4">
                <fieldset>
                    <input type="text" name="keyword" class="searchText" placeholder="Type Something..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-3">
                <fieldset>
                    <select name="Category" class="form-select" aria-label="Default select example" id="chooseCategory" onchange="this.form.click()">
                        <option selected>All Categories</option>
                        <option type="checkbox" name="option1" value="Music">Music</option>
                        <option value="Digital">Digital</option>
                        <option value="Blockchain">Blockchain</option>
                        <option value="Virtual">Virtual</option>
                    </select>
                </fieldset>
              </div>
              <div class="col-lg-3">
                <fieldset>
                    <select name="Price" class="form-select" aria-label="Default select example" id="chooseCategory" onchange="this.form.click()">
                        <option selected>Available</option>
                        <option value="Ending-Soon">Ending Soon</option>
                        <option value="Coming-Soon">Coming Soon</option>
                        <option value="Closed">Closed</option>
                    </select>
                </fieldset>
              </div>
              <div class="col-lg-2">
                <fieldset>
                    <button class="main-button">Search</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div> --}}
        <form action="{{route('search.books')}}" method="GET">
            @csrf

        <div class="row" style="margin: 20px;">
                <div class="col-md-8">
                    <input type="search" name="search" class="form-control" placeholder="Search for books..." aria-label="Search">
                </div>
                <div class="col-md-4">
                    <input type="submit" class="btn btn-primary" value="Search">
                </div>
        </div>
    </form>


       <div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>Items</em> Currently In The Market.</h2>
          </div>
        </div>
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
            @foreach ($data as $book)
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
                    <div class="col-12 align-content-center">
                        <span class="bid">
                          Category : <br><strong><a href="">{{$book->category->cat_title}}</a></strong><br>
                        </span>
                      </div>
                    <div class="text-button">
                        <a href="{{route('book.details', $book->id)}}">View Item Details</a>                    </div>
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



      </div>
    </div>
  </div>

            <!-- ***** Footer Area Start ***** -->

            @include('home.footer')
            <!-- ***** Footer Area End ***** -->


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    @include('home.script')

    </body>
</html>
