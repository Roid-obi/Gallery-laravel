<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Gallery | Category Post</title>

    {{-- <link rel="icon" href="{{ asset('images/SMKlogo.webp') }}" type="image/x-icon"> --}}

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    

    <link href=" {!! asset('../assets/dist/css/bootstrap.min.css') !!}" rel="stylesheet">

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
    <link rel="stylesheet" href="{!! asset('css/welcome.css') !!}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

  </head>
  <body>

    
    
<header >
  <nav id="navbarwel" class="navbar navbar-expand-md navbar-dark fixed-top" style="height: 60px">
    <div class="container container-fluid">
      {{-- <img src="{{ asset('images/SMKlogo.webp') }}" alt="Muh1h" width="40px" class="brand-image me-1" style="opacity: .8"> --}}
      <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 25px">Galley</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">

        @if (Route::has('login'))
        <ul class="navbar-nav ms-auto mb-2 mb-md-0">
            @auth
            <li class="nav-item">
              <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" >Home</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('posts') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" >Posts</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('categories') }}" class="text-sm text-white active" >Category</a>
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



    {{-- posts --}}
    {{-- <hr class="featurette-divider"> --}}
    
<main>
    <section class="py-5 mt-5 text-center container">
        <h1 class="fw-light">{{ $title }}</h1>
    </section>


    <div class="container">
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4 mb-4">
                <a href="{{ route('post.category', $category->id) }}">
                    <div class="card">
                        <div class="position-relative">
                            <img src="https://source.unsplash.com/500x300?{{ $category->name }}" class="card-img" alt="...">
                            <div class="overlay"></div>
                            <h5 class="card-title text-center fs-3 p-2">{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    
    <style>
        .card-img {
            object-fit: cover;
        }
    
        .position-relative {
            position: relative;
        }
    
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.401);
        }
    
        .card-title {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 1rem;
            color: white;
        }
    </style>
    

   {{-- @foreach ($categories as $category)

   <ul>
    <li>
        <h2><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></h2>
    </li>
   </ul>
  
   @endforeach --}}

</main>




{{-- <hr class="featurette-divider"> --}}


<footer class=" text-center text-lg-start  mt-4" style="background-color: #222222d5;color:white;">

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: #222222;color:white">
    © 2023 Copyright:
    <a class="text-white" href="https://github.com/Roid-obi">roidrobih.com</a>
  </div>
  <!-- Copyright -->
</footer>


<!-- Tombol Back to Top -->
<a href="#" class="back-to-top animate__animated animate__bounce infinite">
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-up-short" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
</svg>
</a>


<script>
// Mengatur tampilan tombol saat menggulir halaman
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

  
</body>
</html>
