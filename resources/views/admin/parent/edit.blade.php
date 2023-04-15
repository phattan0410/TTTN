@extends('admin.main')
@section('content')
    <form method="POST">
      <div class="card-body"> 
        <div class="form-group">
            <label >Mã Phụ Huynh</label>
            <input value="{{$data->MaPH}}" type="text" name="ma" class="form-control" disabled>
            @error('ma')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
            <label >Họ Tên Ba</label>
            <input value="{{$data->HoTenBa}}" type="text" name="htb" class="form-control">
            @error('htb')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label >Họ Tên Mẹ</label>
            <input value="{{$data->HoTenMe}}" type="text" name="htm" class="form-control">
            @error('htm')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
          <label>Địa Chỉ</label>
          <textarea value="{{$data->DiaChiLienLac}}" name="dc" class="form-control"></textarea>
            @error('dc')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label >Số Điện Thoại Ba</label>
            <input value="{{$data->SoDTBa}}" type="text" name="sdtb" class="form-control">
            @error('sdt')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label >Số Điện Thoại Mẹ</label>
            <input value="{{$data->SoDTMe}}" type="text" name="sdtm" class="form-control">
            @error('sdt')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label >Tên Học Sinh</label>
            <select name="ths" class="form-control">
              @foreach($data1 as $v1)
              <option value="{{$v1->MaHS}}" <?php
              if($v1->MaHS==$data->MaHS)
                echo 'selected'
              ?>>{{$v1->TenHS}}</option>
              @endforeach
            </select>
          </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
         @csrf
    </form>
@endsection