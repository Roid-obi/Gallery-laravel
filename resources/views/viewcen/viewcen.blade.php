<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Gallery</title>

    <link rel="icon" href="{{ asset('images/logo-gallery.png') }}" type="image/x-icon">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    

    <link href=" {!! asset('../assets/dist/css/bootstrap.min.css') !!}" rel="stylesheet">

    {{-- animate css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


    {{-- font --}}
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- animation --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
   
    <link rel="stylesheet" href="{!! asset('css/carousel.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/carousel.rtl.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/welcome.css') !!}">

  </head>
  <body>

    
    
<header >
  <nav id="navbarwel" class="navbar navbar-expand-md navbar-dark fixed-top" style="">
    <div class="container container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 25px">Gallery</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">

        @if (Route::has('login'))
        <ul class="navbar-nav ms-auto mb-2 mb-md-0">
            @auth
            <li class="nav-item">
              <a href="{{ url('/') }}" class="active text-sm" >Home</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('posts') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" >Posts</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('categories') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" >Category</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('dashboard/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" >Dashboard</a>
            </li>
            
            @else
            <li class="nav-item">
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>
            </li>

                @if (Route::has('register'))
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                </li>
                @endif
            @endauth
          </ul>
    @endif
        
      </div>
    </div>
  </nav>
</header>





<main>
@if($title != 'Categories' && $title != 'Tags')
  {{-- slide show --}}
 
  <div class="ban-slideshow" style="margin-top: -48px;" style="height: 70%">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      {{-- <div class="carousel-indicators">
        @foreach ($posts->where('is_pinned', true) as $index => $post)
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $index }}" class="@if ($loop->first) active @endif" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
      </div> --}}
    
      <div class="carousel-inner" >
        {{-- hanya post yang memiliki is_panned=true yang diloop --}}
        @foreach ($posts->where('is_pinned', true) as $index => $post) 
        <div class="carousel-item @if ($loop->first) active @endif">
          
          <img class="bd-placeholder-img"  width="100%" src="{{ asset('/storage/images/'.$post->image) }}" alt="">
          <div class="container">
            <div class="carousel-caption text-center">
              <h1>{{ $post->title }}</h1>
              <p>{!! $post->content !!}</p>
              <p><a class="btn butn-crl px-3 btn-dark" href="/posts/{{ $post->slug }}">Read More...</a></p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

 



  <div class="container marketing">


@endif






    {{-- posts --}}
    <hr class="featurette-divider">
    
<main>

  <section class="py-5 text-center container">
    
        <h1 class="fw-light">{{ $title }}</h1>
      
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @if ($posts->where('is_pinned', false)->isEmpty())
            <p class="ms-5">Belum ada postingan...</p>
        @else
      @foreach ($posts->where('is_pinned', false)->take(6)  as $post)
          <div class="kartu-posting">
            <div class="col">
              <div class="card">
                {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
              <div class="imagecard overflow-hidden">
                @foreach($post->categories as $category)
                  <div style="background:#222222c7;" class="catgo-post  px-3 py-2 " ><a class="text-decoration-none text-white" href="{{ route('post.category', $category->id) }}">{{ $category->name }}</a></div>
                @endforeach
                <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{ asset('/storage/images/'.$post->image) }}" alt="" style="border-radius: 0px; object-fit: cover;">
              </div>
                <div class="card-body">


                  <div class="d-flex justify-content-between">
                    <h4 class="card-text">{{ $post->title }}</h4>
                      
                    </div>


                  <p class="text-secondary">{{ $post->views }} views</p>
                  


                  <div class="d-flex justify-content-end">
                    {{-- <i class="fas fa-tags"></i> --}}
                      @foreach($post->tags as $tag)
                          <div class="namatag btn-outline-secondary btn-sm">
                              <a class="text-decoration-none text-info" href="{{ route('post.tag', $tag->id) }}">
                                  #{{ $tag->name }}
                              </a>
                          </div>
                      @endforeach
                  </div>


                    
                            
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="/posts/{{ $post->slug }}">
                        <button   type="button" class="butn-view-post btn btn-sm btn-outline-secondary mt-3">View</button>
                      </a>
                    

                      {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                    </div>
                    <small class="text-muted">{{ $post->updated_at }}</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
      @endforeach
      @endif

        

      </div>
    </div>
  </div>

</main>



    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->
  <div></div>

  <hr class="featurette-divider">

  <footer class=" text-center text-lg-start  mt-4" style="background-color: #222222d5;color:white;">

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #222222;color:white">
      © 2023 Copyright:
      <a class="text-white" href="https://github.com/Roid-obi">roidrobih.com</a>
    </div>
    <!-- Copyright -->
  </footer>

  <!-- Tombol Back to Top -->
  <a href="#" class="back-to-top animate__animated">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-up-short" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
    </svg>
  </a>

  <script>
    window.addEventListener('scroll', function() {
      var button = document.querySelector('.back-to-top');
      if (window.pageYOffset > 300) {
        button.classList.add('show');
      } else {
        button.classList.remove('show');
      }
    });
  </script>
{{-- <script>
  document.addEventListener('DOMContentLoaded', function() {
    var cursor = document.createElement('div');
    cursor.className = 'cursor-animation';
    document.body.appendChild(cursor);

    document.addEventListener('mousemove', function(e) {
      cursor.style.left = e.pageX + 'px';
      cursor.style.top = e.pageY + 'px';
    });
  });
</script> --}}

    <script src="{{ asset('../assets/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
      
  </body>
</html>
