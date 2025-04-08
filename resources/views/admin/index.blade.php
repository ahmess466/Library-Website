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
@include('admin.pagecontent')
@include('admin.footer')
    </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>
