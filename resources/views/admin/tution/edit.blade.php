@extends('admin.main')
@section('content')
<form method="POST">
  <div class="card-body">
    <div class="form-group">
      <label>Mã Biên Lai</label>
      <input value="{{$data->MaBL}}" type="text" name="ma" class="form-control" disabled>
      @error('ma')
      <span class="text-danger input-group mb-3">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
      <label>Ngày đóng tiền</label>
      <input value="{{$data->NgayDong}}" type="date" name="ngay" class="form-control">
      @error('ngay')
      <span class="text-danger input-group mb-3">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
      <label>Số Tiền Đóng</label>
      <input value="{{$data->SoTien}}" type="text" name="tien" class="form-control">
      @error('tien')
      <span class="text-danger input-group mb-3">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
      <label>Ghi Chú</label>
      <input value="{{$data->GhiChu}}" type="text" name="ghichu" class="form-control">
      @error('ghichu')
      <span class="text-danger input-group mb-3">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
      <label>Mã Lớp</label>
      <input value="{{$data->MaLop}}" type="text" name="malop" class="form-control" disabled>
      @error('malop')
      <span class="text-danger input-group mb-3">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
      <label>Mã Học Sinh</label>
      <input value="{{$data->MaHS}}" type="text" name="mahs" class="form-control" disabled>
      @error('mahs')
      <span class="text-danger input-group mb-3">{{$message}}</span>
      @enderror
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Sửa</button>
    </div>
    @csrf
</form>
@endsection