@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Home</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item text-white">Dashboard</li>
                  <li class="breadcrumb-item active">Home</li>
              </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Loading overlay start -->
    {{-- <div class="loding overlay" id="loading-overlay">
        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
    </div> --}}
    <!-- Loading overlay end -->


{{-- ionic --}}
      {{-- baris 1 --}}
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-indigo">
            <div class="inner">
              <h3>{{ $posts->where('is_pinned', true)->count() }}</h3>

              <p>Post di Pin</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-thumbtack"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{ $posts->count() }}</h3>

              <p>Postingan</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-newspaper"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $user->count() }}</h3>

              <p>Pengguna</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $admin->count() }}</h3>

              <p>Admin</p>
            </div>
            <div class="icon">
              <i class="fas fa-users-cog"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      {{-- baris 2 --}}
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3>{{ $categories->count() }}</h3>

              <p>Category</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-th-large"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-pink">
            <div class="inner">
              <h3>{{ $tags->count() }}</h3>

              <p>Tags</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-hashtag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>0</h3>

              <p>Bot</p>
            </div>
            <div class="icon">
              <i class="fas fa-robot"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

@endsection
