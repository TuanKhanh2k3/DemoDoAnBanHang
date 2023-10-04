@extends('layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh Sách Khách Hàng</h1>
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
            <th>Tên Khách Hàng</th>
            <th>Địa Chỉ</th>
            <th>Email</th>
            <th>Điện Thoại</th>
            <th>#</th>
        </tr>
        @foreach ($KH as $khachhang)
            <tr>
                <th>{{ $khachhang->ten }}</th>
                <th>{{ $khachhang->dia_chi }}</th>
                <th>{{ $khachhang->email }}</th>
                <th>{{ $khachhang->dien_thoai }}</th>
                <th><a href="{{ route('khachhang.xuLyCap_Nhat', ['id' => $khachhang->id]) }}">Sửa</a>|<a
                        href="{{ route('khachhang.xoa', ['id' => $khachhang->id]) }}">Xóa</a></th>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('khachhang.them_moi') }}">Thêm Mới</a>
@endsection
