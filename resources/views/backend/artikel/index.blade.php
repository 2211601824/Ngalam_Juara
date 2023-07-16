@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Artikel</h4>

            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/dashboard/addartikel') }}"><i class="bx bx-list-plus me-1"></i> Tambah Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"
                    ><i class="bx bx-bell me-1"></i> Export</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"
                    ><i class="bx bx-link-alt me-1"></i> Import</a
                    >
                </li>
            </ul>
        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                <thead>
                    <tr>
                    <th>Kategori</th>
                    <th>Title</th>
                    <th>Cover</th>
                    <th>Status</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($artikel as $item)
                    <tr>
                        <td>{{ $item->kategori }}</td>
                        <td>{{  $item->title  }}</td>
                        <td><img src="{{ asset('/upload/artikel/cover/'.$item->cover) }}" width="50px" alt=""></td>
                        <td>
                            @if ($item->status == true)
                            <span class="badge bg-primary">Aktif</span>
                            @else
                            <span class="badge bg-secondary">Tidak Aktif</span>
                            @endif
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
