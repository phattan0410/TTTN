@extends('admin.main')
@section('content')
    <form method="POST">
      <div class="card-body"> 
        <div class="form-group">
            <label >Mã Lớp</label>
            <input value="{{$data->MaLop}}" type="text" name="ma" class="form-control" disabled>
            @error('ma')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
            <label >Tên Lớp</label>
            <input value="{{$data->TenLop}}" type="text" name="ten" class="form-control">
            @error('ten')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
          <label >Số Buổi Học</label>
          <input value="{{$data->SoBuoiHoc}}" type="text" name="sbh" class="form-control">
          @error('sbh')
          <span class="text-danger input-group mb-3">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label >Số Lượng Học Sinh</label>
          <input value="{{$data->SoLuongHS}}" type="text" name="slhs" class="form-control">
          @error('slhs')
          <span class="text-danger input-group mb-3">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label >Học Phí</label>
          <input value="{{$data->HocPhi}}" type="text" name="hp" class="form-control">
          @error('hp')
          <span class="text-danger input-group mb-3">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
            <label >Thời Gian Học</label>
            <input value="{{$data->ThoiGianHoc}}" type="date" name="tgh" class="form-control">
            @error('tgh')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label >Giáo Viên Phụ Trách</label>
            <select name="gvpt" class="form-control">
              @foreach($data1 as $v1)
              <option value="{{$v1->MaNV}}" <?php
              if($v1->MaNV==$data->MaNV)
                echo 'selected'
              ?>>{{$v1->HoTenNV}}</option>
              @endforeach
            </select>
          </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
         @csrf
    </form>
@endsection