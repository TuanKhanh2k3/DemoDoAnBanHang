@extends('layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Thêm Mới Sản Phẩm</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <h2>Nhập Hàng: </h2>
    <div class="mb-3">
        <label for="exampleInputNhaCungCap" class="form-label">Chọn Nhà Cung Cấp</label>
        <select name="nha_cung_cap_id" id="ncc">
            @foreach ($NCC as $nhacungcap)
                <option value="{{ $nhacungcap->id }}">{{ $nhacungcap->ten }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputGiaNhap" class="form-label"h2>Ngày Nhập</label>
        <input type="date" class="form-control" name="ngay_nhap" id="ngay_nhap">
    </div>
    <h2>Danh Sách Sản Phẩm: </h2>
    <div class="mb-3">
        <label for="exampleInputTen" class="form-label">Chọn Sản Phẩm</label>
        <select name="san_pham_id" id="san_pham_id">
            @foreach ($SP as $sanpham)
                <option value="{{ $sanpham->id }}">{{ $sanpham->ten }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputSoLuong" class="form-label">Số Lượng: </label>
        <input type="number" class="form-control" name="so_luong" id="so_luong">
    </div>
    <div class="mb-3">
        <label for="exampleInputSoLuong" class="form-label">Giá Nhập:</label>
        <input type="number" class="form-control" name="gia_nhap" id="gia_nhap">
    </div>
    <div class="mb-3">
        <label for="exampleInputSoLuong" class="form-label">Giá Bán</label>
        <input type="number" class="form-control" name="gia_ban" id="gia_ban">
    </div>
    <button onclick="themHang(), ganGiaTri()" class="btn btn-primary ">Thêm Mới Danh Sách</button>

    <form method="POST" id="myForm">
        @csrf
        <table id="myTable" class="table table-hover">
            <tr>
                <td>STT</td>
                <td>Sản Phẩm</td>
                <td>Số Lượng</td>
                <td>Giá Nhập</td>
                <td>Giá Bán</td>
                <td>Thành Tiền</td>
                <td>Chức Năng</td>
            </tr>
            <tr>

            </tr>


        </table>
        <input name="nha_cung_cap_id[]" id="nha_cung_cap_id">
        <button type="submit" class="btn btn-primary btnSave">Lưu</button>
    </form>
@endsection

@section('page')
    <script>
        var soThuTu = 0;
        var tongtien = 0;
        var list = [];

        function themHang() {
            // Truy cập bảng
            var table = document.getElementById('myTable');
            var san_pham_id = document.getElementById('san_pham_id').value;
            var so_luong = document.getElementById('so_luong').value;
            var gia_nhap = document.getElementById('gia_nhap').value;
            var gia_ban = document.getElementById('gia_ban').value;
            var thanh_tien = gia_nhap * so_luong;
            tongtien = tongtien + thanh_tien;

            // Tạo một hàng mới
            var newRow = table.insertRow();

            // Tạo các ô (cell) cho hàng mới
            var STT = newRow.insertCell(0);
            var SanPham = newRow.insertCell(1);
            var SoLuong = newRow.insertCell(2);
            var GiaNhap = newRow.insertCell(3);
            var GiaBan = newRow.insertCell(4);
            var ThanhTien = newRow.insertCell(5);
            var ChucNang = newRow.insertCell(6);
            soThuTu++;

            // Đặt nội dung cho các ô   
            STT.innerHTML = soThuTu;
            SanPham.innerHTML = '<input name="san_pham_id[]" type="text" value="' + san_pham_id + '">';
            SoLuong.innerHTML = '<input type="text" name="SoLuong[]" value="' + so_luong + '">';
            GiaNhap.innerHTML = '<input type="text" name="GiaNhap[]" value="' + gia_nhap + '">';
            GiaBan.innerHTML = '<input type="text"  name="GiaBan[]" value="' + gia_ban + '">';
            ThanhTien.innerHTML = '<input type="text" name="ThanhTien[]" value="' + thanh_tien + '">';
            ChucNang.innerHTML =
                '<button onclick="xoaHang(this)">Xóa</button>';
            list.push({
                san_pham_id: san_pham_id,
                so_luong: so_luong,
                gia_nhap: gia_nhap,
                gia_ban: gia_ban,
                thanh_tien: thanh_tien,
            });
            return list;
        }

        function xoaHang(button) {

            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
        $(document).ready(function() {
            $("#ncc").change(function() {
                $("#nha_cung_cap_id").val(this.value);
            });

        });
        // function suaHang(button) {
        //     // Lấy hàng chứa nút "Sửa"
        //     var row = button.parentNode.parentNode;

        //     // Lấy ô chứa nội dung và thay đổi nội dung bằng một thẻ input
        //     var SanPham = row.cells[1];
        //     SanPham.innerHTML = '<input type="text" value="' + SanPham.textContent + '">';
        //     var SoLuong = row.cells[2];
        //     SoLuong.innerHTML = '<input type="text" value="' + SoLuong.textContent + '">';
        //     var GiaNhap = row.cells[3];
        //     GiaNhap.innerHTML = '<input type="text" value="' + GiaNhap.textContent + '">';
        //     var GiaBan = row.cells[4];
        //     GiaBan.innerHTML = '<input type="text" value="' + GiaBan.textContent + '">';
        //     // Thay đổi nút "Sửa" thành nút "Lưu"
        //     button.innerHTML = 'Lưu';
        //     button.onclick = function() {
        //         luuHang(this);
        //     };
        // }



        // function luuHang(button) {
        //     // Lấy hàng chứa nút "Lưu"
        //     var row = button.parentNode.parentNode;

        //     // Lấy ô chứa nội dung và lấy giá trị từ thẻ input
        //     var SanPham = row.cells[1];
        //     var inputSanPham = SanPham.querySelector('input').value;
        //     var SoLuong = row.cells[2];
        //     var inputSoLuong = SoLuong.querySelector('input').value;
        //     var GiaNhap = row.cells[3];
        //     var inputGiaNhap = GiaNhap.querySelector('input').value;
        //     var GiaBan = row.cells[4];
        //     var inputGiaBan = GiaBan.querySelector('input').value;
        //     var ThanhTien = row.cells[5];
        //     var outThanhTien = inputGiaNhap * inputSoLuong;

        //     // Đặt lại nội dung và chuyển nút "Lưu" thành "Sửa"
        //     SanPham.innerHTML = inputSanPham;
        //     SoLuong.innerHTML = inputSoLuong;
        //     GiaNhap.innerHTML = inputGiaNhap;
        //     GiaBan.innerHTML = inputGiaBan;
        //     ThanhTien.innerHTML = outThanhTien;
        //     button.innerHTML = 'Sửa';
        //     button.onclick = function() {
        //         suaHang(this);
        //     };
        // }
        //
        //     
        // 
    </script>
@endsection
