<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            .div_center {

                margin: auto;
                width: 75%;
                padding: 10px;
            }
            .alert{
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
                margin-top: 50px ;
                border: 1px solid white;
            }
            th{
                background-color: skyblue ;
                padding: 10px;

            }
            tr{
                border: 1px solid white;
                padding: 10px;

            }
            td{
                padding: 10px;
                border: 1px solid white;
            }
        </style>
        @include('admin.css')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </head>
    <body>
        @include('admin.header')
        <div class="d-flex align-items-stretch">
            <!-- Sidebar Navigation-->
            @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
    <div class="page-content">

        <div class="page-header">
            <div class="alert">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>

                @endif
            </div>
            <div class="container-fluid">
                <div class="div_center">
                    <div class="d-flex justify-content-center">

                        <h5>Books Page</h5>
                    </div>


                </div>
    </div>
        </div>

     <div>
        <table class="center">
            <tr>
                <th>Book ID</th>
                <th>Book Title</th>
                <th>Author Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Book Quantity</th>
                <th>Book Image</th>
                <th>Author Image</th>
                <th>Category</th>
                <th>Action</th>
                {{-- <th>Action</th> --}}
            </tr>
            @foreach ($books as $book)

            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->author_name}}</td>
                <td>{{$book->price}}</td>
                <td>{{$book->description}}</td>
                <td>{{$book->quantity}}</td>
                <td><img src="{{asset('book/'.$book->book_img)}}" alt="Book Image" style="width: 100px; height: 100px;"></td>
                <td><img src="{{asset('author/'.$book->author_img)}}" alt="Author Image" style="width: 100px; height: 100px;"></td>

                <td>
                    @foreach ($categories as $category)
                        @if ($category->id == $book->category_id)
                            {{$category->cat_title}}
                        @endif
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-info text-white" href="{{url('book_edit',$book->id)}}" > Edit </a>
                    <a onclick="confirmation(event)" href="{{url('book_delete',$book->id)}}" class="btn btn-danger">Delete</a>


            </tr>
            @endforeach
        </table>
     </div>

    </div>


    @include('admin.footer')
    <script type="text/javascript">
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute("href");
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                }
            });
        }

        </script>



    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>

