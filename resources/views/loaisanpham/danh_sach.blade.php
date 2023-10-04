@extends('layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh Sách Loại Sản Phẩm</h1>
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
        <th>Tên Sản Phẩm</th>
        <th>#</th>
    </tr>
    @foreach ($LSP as $loaisanpham)
        <tr>
            <th>{{ $loaisanpham->ten }}</th>
            <th><a href="{{ route('loaisanpham.cap_nhat', ['id' => $loaisanpham->id]) }}">Sửa</a>|<a
                    href="{{ route('loaisanpham.xoa', ['id' => $loaisanpham->id]) }}">Xóa</a></th>
        </tr>
    @endforeach
</table>
<a href="{{ route('loaisanpham.them_moi') }}">Thêm Mới</a>
@endsection
