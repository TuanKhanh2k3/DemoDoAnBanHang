@extends('layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cập Nhật Sản Phẩm</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <form method="POST" acction="" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">UploadFile</label>
            <input class="form-control" type="file" name="hinh_anh[]" id="hinh_anh"  required>     
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
