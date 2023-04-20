@extends('admin.main')
@section('content')
<form method="POST">
    <div class="card-body">
        <div class="form-group">
            <select name="nd" class="form-control">
                <option value="0" selected>Phụ Huynh</option>
                <option value="1">Lớp Năng Khiếu</option>
            </select>
        </div>
        <div class="form-group">

            <input type="text" class="form-control" placeholder="input" name="vl">
            @error('vl')
            <span class="text-danger input-group mb-3">{{$message}}</span>
            @enderror
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
        </div>
        @csrf
</form>
@endsection