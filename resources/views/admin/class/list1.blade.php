@extends('admin.main')
@section('content')
@if(Session::has('success'))
<div style="margin-top:20px" class="alert alert-success">{{Session::get('success')}}</div>
@endif

<table>
    <tr>
        <th>Mã Lớp</th>
        <th>Tên Lớp</th>
        <th>Số Buổi Học</th>
        <th>Số Lượng Học Sinh</th>
        <th>Học Phí</th>
        <th>Thời Gian Học</th>
    </tr>

    @foreach($data as $key => $value)
    <tr style="border: 1px solid #ddd; padding:10px 0;border-bottom:0">
        <td>{{$value->MaLop}}</td>
        <td>{{$value->TenLop}}</td>
        <td>{{$value->SoBuoiHoc}}</td>
        <td>{{$value->SoLuongHS}}</td>
        <td>{{number_format($value->HocPhi,$decimals=0,$dec_point=',',$thousand_sep='.').'đ'}}</td>
        <td>{{$value->ThoiGianHoc}}</td>
    </tr>
    @endforeach

</table>
@endsection