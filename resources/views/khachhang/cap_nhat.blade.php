@extends('layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cập Nhật Sản Phẩm</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <form method="POST" acction="">
        @csrf
        <div class="mb-3">
            <label for="exampleInputTen" class="form-label">Tên</label>
            <input type="text" class="form-control" name="ten" value="{{ $KH->ten }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputGiaBan" class="form-label">Giá Bán</label>
            <input type="text" class="form-control" name="dia_chi" value="{{ $KH->dia_chi }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputGiaNhap" class="form-label">Giá Nhập</label>
            <input type="text" class="form-control" name="email" value="{{ $KH->email }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputSoLuong" class="form-label">Số Lượng</label>
            <input type="text" class="form-control" name="dien_thoai" value="{{ $KH->dien_thoai }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
