@extends('page.main')
@section('content')
<form action="{{url('/payments')}}/" method="POST">
    @csrf
    <button type="submit" name="payUrl">Thanh Toán</button>
</form>
@endsection