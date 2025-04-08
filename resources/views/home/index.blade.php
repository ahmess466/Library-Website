<!DOCTYPE html>
<html lang="en">

    <head>

@include('home.css')
    </head>

<body>

   @include('home.header')

    <!-- ***** Main Banner Area Start ***** -->
        @include('home.main')
    <!-- ***** Main Banner Area End ***** -->
    <!-- ***** Category Area Start ***** -->
        @include('home.category')
    <!-- ***** Category Area End ***** -->


    <!-- ***** Market Area Start ***** -->

    @include('home.market')

        <!-- ***** Market Area End ***** -->

            <!-- ***** Footer Area Start ***** -->

            @include('home.footer')
            <!-- ***** Footer Area End ***** -->


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    @include('home.script')

    </body>
</html>
