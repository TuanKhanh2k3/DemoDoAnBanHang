@extends('layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cập Nhật Sản Phẩm</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputTen" class="form-label">Tên</label>
            <input type="text" readOnly class="form-control" name="ten" value="{{ $SP->ten }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputGiaBan" class="form-label">Giá Bán</label>
            <input type="number" class="form-control" name="gia_ban" value="{{ $SP->gia_ban }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputGiaNhap" class="form-label">Giá Nhập</label>
            <input type="number" class="form-control" name="gia_nhap" value="{{ $SP->gia_nhap }}" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputSoLuong" class="form-label">Số Lượng</label>
            <input type="number" readOnly class="form-control" name="so_luong" value="{{ $SP->so_luong }}">
        </div>
        <div class="mb-3">
            <select name="loai_san_pham_id">
                @foreach ($LSP as $loaisanpham)
                    <option value="{{ $loaisanpham->id }}" @if ($loaisanpham->id == $SP->loai_san_pham_id) selected @endif>
                        {{ $loaisanpham->ten }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputMota" class="form-label">Mô Tả</label>
            <input type="text" class="form-control" name="mo_ta" value="{{ $SP->mo_ta }}">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">UploadFile</label>
            {{-- @foreach ($DSHA as $ds)
                @if (empty($ds->duong_dan))
                    <input type="file" />
                @else
                    <img src="{{ asset($ds->duong_dan) }}" style="width:20%" />
                    <a href="{{ route('hinhanh.cap_nhat', ['id' => $ds->id]) }}" style="font-size: 18px">Sửa</a> |
                    <a href="{{ route('hinhanh.xoa', ['id' => $ds->id]) }}" style="font-size: 18px">Xóa</a>
                @endif
            @endforeach --}}

            @foreach ($DSHA as $ds)
                <img src="{{ asset($ds->duong_dan) }}" style="width:20%" />
                <a href="{{ route('hinhanh.cap_nhat', ['id' => $ds->id]) }}" style="font-size: 18px">Sửa</a> |
                <a href="{{ route('hinhanh.xoa', ['id' => $ds->id]) }}" style="font-size: 18px">Xóa</a>
            @endforeach

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
