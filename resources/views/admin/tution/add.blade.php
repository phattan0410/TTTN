@extends('admin.main')
@section('content')
<form method="POST">
  <div class="card-body">
    <div class="form-group">
      <label>Mã Biên Lai</label>
      <input value="{{old('ma')}}" type="text" name="ma" class="form-control">
      @error('ma')
      <span class="text-danger input-group mb-3">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
      <label>Lớp</label>
      <select name="malop" id="lop" class="form-control choose">
        <option value="0">...</option>

        @foreach($lh as $v)
        <option value="{{$v->MaLop}}">{{$v->TenLop}}</option>
        @endforeach
      </select>
      @error('malop')
      <span class="text-danger input-group mb-3">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
      <label>Học Sinh</label>
      <select name="mahs" id="hs" class="form-control ">
        <option value="0">...</option>
      </select>
      @error('mahs')
      <span class="text-danger input-group mb-3">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
      <label>Ngày Đóng Tiền</label>
      <input value="{{old('ngay')}}" type="date" name="ngay" class="form-control">
      @error('ngay')
      <span class="text-danger input-group mb-3">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
      <label>Số Tiền Đóng</label>
      <input id="hp" value="{{old('tien')}}" type="text" name="tien" class="form-control">
      @error('tien')
      <span class="text-danger input-group mb-3">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
      <label>Ghi Chú</label>
      <input value="{{old('ghichu')}}" type="text" name="ghichu" class="form-control">
      @error('ghichu')
      <span class="text-danger input-group mb-3">{{$message}}</span>
      @enderror
    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Thêm</button>
    </div>
    @csrf
</form>
@endsection
@section('js')

@stop