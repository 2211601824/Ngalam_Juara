@extends('layouts.backend')
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Artikel</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Add Artikel</h5>
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{ url('/dashboard/insertartikel') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-select" required name="kategori" id="exampleFormControlSelect1" aria-label="Default select example">
                                    <option value="infotaiment">Infotaiment</option>
                                    <option value="insurance">Insurance</option>
                                    <option value="raksa">Raksa News</option>
                                  </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" required class="form-control" id="basic-default-name" placeholder="Masukan title dari artikel" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Cover</label>
                            <div class="col-sm-10">
                                <input class="form-control" required type="file" name="cover" id="formFile" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Content</label>
                            <div class="col-sm-10">
                                <textarea
                                id="editor"
                                class="form-control"
                                name="content"
                                aria-describedby="basic-icon-default-message2"
                                ></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="status" id="exampleFormControlSelect1" aria-label="Default select example">
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                  </select>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
