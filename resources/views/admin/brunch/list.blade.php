@extends('admin.main')
@section('content')
        @if(Session::has('success'))
          <div style="margin-top:20px"class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <a style="width:100px;margin-top:10px;margin-bottom:10px" class="btn btn-primary btn-sm" href="/admin/brunch/add"> 
            <i class="fas fa-plus"></i> 
        </a>
    <table>
            <tr>
                <th>Mã bữa ăn</th>
                <th>Tên bữa ăn</th>
                <th>Số tiền bữa ăn</th>
                <th></th>
            </tr>
        
            @foreach($data as $key => $value)
            <tr style="border: 1px solid #ddd; padding:10px 0;border-bottom:0">
                <td>{{$value->MaBA}}</td>
                <td>{{$value->TenBA}}</td>
                <td>{{$value->SoTienBA}}</td>
                <td>
                <a class="btn btn-primary btn-sm" href="/admin/brunch/edit/{{$value->MaBA}}"> 
                    <i class="fas fa-edit"></i> 
                </a>
                <a class="btn btn-danger btn-sm" href="/admin/brunch/delete/{{$value->MaBA}}">
                     <i class="fas fa-trash"></i> 
                </a>

                </td>
            </tr>
            @endforeach
    </table>
@endsection