@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Books
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-add-book">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Add new book
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Buku</th>
                                        <th>Judul</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($books as $index => $book)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$book->book_code}}</td>
                                        <td>{{$book->title}}</td>
                                        <td>{{$book->author}}</td>
                                        <td>{{$book->publisher}}</td>
                                        <td>{{$book->publish_year}}</td>
                                        <td>
                                            <a href="{{ url('books/detail/'.$book->id) }}">Detail</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-add-book" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('/books')}}" method="post" enctype="multipart/form-data" id="addBook">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" required name="title" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pengarang</label>
                        <input type="text" class="form-control" required name="author" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penerbit</label>
                        <input type="text" class="form-control" required name="publisher" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Terbit</label>
                        <input type="text" class="form-control" required name="publish_year" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sinopsis</label>
                        <textarea class="form-control" rows="5" required name="synopsis"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sampul</label>
                        <input type="file" class="form-control" required name="cover" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="number" class="form-control" required name="quantity" />
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Batal
                </a>
                <button type="submit " class="btn btn-primary ms-auto" form="addBook">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Tambah
                </button>
            </div>
        </div>
    </div>
</div>
@endsection