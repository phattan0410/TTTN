@extends('admin.main')
@section('content')
        @if(Session::has('success'))
          <div style="margin-top:20px"class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <a style="width:100px;margin-top:10px;margin-bottom:10px" class="btn btn-primary btn-sm" href="/admin/food/add"> 
            <i class="fas fa-plus"></i> 
        </a>
    <table>
            <tr>
                <th>Mã món ăn</th>
                <th>Tên món ăn</th>
                <th>Loại món ăn</th>
                <th></th>
            </tr>
        
            @foreach($data as $key => $value)
            <tr style="border: 1px solid #ddd; padding:10px 0;border-bottom:0">
                <td>{{$value->MaMon}}</td>
                <td>{{$value->TenMon}}</td>
                <td>{{$value->LoaiMA}}</td>
                <td>
                <a class="btn btn-primary btn-sm" href="/admin/food/edit/{{$value->MaMon}}"> 
                    <i class="fas fa-edit"></i> 
                </a>
                <a class="btn btn-danger btn-sm" href="/admin/food/delete/{{$value->MaMon}}">
                     <i class="fas fa-trash"></i> 
                </a>

                </td>
            </tr>
            @endforeach
    </table>
@endsection