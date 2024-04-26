@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengguna</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item text-white">Dashboard</li>
            <li class="breadcrumb-item active">Pengguna</li>
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
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Daftar Semua Pengguna</h3>
                        <form action="{{ route('users') }}" method="GET" class="form-inline ml-auto">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Cari" name="search" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-dark table-hover" style="">
                    
                    
                    <thead>
                        <tr>
                            <th>Id.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Kelas</th>
                            @if(Auth::user()->role=='admin')
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                              <div class="text-center">
                                  @if($user->image)
                                      <img src="{{ asset('storage/images/user/' . $user->image) }}" class="profile-user-img img-fluid img-circle" alt="User profile picture" style="max-width: 50px; max-height: 50px;">
                                  @else
                                      <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/Default.svg.png') }}" alt="User profile picture default" style="max-width: 50px; max-height: 50px;">
                                  @endif  
                            </div>
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->kelas }}</td>
                            @if(auth::user()->role=='admin')
                            <td>
                              <!-- Tombol Update -->
                              <button class="btn btn-info btn-sm text-white" data-toggle="modal" data-target="#editModal{{ $user->id }}">Edit</button>
                              
                              <!-- Tombol Delete -->
                              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#confirmDelete{{ $user->id }}">Delete</button>
                              
                              <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="name">Name:</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="email">Email:</label>
                                                    <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="kelas">Kelas:</label>
                                                    <input type="text" name="kelas" class="form-control" value="{{ $user->kelas }}">
                                                </div>
                                                
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                              <!-- Modal Konfirmasi Hapus -->
                              <div class="modal fade" id="confirmDelete{{ $user->id }}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{ $user->id }}" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="confirmDeleteLabel{{ $user->id }}">Konfirmasi Hapus</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              Apakah Anda yakin ingin menghapus pengguna ini?
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                              <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-danger">Hapus</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
                 <!-- menampilkan pagination links -->
                  <div class="d-flex justify-content-end mt-3">
                    {{ $users->links('vendor.pagination.bootstrap-4') }}
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
      </div>
    </div>
  </section>

  <!-- ... -->
<!-- Update User -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <form action="{{ route('users.update', $user->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="modal-header">
                  <h5 class="modal-title" id="editUserModalLabel">Edit Pengguna</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <label for="name">Nama</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                  </div>
                  <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                  </div>
                  <div class="form-group">
                      <label for="kelas">Kelas</label>
                      <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $user->kelas }}" required>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </form>
      </div>
  </div>
</div>
<!-- ... -->


@endsection