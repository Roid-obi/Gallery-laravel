@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Post-Save</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item text-white">Dashboard</li>
                  <li class="breadcrumb-item active">Post-Save</li>
              </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <main>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($postsaves as $ps)
                        <div class="kartu-posting">
                            <div class="col">
                                <div class="card">
                                    <div class="imagecard overflow-hidden">
                                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{ asset('/storage/images/'.$ps->post->image) }}" alt="" style=" object-fit: cover;">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-text">{{ $ps->post->title }}</h4>
                                        <p class="text-secondary">{{ $ps->post->views }} views</p>
                                        <div class="d-flex justify-content-end">
                                            {{-- Tags --}}
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="/posts/{{ $ps->post->slug }}">
                                                    <button type="button" class="butn-view-post btn btn-sm btn-outline-secondary mt-3">View</button>
                                                </a>
                                            </div>
                                            <small class="text-muted">{{ $ps->post->updated_at }}</small>
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
@endsection
