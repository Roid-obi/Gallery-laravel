<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Gallery | Semua Post</title>

    <link rel="icon" href="{{ asset('images/logo-gallery.png') }}" type="image/x-icon">

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
      <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 25px">Gallery</a>
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
                <a href="{{ url('posts') }}" class="text-sm text-white active" >Posts</a>
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



    {{-- posts --}}
    {{-- <hr class="featurette-divider"> --}}
    
<main>

  <section class="py-5 mt-5 text-center container">
    
        <h1 class="fw-light">{{ $title }}</h1>
      
  </section>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4">
        <form action="{{ route('welcome.posts') }}" method="GET" class="form-inline">
          <div class="input-group input-group-md">
            <input class="form-control form-control-navbar" type="search" placeholder="Cari" name="search" value="{{ request('search') }}">
              <button type="submit" class="btn btn-outline-secondary">
                <i class="fa fa-search"></i>
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{-- <div class="input-group mb-3"> 
    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
  </div> --}}
  
  

  <div class="album py-5">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      @foreach ($posts as $post)
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
                    @if (auth())
                        @if (auth()->user()->SavePost->contains('post_id', $post->id))
                            <form action="{{ route('post-saves.destroy', ['post' => $post->id]) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link btn-sm p-0">
                                    <svg style="color: #222222 " xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                                        <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
                                    </svg>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('post-saves.store', ['post' => $post->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link btn-sm p-0">
                                  <svg style="color: #222222 " xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                                      <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                                  </svg>
                                </button>
                            </form>
                        @endif
                    @endif
                  </div>

                  {{-- like post --}}
                <div class="d-flex justify-content-">
                  <div class="d-flex">
                    @if (auth())
                      @if (auth()->user()->LikedPosts->contains('post_id', $post->id))
                          <!-- Jika Posting Disukai -->
                          <form action="{{ route('post-likes.destroy', ['post' => $post->id]) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-link btn-sm p-0 me-2">
                                <svg width="22" height="24" viewBox="0 0 36 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M35.437 15.0934C35.1099 16.1122 34.6302 17.0755 34.0144 17.9505C33.3898 18.8547 32.6377 19.6638 31.7817 20.3528L19.1364 30.5848C18.8152 30.854 18.4094 31.001 17.9904 31C17.5775 30.9936 17.1781 30.8512 16.8543 30.5947L4.20894 20.3627C2.4978 19.0013 1.22623 17.1649 0.553635 15.0835C-0.117514 12.9637 -0.17975 10.6978 0.373978 8.5443C0.927706 6.39079 2.07512 4.43636 3.68535 2.90397C5.17266 1.49749 7.03564 0.552785 9.04859 0.184308C11.0615 -0.184169 13.1381 0.0393895 15.0267 0.827903C16.1697 1.3224 17.1837 2.07332 17.9904 3.0226C18.7944 2.07042 19.8092 1.31896 20.9542 0.827903C22.8478 0.0310251 24.9323 -0.196997 26.9532 0.171659C28.9742 0.540315 30.8441 1.48971 32.335 2.90397C33.9419 4.44048 35.0848 6.39809 35.6333 8.5534C36.1818 10.7087 36.1138 12.9749 35.437 15.0934Z" fill="#F05161"/>
                                </svg>
                                  
                              </button>
                          </form>
                      @else
                          <!-- Jika Posting Belum Disukai -->
                          <form action="{{ route('post-likes.store', ['post' => $post->id]) }}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-link btn-sm p-0 me-2">
                                <svg width="22" height="24" viewBox="0 0 33 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M27.4808 1.3C26.1386 0.455879 24.5864 0.00546285 23.0008 0C21.6316 0.0166014 20.2854 0.353569 19.0698 0.983917C17.8543 1.61427 16.8032 2.52048 16.0008 3.63C15.1984 2.52048 14.1473 1.61427 12.9318 0.983917C11.7162 0.353569 10.37 0.0166014 9.00081 0C7.415 0.00384876 5.86235 0.454392 4.5208 1.3C2.41546 2.70481 0.91026 4.84485 0.299884 7.30114C-0.310491 9.75744 0.0179225 12.3531 1.22081 14.58C3.22081 18.37 11.8108 24.96 14.9008 27.26C15.2234 27.5029 15.617 27.6329 16.0208 27.63C16.4242 27.63 16.8168 27.5003 17.1408 27.26C20.2308 24.96 28.7808 18.37 30.8108 14.58C32.0108 12.3497 32.3346 9.75151 31.7186 7.29487C31.1026 4.83823 29.5912 2.70024 27.4808 1.3ZM29.4808 13.93C27.9608 16.77 21.6308 22.09 16.2208 26.13C16.1482 26.1827 16.0606 26.2107 15.9708 26.21C15.8807 26.213 15.7924 26.1848 15.7208 26.13C10.3008 22.13 3.9708 16.77 2.4608 13.93C1.42747 12.0301 1.13973 9.81311 1.65383 7.71236C2.16792 5.6116 3.44689 3.77804 5.2408 2.57C6.35165 1.86905 7.63731 1.49479 8.95081 1.49C10.0932 1.49454 11.2183 1.76858 12.2349 2.28987C13.2514 2.81115 14.1305 3.56496 14.8008 4.49L15.9708 6.05L17.1308 4.49C17.8032 3.56477 18.6842 2.81099 19.7023 2.28977C20.7204 1.76855 21.8471 1.49456 22.9908 1.49C24.3043 1.49479 25.59 1.86905 26.7008 2.57C28.4947 3.77804 29.7737 5.6116 30.2878 7.71236C30.8019 9.81311 30.5141 12.0301 29.4808 13.93Z" fill="#4D4D4F"/>
                                </svg>
                                  
                              </button>
                          </form>
                      @endif
                    @endif
                  <!-- Jumlah Pengguna yang Menyukai Posting -->
                    @if ($post->likes != null)
                        <p class="text-secondary">{{ $post->likes->count() }} likes</p>
                    @else
                        <p class="text-secondary">0 likes</p>
                    @endif
                  </div>
                </div>
                <!-- Pengguna yang Menyukai Posting -->
                {{-- @if ($post->likes != null)
                    @foreach ($post->likes as $like)
                        <!-- Tampilkan informasi tentang setiap like -->
                    @endforeach
                @else
                    <!-- Tampilkan pesan bahwa tidak ada like -->
                @endif --}}


                  {{-- <p class="text-secondary">{{ $post->views }} views</p> --}}
                  {{-- <div class="d-flex justify-content-end">
                      @foreach($post->categories as $category)
                          <div class="namacatego btn-outline-secondary btn-sm">
                              <a class="text-decoration-none" href="{{ route('post.category', $category->id) }}">
                                  {{ $category->name }}
                              </a>
                          </div>
                      @endforeach
                  </div> --}}
                  
                  <div class="d-flex justify-content-end">
                    {{-- <i class="fas fa-tags"></i> --}}
                      @foreach($post->tags as $tag)
                          <div class="namatag btn-outline-secondary btn-sm">
                              <a class="text-decoration-none text-dark" href="{{ route('post.tag', $tag->id) }}">
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

        

      </div>
    </div>
  </div>

</main>




<hr class="featurette-divider">

<!-- FOOTER -->
<footer class="container">
  {{-- <p class="float-end"><a class="text-decoration-none text-danger-emphasis" href="#">Back to top</a></p> --}}
  <p>&copy; Gallery, Mr &middot; <a class="text-decoration-none" href="#">Roid</a></p>
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
