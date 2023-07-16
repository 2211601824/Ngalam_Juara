@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Pengaduan</h4>
        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Pelapor</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Berkas</th>
                    <th>Status</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($pengaduan as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{  $item->user->name  }} - {{ $item->user->nik }}</td>
                        <td>{{ Str::limit($item->judul, 50) }}</td>
                        <td>{{ Str::limit($item->deskripsi, 200) }}</td>
                        <td>
                            <a href="{{ asset('upload/pengaduan/berkas/'.$item->berkas) }}" target="_blank">
                                <i class="menu-icon tf-icons bx bx-file">Berkas</i>
                            </a>
                        </td>
                        <td>
                            {{ $item->status }}
                        </td>
                        <td>
                            <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url('/dashboard/deleteartikel/'.$item->id) }}"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                                >
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
