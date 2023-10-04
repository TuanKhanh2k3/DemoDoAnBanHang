@extends('layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh Sách Admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
@section('page')
    @if (session('thong_bao'))
        <script>
            Swal.fire("{{ session('thong_bao') }}")
        </script>
    @endif
@endsection
<table class="table table-hover">
    <tr>
        <th>Tên Đăng Nhập</th>
        <th>Mật Khẩu</th>
        <th>#</th>
    </tr>
    @foreach ($AD as $admin)
        <tr>
            <th>{{ $admin->ten_dang_nhap }}</th>
            <th>{{ $admin->mat_khau }}</th>
            <th><a href="{{ route('login.cap_nhat', ['id' => $admin->id]) }}">Sửa</a>|<a
                    href="{{ route('khachhang.xoa', ['id' => $admin->id]) }}">Xóa</a></th>
        </tr>
    @endforeach
</table>
<a href="{{ route('login.themMoi') }}">Thêm Mới</a>
@endsection
