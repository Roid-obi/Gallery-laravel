@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item text-white">Dashboard</li>
                    <li class="breadcrumb-item active">Profile</li>
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

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card bg-dark">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if(Auth::user()->image)
                            <img src="{{ asset('/storage/images/user/' . Auth::user()->image) }}"
                                class="profile-user-img img-fluid img-circle" alt="User profile picture">
                            @else
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('images/Default.svg.png') }}" alt="User profile picture default">
                            @endif
                        </div>

                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                        <p class="text-muted text-center">{{ Auth::user()->role }}</p>

                        <ul class="list-group list-group-flush mb-2">
                            <li class="list-group-item bg-dark">
                                <b class="text-white">ID</b> <a class="float-right text-decoration-none">{{ Auth::user()->id }}</a>
                            </li>
                            <li class="list-group-item bg-dark">
                                <b class="text-white">Email</b> <a class="float-right text-decoration-none">{{ Auth::user()->email }}</a>
                            </li>
                            <li class="list-group-item bg-dark">
                                <b class="text-white">Alamat</b> <a class="float-right text-decoration-none">{{ Auth::user()->address }}</a>
                            </li>
                        </ul>

                        {{-- <a href="#" class="btn btn-info btn-block text-white mb-1"><b>Edit Profile</b></a> --}}
                        <button type="button" class="btn btn-info btn-block text-white mb-1" data-toggle="modal"
                            data-target="#editProfileModal">
                            Edit Profil
                        </button>
                        <div class="">
                            <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                                data-target="#logoutModal">
                                Logout
                            </button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
        </div>
    </div>
</section>


<!-- Tambahkan modal untuk form edit -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ Auth::user()->address }}">
                    </div>
                    <!-- Tambahkan form input untuk data profil lainnya sesuai kebutuhan -->
                    {{-- image --}}
                    <div class="form-group">
                        <label for="image">{{ __('Gambar') }}</label>
                                <img src="{{ asset('/storage/images/user/' . Auth::user()->image) }}" class="outimgd d-block mb-2" width="200" id="output"> {{-- output --}}
                                <div>
                                    <input
                                        name="image"
                                        class="form-control @error('image') is-invalid @enderror"
                                        value="{{ Auth::user()->image }}"
                                        type="file"
                                        accept="image/*"
                                        id="formFile"
                                        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"
                                        onchange="loadFile(event)"
                                    >
                                    <small
                                        for="formFile"
                                        class="form-label"
                                    >Silahkan Upload Foto Anda</small>
                                </div>
                            @error('image')
                                <span
                                    class="invalid-feedback"
                                    role="alert"
                                >
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info text-white">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Tambahkan modal untuk konfirmasi logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin logout?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    
    $(document).ready(function() {
        $('#content').summernote();
    })
    function loadFile(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endpush
