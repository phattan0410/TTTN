@extends('admin.main')
@section('content')
    <form method="POST">
      <div class="card-body"> 
        <div class="form-group">
            <label >Mã Phụ Huynh</label>
            <input value="{{old('ma')}}" type="text" name="ma" class="form-control">
            @error('ma')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
            <label >Họ Tên Ba</label>
            <input value="{{old('htb')}}" type="text" name="htb" class="form-control">
            @error('htb')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label >Họ Tên Mẹ</label>
            <input value="{{old('htm')}}" type="text" name="htm" class="form-control">
            @error('htm')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        
        <div class="form-group">
          <label>Địa Chỉ</label>
          <textarea value="{{old('dc')}}" name="dc" class="form-control"></textarea>
            @error('dc')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label >Số Điện Thoại Ba</label>
            <input value="{{old('sdtb')}}" type="text" name="sdtb" class="form-control">
            @error('sdtb')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label >Số Điện Thoại Mẹ</label>
            <input value="{{old('sdtm')}}" type="text" name="sdtm" class="form-control">
            @error('sdtm')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label >Tên Học Sinh</label>
            <select name="ths" class="form-control">
              @foreach($data as $v)
              <option value="{{$v->MaHS}}">{{$v->TenHS}}</option>
              @endforeach
            </select>
          </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
         @csrf
    </form>
@endsection