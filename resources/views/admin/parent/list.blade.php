@extends('admin.main')
@section('content')
        @if(Session::has('success'))
          <div style="margin-top:20px"class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <a style="width:100px;margin-top:10px;margin-bottom:10px" class="btn btn-primary btn-sm" href="/admin/parent/add"> 
            <i class="fas fa-plus"></i> 
        </a>
    <table>
            <tr>
                <th>Mã phụ huynh</th>
                <th>Họ tên ba</th>
                <th>Họ tên mẹ</th>
                <th>Địa chỉ</th>
                <th>SĐT ba</th>
                <th>SĐT mẹ</th>
                <th></th>
            </tr>
        
            @foreach($data as $key => $value)
            <tr style="border: 1px solid #ddd; padding:10px 0;border-bottom:0">
                <td>{{$value->MaPH}}</td>
                <td>{{$value->HoTenBa}}</td>
                <td>{{$value->HoTenMe}}</td>
                <td>{{$value->DiaChiLienLac}}</td>
                <td>{{$value->SoDTBa}}</td>
                <td>{{$value->SoDTMe}}</td>
                <td>
                <a class="btn btn-primary btn-sm" href="/admin/parent/edit/{{$value->MaPH}}"> 
                    <i class="fas fa-edit"></i> 
                </a>
                <a class="btn btn-danger btn-sm" href="/admin/parent/delete/{{$value->MaPH}}">
                     <i class="fas fa-trash"></i> 
                </a>

                </td>
            </tr>
            @endforeach
    </table>
@endsection