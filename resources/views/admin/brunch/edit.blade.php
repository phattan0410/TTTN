
@extends('admin.main')
@section('content')
    <form method="POST">
      <div class="card-body"> 
        <div class="form-group">
            <label >Mã Bữa Ăn</label>
            <input value="{{$data->MaBA}}" type="text" name="ma" class="form-control" disabled>
            @error('ma')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
            <label >Tên Bữa Ăn</label>
            <input value="{{$data->TenBA}}" type="text" name="ten" class="form-control">
            @error('ten')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label >Số Tiền Bữa Ăn</label>
            <input value="{{$data->SoTienBA}}" type="text" name="stba" class="form-control">
            @error('stba')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
         @csrf
    </form>
@endsection