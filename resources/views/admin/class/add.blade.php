@extends('admin.main')
@section('content')
    <form method="POST">
      <div class="card-body"> 
        <div class="form-group">
            <label >Mã Lớp</label>
            <input value="{{old('ma')}}" type="text" name="ma" class="form-control">
            @error('ma')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
            <label >Tên Lớp</label>
            <input value="{{old('ten')}}" type="text" name="ten" class="form-control">
            @error('ten')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
          <label >Số Buổi Học</label>
          <input value="{{old('sbh')}}" type="text" name="sbh" class="form-control">
          @error('sbh')
          <span class="text-danger input-group mb-3">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label >Số Lượng Học Sinh</label>
          <input value="{{old('slhs')}}" type="text" name="slhs" class="form-control">
          @error('slhs')
          <span class="text-danger input-group mb-3">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label >Học Phí</label>
          <input value="{{old('hp')}}" type="text" name="hp" class="form-control">
          @error('hp')
          <span class="text-danger input-group mb-3">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
            <label >Thời Gian Học</label>
            <input value="{{old('tgh')}}" type="date" name="tgh" class="form-control">
            @error('tgh')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label >Giáo Viên Phụ Trách</label>
            <select name="gvpt" class="form-control">
              @foreach($data as $v)
              <option value="{{$v->MaNV}}">{{$v->HoTenNV}}</option>
              @endforeach
            </select>
          </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
         @csrf
    </form>
@endsection