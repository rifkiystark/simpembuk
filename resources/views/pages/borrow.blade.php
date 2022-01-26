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
                        Peminjaman
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-borrow">

                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="4" y="4" width="16" height="16" rx="2" />
                                <line x1="4" y1="10" x2="20" y2="10" />
                                <line x1="10" y1="4" x2="10" y2="20" />
                            </svg>
                            Pinjam Buku
                        </a>
                        <a href="#" class="btn btn-success d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-borrow" aria-label="Create new report">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="4" y="4" width="16" height="16" rx="2" />
                                <line x1="4" y1="10" x2="20" y2="10" />
                                <line x1="10" y1="4" x2="10" y2="20" />
                            </svg>
                        </a>
                        <a href="#" class="btn btn-outline-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-return">
                            <!-- Download SVG icon from http://tabler-icons.io/i/arrow-back-up -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" />
                            </svg>
                            Kembalikan Buku
                        </a>
                        <a href="#" class="btn btn-outline-success d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-return" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/arrow-back-up -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" />
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
                        <div class="card-body">
                            <form class="form row" action="#" method="get">
                                <div class="mb-3 col-md-2">
                                    <label class="form-label">Nama Siswa</label>
                                    <select class="form-select" name="" id="">
                                        <option value="">Jalu</option>
                                        <option value="">Jali</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <label class="form-label">Judul Buku</label>
                                    <select class="form-select" name="" id="">
                                        <option value="">Aku Disini</option>
                                        <option value="">kau Disana</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <label class="form-label">Tanggal Pinjam</label>
                                    <input type="date" class="form-control" name="password">
                                </div>
                                <div class="mb-3 col-md-2">
                                    <label class="form-label">Tanggal Kembali</label>
                                    <input type="date" class="form-control" name="password">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">.</label>
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Peminjaman</th>
                                        <th>Buku</th>
                                        <th>Nama Peminjam</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($borrows as $index => $borrow)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$borrow->borrow_code}}</td>
                                        <td>{{$borrow->book->title}}</td>
                                        <td>{{$borrow->student->name}}</td>
                                        <td>{{$borrow->start_date}}</td>
                                        <td>{{$borrow->end_date}}</td>
                                        <td>{{$borrow->status?"Masih Dipinjam":"Sudah Kembali"}}</td>
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

<div class="modal modal-blur fade" id="modal-return" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pengembalian Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('book-borrow/return/')}}" method="post" id="formReturn">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kode Pinjam</label>
                        <input type="text" class="form-control" name="borrow_code" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Buku</label>
                        <select name="status" id="" class="form-select">
                            <option value="1">Baik</option>
                            <option value="0">Rusak</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Batal
                </a>
                <button class="btn btn-primary ms-auto" type="submit" form="formReturn">

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Kembalikan
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-borrow" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Peminjaman Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('/book-borrow/borrow/')}}" method="post" id="formBorrow">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kode Buku</label>
                        <input type="text" class="form-control" name="book_code" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" name="nim" required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Batal
                </a>
                <button class="btn btn-primary ms-auto" type="submit" form="formBorrow">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Pinjam
                </button>
            </div>
        </div>
    </div>
</div>


@endsection