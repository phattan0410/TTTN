@extends('admin.main')
@section('content')
    <form method="POST">
      <div class="card-body">
        <div class="form-group">
            <label >Mã Học Sinh</label>
            <input value="{{old('ma')}}" type="text" name="ma" class="form-control">
            @error('ma')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
            <label >Tên Học Sinh</label>
            <input value="{{old('ten')}}" type="text" name="ten" class="form-control">
            @error('ten')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
          <label >Giới Tính</label>
          <input value="{{old('gt')}}" type="text" name="gt" class="form-control">
          @error('gt')
          <span class="text-danger input-group mb-3">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label >Điện Thoại</label>
          <input value="{{old('dt')}}" type="text" name="dt" class="form-control">
          @error('dt')
          <span class="text-danger input-group mb-3">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label >Địa Chỉ</label>
          <input value="{{old('dc')}}" type="text" name="dc" class="form-control">
          @error('dc')
          <span class="text-danger input-group mb-3">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
            <label >Tên Đăng Nhập</label>
            <input value="{{old('tdn')}}" type="text" name="tdn" class="form-control">
            @error('tdn')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label >Mật Khẩu</label>
            <input value="{{old('mk')}}" type="text" name="mk" class="form-control">
            @error('mk')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
         @csrf
    </form>
@endsection
