@extends('admin.main')
@section('content')
        @if(Session::has('success'))
          <div style="margin-top:20px"class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <a style="width:100px;margin-top:10px;margin-bottom:10px" class="btn btn-primary btn-sm" href="/admin/student/add">
            <i class="fas fa-plus"></i>
        </a>
    <table>
            <tr>
                <th>Mã Học Sinh</th>
                <th>Tên Học Sinh</th>
                <th>Giới Tính</th>
                <th>Điện Thoại</th>
                <th>Địa Chỉ</th>
                <th>Tên Đăng Nhập</th>
                <th>Mật Khẩu</th>
            </tr>

            @foreach($data as $key => $value)
            <tr style="border: 1px solid #ddd; padding:10px 0;border-bottom:0">
                <td>{{$value->MaHS}}</td>
                <td>{{$value->TenHS}}</td>
                <td>{{$value->GioiTinh}}</td>
                <td>{{$value->DienThoai}}</td>
                <td>{{$value->DiaChi}}</td>
                <td>{{$value->TenDangNhap}}</td>
                <td>{{$value->MatKhau}}</td>
                <td>
                <a class="btn btn-primary btn-sm" href="/admin/student/edit/{{$value->MaHS}}">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-sm" href="/admin/student/delete/{{$value->MaHS}}">
                     <i class="fas fa-trash"></i>
                </a>

                </td>
            </tr>
            @endforeach

    </table>
@endsection
