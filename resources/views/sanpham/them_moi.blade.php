@extends('layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Thêm Sản Phẩm</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <form method="POST" acction="" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputTen" class="form-label">Tên</label>
            <input type="text" class="form-control" name="ten">
        </div>
        <div class="mb-3">
            <label for="exampleInputGiaBan" class="form-label">Giá Bán</label>
            <input type="number" class="form-control" name="gia_ban">
        </div>
        <div class="mb-3">
            <label for="exampleInputGiaNhap" class="form-label">Giá Nhập</label>
            <input type="number" class="form-control" name="gia_nhap">
        </div>
        <div class="mb-3">
            <label for="exampleInputSoLuong" class="form-label">Số Lượng</label>
            <input type="number" class="form-control" name="so_luong">
        </div>
        <div class="mb-3">
            <select name="loai_san_pham_id">
                @foreach ($LSP as $loaisanpham)
                    <option value="{{ $loaisanpham->id }}">{{ $loaisanpham->ten }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputMota" class="form-label">Mô Tả</label>
            <input type="text" class="form-control" name="mo_ta">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">UploadFile</label>
            <input class="form-control" type="file" multiple name="hinh_anh[]" id="hinh_anh">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
