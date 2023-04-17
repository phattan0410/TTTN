@extends('admin.main')
@section('content')
@if(Session::has('success'))
<div style="margin-top:20px" class="alert alert-success">{{Session::get('success')}}</div>
@endif
<table>
    <tr>
        <th>Mã NV</th>
        <th>Họ tên</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>SĐT</th>
        <th>Địa chỉ</th>
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
    </tr>
    @endforeach

</table>
@endsection