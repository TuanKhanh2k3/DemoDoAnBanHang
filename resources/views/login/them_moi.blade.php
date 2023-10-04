@extends('layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Thêm Admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <form method="POST" acction="">
        @csrf
        <div class="mb-3">
            <label for="exampleInputTen" class="form-label">Tên Tài Khoản</label>
            <input type="text" class="form-control" name="ten_dang_nhap">
        </div>
        <div class="mb-3">
            <label for="exampleInputGiaBan" class="form-label">Mật Khẩu</label>
            <input type="text" class="form-control" name="mat_khau">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
