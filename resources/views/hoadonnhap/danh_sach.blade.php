@extends('layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh Sách Hóa Đơn Nhập</h1>
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
            <th>Tên Nhà Cung Cấp</th>
            <th>Tên Người Quản Lý</th>
            <th>Ngày Nhập</th>
            <th>#</th>
        </tr>
        @foreach ($HDN as $hoadonnhap)
            <tr>

                <th>{{ $hoadonnhap->nha_cung_cap->ten }}</th>

                <th>{{ $hoadonnhap->admin->ten_dang_nhap }}</th>

                <th>{{ $hoadonnhap->ngay_nhap }}</th>
                {{-- <th><a href="{{ route('khachhang.xuLyCap_Nhat', ['id' => $khachhang->id]) }}">Sửa</a>|<a
                        href="{{ route('khachhang.xoa', ['id' => $khachhang->id]) }}">Xóa</a></th> --}}
            </tr>
        @endforeach
    </table>
    <a href="{{ route('hoadon.them_moi') }}">Thêm Mới</a>
@endsection
