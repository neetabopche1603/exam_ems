 <!-- header -->
 <header>
   <!-- header inner -->
   <div class="header-top">
     <div class="header">
       <div class="container-fluid">
         <div class="row">
           <div class="col-xl-2 col-lg-4 col-md-4 col-sm-3 col logo_section">
             <div class="full">
               <div class="center-desk">
                 <div class="logo">
                   <a href="index.html"><img src="{{asset('frontend/images/logo.png')}}" alt="#" /></a>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-xl-10 col-lg-8 col-md-8 col-sm-9">
             <div class="header_information">
               <div class="menu-area">
                 <div class="limit-box">
                   <nav class="main-menu ">
                     <ul class="menu-area-main">
                       <li class="active"> <a href="#">Home</a> </li>
                       <li> <a href="#courses">My Courses </a> </li>
                       <li> <a href="{{route('exam')}}">Exam</a> </li>
                       <li> <a href="#about">About</a> </li>
                       <li> <a href="#learn">My Profile</a> </li>
                       <li> <a href="#important">Become an Instructor</a> </li>
                       <li> <a href="#contact">Contact</a> </li>

                     </ul>
                   </nav>
                 </div>
               </div>

               <div class="mean-last">
                 @if (Route::has('login'))
                 @auth
                 <nav class="navbar navbar-expand-lg">
                   <div class="collapse navbar-collapse" id="navbarNavDropdown">
                     <ul class="navbar-nav">
                       <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           {{ Auth::user()->name }}
                         </a>
                         <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                           <a class="dropdown-item text-warning" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                           </a>
                         </div>
                       </li>
                     </ul>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf
                     </form>
                   </div>
                 </nav>
                 @else
                 <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="width:80px;float:left;">Log in</a>
                 @if (Route::has('register'))
                 <!-- <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline" style="float:left;">Register</a> -->
                 @endif
                 @endauth
                 @endif
                 <!-- <a href="#"><img src="{{asset('frontend/images/search_icon.png')}}" alt="#" /></a> <a href="#">login/sing up</a> -->
                 <!-- <a href="{{ route('logout') }}" class="btn btn-danger" onclick="return confirm('Are You Sure logout')">Logout</a> -->
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
     <!-- end header inner -->

     <!-- end header -->
     <section class="slider_section">
       <div id="myCarousel" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
           <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
           <li data-target="#myCarousel" data-slide-to="1"></li>
           <li data-target="#myCarousel" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">
           <div class="carousel-item active">

             <div class="container-fluid padding_dd">
               <div class="carousel-caption">
                 <div class="row">
                   <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                     <div class="text-bg">
                       <h1>Search your Favorite Course here</h1>
                       <p>TOP NOTCH COURSES FROM TRAINED PROFESSIONALS</p>
                       <a href="#">Read more</a> <a href="#">get a qoute</a>
                     </div>
                   </div>
                   <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                     <div class="images_box">
                       <figure><img src="{{asset('frontend/images/img2.png')}}"></figure>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="carousel-item">

             <div class="container-fluid padding_dd">
               <div class="carousel-caption">

                 <div class="row">
                   <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                     <div class="text-bg">
                       <h1>Search your Favorite Course here</h1>
                       <p>TOP NOTCH COURSES FROM TRAINED PROFESSIONALS</p>
                       <a href="#">Read more</a><a href="#">get a qoute</a>
                     </div>
                   </div>

                   <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                     <div class="images_box">
                       <figure><img src="{{asset('frontend/images/img2.png')}}"></figure>
                     </div>
                   </div>
                 </div>
               </div>
             </div>

           </div>


           <div class="carousel-item">

             <div class="container-fluid padding_dd">
               <div class="carousel-caption ">
                 <div class="row">
                   <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                     <div class="text-bg">
                       <h1>Search your Favorite Course here</h1>
                       <p>TOP NOTCH COURSES FROM TRAINED PROFESSIONALS</p>
                       <a href="#">Read more</a> <a href="#">get a qoute</a>
                     </div>
                   </div>
                   <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                     <div class="images_box">
                       <figure><img src="{{asset('frontend/images/img2.png')}}"></figure>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
   </div>
   <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
   </a>
   </div>

   </section>
   </div>
 </header>