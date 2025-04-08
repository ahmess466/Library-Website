<!DOCTYPE html>
<html lang="en">

    <head>
        <style type="text/css">
            .div_center {
                margin: auto;
                width: 75%;
                padding: 10px;
            }
            .alert {
                margin: auto;
                width: 75%;
                padding: 10px;
                text-align: center;
            }
            .center {
                margin: auto;
                width: 75%;
                padding: 10px;
                text-align: center;
                margin-top: 50px;
                border: 1px solid white;
            }
            th {
                background-color: skyblue;
                padding: 10px;
            }
            tr {
                border: 1px solid white;
                padding: 10px;
            }
            td {
                padding: 10px;
                border: 1px solid white;
            }
        </style>

@include('home.css')
    </head>

<body>

   @include('home.header')


        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>

            @endif
            @foreach ($borrows as $borrow)
            <div class="item-details-page">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>View Details <em>For Book Request</em> Here.</h2>
                      </div>
                    </div>
                    <div class="col-lg-7">
                      <div class="left-image">
                        <img src="{{ asset('book/' . $borrow->book->book_img) }}" alt="" style="border-radius: 20px;">
                      </div>
                    </div>
                    <div class="col-lg-5 align-self-center">
                      <h4>{{$borrow->book->title}}</h4>
                      <span class="author">
                        <img src="assets/images/author-02.jpg" alt="" style="max-width: 50px; border-radius: 50%;">
                        <h6 class="text-danger">{{$borrow->book->author_name}}</h6>
                      </span>
                      <p>{{$borrow->book->description}}</p>

                      <div class="col-12 align-content-center">
                         <span class="bid">
                           Status<br><strong>    @if ($borrow->status == 'applied')
                            <span class="badge badge-warning">Applied</span>
                        @elseif ($borrow->status == 'approved')
                            <span class="badge badge-success">Approved</span>
                        @else
                            <span class="badge badge-danger">Rejected</span>
                        @endif </strong><br>
                         </span>
                       </div>
                       <div class="col-12 align-content-center">
                        <span class="bid">
                          Date Of Request<br><strong>{{$borrow->created_at}} </strong><br>
                        </span>
                      </div>
                      <div>
                        <span class="bid">
                            @if ($borrow->status == 'applied')
                                <a href="{{route('cancel.request',$borrow->id)}}"  class="btn btn-info">Cancel Request</a>


                            @endif
                        </span>

                      </div>

                    </div>

              </div>
                </div>
                  </div>
            @endforeach
        </div>


            <!-- ***** Footer Area Start ***** -->

            @include('home.footer')
            <!-- ***** Footer Area End ***** -->


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    @include('home.script')

    </body>
</html>
