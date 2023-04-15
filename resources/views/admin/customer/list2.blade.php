@extends('admin.main')
@section('content')
        @if(Session::has('success'))
          <div style="margin-top:20px"class="alert alert-success">{{Session::get('success')}}</div>
        @endif
    <table>
            <tr>
                <th>Mã NV</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Nhiệm vụ</th>
                <th></th>
            </tr>
        
            @foreach($data as $key => $value)
            <tr style="border: 1px solid #ddd; padding:10px 0;border-bottom:0">
                <td>{{$value->MaNV}}</td>
                <td>{{$value->HoTenNV}}</td>
                <td>
                    @if($value->GioiTinh==0)
                    Nam
                    @else
                    Nữ
                    @endif
                </td>
                <td>{{$value->NgaySinh}}</td>
                <td>{{$value->SoDT}}</td>
                <td>{{$value->DiaChi}}</td>
                <td>
                <form action="/admin/customer/update/{{$value->MaNV}}" method="POST">
                    <select name="l" id="">
                    @foreach($data2 as $v)
                        <option value="{{$v->MaLoaiNV}}"
                        <?php
                        if($v->MaLoaiNV==$value->MaLoaiNV)
                        echo 'selected'
                        ?>>
                        {{$v->NhiemVu}}</option>
                    @endforeach
                    </select>
                    <input type="submit" name="capnhat" value="Cập nhật">
					{{csrf_field()}}
                </form>
                </td>
                <td>
                <!-- <a class="btn btn-primary btn-sm" href="/admin/customer/edit/{{$value->MaNV}}"> 
                    <i class="fas fa-edit"></i> 
                </a>
                <a class="btn btn-danger btn-sm" href="/admin/customer/delete/{{$value->MaNV}}">
                     <i class="fas fa-trash"></i> 
                </a> -->

                </td>
            </tr>
            @endforeach
        
    </table>
@endsection