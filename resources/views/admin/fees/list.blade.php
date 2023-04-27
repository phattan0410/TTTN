@extends('admin.main')
@section('content')
        @if(Session::has('success'))
          <div style="margin-top:20px"class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <a style="width:100px;margin-top:10px;margin-bottom:10px" class="btn btn-primary btn-sm" href="/admin/fees/add">
            <i class="fas fa-plus"></i>
        </a>
    <table>
            <tr>
                <th>Mã biên lai</th>
                <th>Ngày đóng</th>
                <th>Số tiền đóng</th>
                <th>Ghi chú</th>
                <th>Mã nhân viên</th>
                <th>Mã học sinh</th>
            </tr>

            @foreach($data as $key => $value)
            <tr style="border: 1px solid #ddd; padding:10px 0;border-bottom:0">
                <td>{{$value->MaBL}}</td>
                <td>{{$value->NgayDong}}</td>
                <td>{{$value->SoTien}}</td>
                <td>{{$value->GhiChu}}</td>
                <td>{{$value->MaNV}}</td>
                <td>{{$value->MaHS}}</td>
                <td>
                <a class="btn btn-primary btn-sm" href="/admin/fees/edit/{{$value->MaBL}}">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-sm" href="/admin/fees/delete/{{$value->MaBL}}">
                     <i class="fas fa-trash"></i>
                </a>

                </td>
            </tr>
            @endforeach
    </table>
@endsection
