@extends('admin.main')
@section('content')
    <form method="POST">
      <div class="card-body">
        <div class="form-group">
            <label >Mã Học Sinh</label>
            <input value="{{$data->MaHS}}" type="text" name="ma" class="form-control" disabled>
            @error('ma')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
            <label >Tên Học Sinh</label>
            <input value="{{$data->TenHS}}" type="text" name="ten" class="form-control">
            @error('ten')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
          <label >Giới Tính</label>
          <input value="{{$data->GioiTinh}}" type="text" name="gt" class="form-control">
          @error('gt')
          <span class="text-danger input-group mb-3">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label >Điện Thoại</label>
          <input value="{{$data->DienThoai}}" type="text" name="dt" class="form-control">
          @error('dt')
          <span class="text-danger input-group mb-3">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label >Địa Chỉ</label>
          <input value="{{$data->DiaChi}}" type="text" name="dc" class="form-control">
          @error('dc')
          <span class="text-danger input-group mb-3">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
            <label >Tên Đăng Nhập</label>
            <input value="{{$data->TenDangNhap}}" type="text" name="tdn" class="form-control" disabled>
            @error('tdn')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label >Mật Khẩu</label>
            <input value="{{$data->MatKhau}}" type="text" name="mk" class="form-control" disabled>
            @error('mk')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
         @csrf
    </form>
@endsection
