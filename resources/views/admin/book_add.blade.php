<!DOCTYPE html>
<html>
    <head>
        @include('admin.css')

    </head>
    <body>
        @include('admin.header')
        <div class="d-flex align-items-stretch">
            <!-- Sidebar Navigation-->
            @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
            <div>
                <h1>Add Books </h1>
                <form action="{{route('book.create')}}" enctype="multipart/form-data" method="POST">
                    @csrf

                <div>
                    <Label>Book Title</Label>
                    <input type="text" name="title" class="form-control" placeholder="Book Title">

                </div>
                <div>
                    <Label>Author Name</Label>
                    <input type="text" name="author_name" class="form-control" placeholder="Author Name">

                </div>
                <div>
                    <Label>Price</Label>
                    <input type="number" name="price" class="form-control" placeholder="Price">

                </div>

                <div>
                    <Label>Description</Label>
                    <input type="text" name="description" class="form-control" placeholder="Description">

                </div>
                <div>
                    <Label>Book Quantity</Label>
                    <input type="number" name="quantity" class="form-control" placeholder="Book Quantity">

                </div>
                <div>
                    <Label>Book Image</Label>
                    <input type="file" name="book_img" class="form-control" placeholder="Book Image">
                </div>
                <div>
                    <Label>Author Image</Label>
                    <input type="file" name="author_img" class="form-control" placeholder="Author Image">
                </div>
                <div>
                    <Label>Book Category</Label>
                    <select class="form-control" required name="category_id">
                        <option >Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->cat_title}}</option>

                        @endforeach
                    </select>
                </div>

                <div>
                    <input type="submit" class="btn btn-primary " value="Add Book">
                </div>
            </form>




                </div>

            </div>
        </div>
      </div>
@include('admin.footer')
    </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>
