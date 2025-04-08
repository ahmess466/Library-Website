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

                        <h5>Edit Category</h5>
                    </div>
                    <form action="{{route('category.update',$category->id)}}" method="POST" >
                        @csrf
                        <div class="form-group">
                        <label for="Category">Category Name</label>
                        <input type="text" class="form-control" name="cat_title" id="category" value="{{$category->cat_title}}">
                        <div class="d-flex justify-content-center p-2">
                            <button type="submit" class="btn btn-success">Edit Category</button>
                        </div>
                    </div>
                    </form>

                </div>
    </div>
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
                window.location.href = link;
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    }

    </script>



    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>
