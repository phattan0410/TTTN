
@extends('admin.main')
@section('content')
    <form method="POST">
      <div class="card-body"> 
        <div class="form-group">
            <label >Mã Bữa Ăn</label>
            <input value="{{old('ma')}}" type="text" name="ma" class="form-control">
            @error('ma')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
            <label >Tên Bữa Ăn</label>
            <input value="{{old('ten')}}" type="text" name="ten" class="form-control">
            @error('ten')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label >Số Tiền Bữa Ăn</label>
            <input value="{{old('stba')}}" type="text" name="stba" class="form-control">
            @error('stba')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
         @csrf
    </form>
@endsection