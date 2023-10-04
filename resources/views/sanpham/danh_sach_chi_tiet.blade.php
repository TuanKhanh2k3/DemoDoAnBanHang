@extends('layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh Sách Hình Ảnh</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <table class="table table-hover">
        <tr>
            <th>Hình Ảnh</th>
        </tr>
        <tr>
            @foreach ($DSHA as $ds)
                @if ($SP->id == $ds->san_pham_id)
                        <img src="{{ asset($ds->duong_dan) }}" style="width:20%" />
                        <a href="{{ route('hinhanh.cap_nhat', ['id' => $ds->id]) }}" style="font-size: 18px">Sửa</a> |
                        <a href="{{ route('hinhanh.xoa', ['id' => $ds->id]) }}" style="font-size: 18px">Xóa</a>
                @else
                @endif
            @endforeach
        </tr>
    </table>

    <a href="{{ route('sanpham.them_moi') }}">Thêm Mới</a>
@endsection
