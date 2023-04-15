@extends('admin.main')
@section('content')
    <form method="POST">
      <div class="card-body">
        <div class="form-group">
            <label >Mã Biên Lai</label>
            <input value="{{old('ma')}}" type="text" name="ma" class="form-control">
            @error('ma')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
            <label >Ngày Đóng Tiền</label>
            <input value="{{old('ngaydong')}}" type="date" name="ngay" class="form-control">
            @error('ngay')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label >Số Tiền Đóng</label>
            <input value="{{old('sotien')}}" type="text" name="std" class="form-control">
            @error('std')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label >Ghi Chú</label>
            <input value="{{old('ghichu')}}" type="text" name="gc" class="form-control">
            @error('gc')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label >Mã Nhân Viên</label>
            <input value="{{old('manv')}}" type="text" name="manv" class="form-control">
            @error('manv')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label >Mã Học Sinh</label>
            <input value="{{old('mahs')}}" type="text" name="mahs" class="form-control">
            @error('mahs')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
         @csrf
    </form>
@endsection
