<!DOCTYPE html>
<html lang="en">

    <head>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

       <title>{{$book->title}} - Color Book</title>

       <!-- Bootstrap core CSS -->
       <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


       <!-- Additional CSS Files -->
       <link rel="stylesheet" href="assets/css/fontawesome.css">
       <link rel="stylesheet" href="assets/css/templatemo-liberty-market.css">
       <link rel="stylesheet" href="assets/css/owl.css">
       <link rel="stylesheet" href="assets/css/animate.css">
       <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

@include('home.css')
    </head>

<body>

   @include('home.header')







     <div class="item-details-page">
       <div class="container">
         <div class="row">
           <div class="col-lg-12">
             <div class="section-heading">
               <div class="line-dec"></div>
               <h2>View Details <em>For Item</em> Here.</h2>
             </div>
           </div>
           <div class="col-lg-7">
             <div class="left-image">
               <img src="{{ asset('book/' . $book->book_img) }}" alt="" style="border-radius: 20px;">
             </div>
           </div>
           <div class="col-lg-5 align-self-center">
             <h4>{{$book->title}}</h4>
             <span class="author">
               <img src="assets/images/author-02.jpg" alt="" style="max-width: 50px; border-radius: 50%;">
               <h6>{{$book->author_name}}</h6>
             </span>
             <p>{{$book->description}}</p>
             <div class="row">
               <div class="col-3">
                 <span class="bid">
                   Available<br><strong>{{$book->quantity}}</strong><br>
                 </span>
               </div>

               <div class="col-5">
                 <span class="ends">
                   Total Quantity<br><strong>{{$book->quantity}}</strong><br>
                 </span>
               </div>
             </div>
             <div class="col-12 align-content-center">
                <span class="bid">
                  Price<br><strong>{{$book->price}} $</strong><br>
                </span>
              </div>
              <div class="col-12 align-content-center">
                <span class="bid">
                  Category : <br><strong><a href="">{{$book->category->cat_title}}</a></strong><br>
                </span>
              </div>

           </div>

     </div>
       </div>
         </div>



     <!-- Scripts -->
     <!-- Bootstrap core JavaScript -->
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

     <script src="assets/js/isotope.min.js"></script>
     <script src="assets/js/owl-carousel.js"></script>

     <script src="assets/js/tabs.js"></script>
     <script src="assets/js/popup.js"></script>
     <script src="assets/js/custom.js"></script>


            @include('home.footer')
            <!-- ***** Footer Area End ***** -->


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    @include('home.script')

    </body>
</html>
