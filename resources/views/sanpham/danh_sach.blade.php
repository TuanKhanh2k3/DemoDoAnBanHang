@extends('layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh Sách Sản Phẩm</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    @if (session('messages'))
        <div class="alert alert-success" role="alert">
            {{ session('messages') }}
        </div>
    @endif
    <table class="table table-hover">
        <tr>
            <th>Tên Sản Phẩm</th>
            <th>Giá Bán</th>
            <th>Giá Nhập</th>
            <th>Số Lượng</th>
            <th>Loại Sản Phẩm</th>
            <th>Mô Tả</th>
            <th>Hình Ảnh</th>
            <th>#</th>
        </tr>
        @foreach ($SP as $sanpham)
            <tr>
                <th>{{ $sanpham->ten }}</th>
                <th>{{ $sanpham->gia_ban }}</th>
                <th>{{ $sanpham->gia_nhap }}</th>
                <th>{{ $sanpham->so_luong }}</th>
                <th>{{ $sanpham->loai_san_pham->ten }}</th>
                <th>{{ $sanpham->mo_ta }}</th>
                <th>
                    @foreach ($DSHA as $HA)
                        @if ($sanpham->id == $HA->san_pham_id)
                            <img src="{{ asset($HA->duong_dan) }}" style="width:30px" />
                        @endif
                    @endforeach
                </th>
                <th><a href="{{ route('sanpham.xuLyCap_Nhat', ['id' => $sanpham->id]) }}">Sửa</a>|<a
                        href="{{ route('sanpham.xoa', ['id' => $sanpham->id]) }}">Xóa</a>|<a
                        href="{{ route('sanpham.danh_sach_ct', ['id' => $sanpham->id]) }}">Danh Sach Chi Tiết</a></th>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('sanpham.them_moi') }}">Thêm Mới</a>
@endsection
