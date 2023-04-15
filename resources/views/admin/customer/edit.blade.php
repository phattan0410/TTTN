@extends('admin.main')
@section('content')
    <form method="POST">
      <div class="card-body"> 
        <div class="form-group">
            <label >Mã Nhân Viên</label>
            <input value="{{$data->MaNV}}" type="text" name="ma" class="form-control" disabled>
            @error('ma')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
            <label >Họ Tên</label>
            <input value="{{$data->HoTenNV}}" type="text" name="ten" class="form-control">
            @error('ten')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
            <label >Giới Tính</label>
            <select name="gt" class="form-control">
              <option value="0" selected>Nam</option>
              <option value="1">Nữ</option>
            </select>
          </div>
        <div class="form-group">
            <label >Ngày Sinh</label>
            <input value="{{$data->NgaySinh}}" type="date" name="ns" class="form-control">
            @error('ns')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
            <label >Số Điện Thoại</label>
            <input value="{{$data->SoDT}}" type="text" name="sdt" class="form-control">
            @error('sdt')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
          <label>Địa Chỉ</label>
          <textarea value="{{$data->DiaChi}}" name="dc" class="form-control"></textarea>
            @error('dc')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label >Tài Khoản</label>
            <input value="{{$data->TenDangNhap}}" type="text" name="tk" class="form-control" disabled>
            @error('tk')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
          <label>Mật Khẩu</label>
          <input type="password" name="mk" class="form-control"></input>
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