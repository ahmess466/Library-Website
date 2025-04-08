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
                <form action="{{ route('book.update', $book->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf

                <div>
                    <Label>Book Title</Label>
                    <input type="text" name="title" class="form-control" placeholder="Book Title" value="{{$book->title}}">

                </div>
                <div>
                    <Label>Author Name</Label>
                    <input type="text" name="author_name" class="form-control" placeholder="Author Name" value="{{$book->author_name}}">

                </div>
                <div>
                    <Label>Price</Label>
                    <input type="number" name="price" class="form-control" placeholder="Price" value="{{$book->price}}">

                </div>

                <div>
                    <Label>Description</Label>
                    <input type="text" name="description" class="form-control" placeholder="Description" value="{{$book->description}}">

                </div>
                <div>
                    <Label>Book Quantity</Label>
                    <input type="number" name="quantity" class="form-control" placeholder="Book Quantity" value="{{$book->quantity}}">

                </div>
                <div>
                    <Label>Book Image</Label>
                    <input type="file" name="book_img" class="form-control" placeholder="Book Image">
                    @if($book->book_img)
                        <div class="mt-2">
                            <img src="{{ asset('book/' . $book->book_img) }}" alt="Book Image" style="max-width: 150px; max-height: 150px;">
                        </div>
                    @endif
                </div>
                <div>
                    <Label>Author Image</Label>
                    <input type="file" name="author_img" class="form-control" placeholder="Author Image">
                    @if($book->author_img)
                        <div class="mt-2">
                            <img src="{{ asset('author/' . $book->author_img) }}" alt="Author Image" style="max-width: 150px; max-height: 150px;">
                        </div>
                    @endif
                </div>
                <div>
                    <Label>Book Category</Label>
                    <select class="form-control" required name="category_id">
                        <option >Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{ $book->category_id == $category->id ? 'selected' : '' }}>{{$category->cat_title}}</option>

                        @endforeach
                    </select>


                </div>
                <div>
                    <input type="submit" class="btn btn-primary " value="Update Book">
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
