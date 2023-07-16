@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Users</h4>

            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                        <i class="bx bx-list-plus me-1"></i>
                        Tambah Data
                    </button>
                </li>

                <!-- Modal -->
                <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel1">Form Users</h5>
                          <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                          ></button>
                        </div>
                        <form action="{{ url('/dashboard/insertuser') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                                    <input type="text" id="nameBasic" required name="nik" class="form-control" placeholder="Masukan Nomor Induk Kependudukan (NIK)" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Name</label>
                                    <input type="text" id="nameBasic" required name="name" class="form-control" placeholder="Masukan Nama User" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" required name="email" class="form-control" placeholder="Masukan Email User" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col mb-3">
                                    <label for="email" class="form-label">Nomor Handphone</label>
                                    <input type="number" required name="phone" class="form-control" placeholder="Masukan Nomor Handphone" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" required name="password" class="form-control" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                      </div>
                    </div>
                </div>
            </ul>
        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                <thead>
                    <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>

                                <div class="dropdown-menu">
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#user{{ $item->id }}">
                                        <i class="bx bx-edit-alt me-1"></i>
                                        Edit
                                    </button>

                                    <a class="dropdown-item" href="{{ url('/dashboard/deleteuser/'.$item->id) }}"
                                    ><i class="bx bx-trash me-1"></i> Delete</a
                                    >
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="user{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Edit Form User</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"
                                        ></button>
                                        </div>
                                        <form action="{{ url('/dashboard/updateuser/'.$item->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col mb-3">
                                                    <label for="nameBasic" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                                                    <input type="text" id="nameBasic" required name="nik" value="{{ $item->nik }}" class="form-control"/>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col mb-3">
                                                    <label for="nameBasic" class="form-label">Name</label>
                                                    <input type="text" id="nameBasic" required name="name" value="{{ $item->name }}" class="form-control" placeholder="Enter Name" />
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" id="email" required name="email" value="{{ $item->email }}" class="form-control" placeholder="Enter Email" />
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col mb-3">
                                                    <label for="phone" class="form-label">Nomor Handphone</label>
                                                    <input type="number" id="phone" required name="phone" value="{{ $item->phone }}" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
</div>
@endsection
