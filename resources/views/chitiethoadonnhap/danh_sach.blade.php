@extends('layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh Sách Chi Tiết Hóa Đơn Nhập</h1>
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
            <th>Tên</th>
            <th>Số Lượng</th>
            <th>Giá Nhập</th>
            <th>Tên Người Giao</th>
            <th>#</th>
        </tr>
        @foreach ($CTHDN as $chitiethoadonnhap)
            <tr>
                <th>{{ $chitiethoadonnhap->ten }}</th>
                <th>{{ $chitiethoadonnhap->so_luong }}</th>
                <th>{{ $chitiethoadonnhap->gia_nhap }}</th>
                <th>{{ $chitiethoadonnhap->hoa_don_nhap->ten_nguoi_giao }}</th>
                {{-- <th><a href="{{ route('khachhang.xuLyCap_Nhat', ['id' => $khachhang->id]) }}">Sửa</a>|<a
                        href="{{ route('khachhang.xoa', ['id' => $khachhang->id]) }}">Xóa</a></th> --}}
            </tr>
        @endforeach
    </table>
    <a href="{{ route('khachhang.them_moi') }}">Thêm Mới</a>
@endsection
