@extends('layouts.layout')
@section('content')
@if (session('message'))
<div class="text-center alert {{ session('class') }}" role="alert">
        {{ session('message') }}
</div>
@endif  
<div class="m-5">
<h2 class="text-center">Sửa thông tin khách hàng</h2>
@foreach ($contacts as $item)
    

<form action="" method="post" id="form-add-contact">
    @csrf
    <div class="form-group">
        <label for="username">Họ và tên</label>
        <input type="text" class="form-control" name="name" id="username" value="{{$item->name}}" placeholder="Họ và tên...">
        <span style="color:red;font-size:13px" class="form-message"></span>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" value="{{$item->address}}" id="address" placeholder="Địa chỉ...">
        <span style="color:red;font-size:13px" class="form-message"></span>

    </div>

    <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input type="text" class="form-control" id="phone" value="{{$item->phone}}" name="phone" placeholder="Số điện thoại...">
        <span style="color:red;font-size:13px" class="form-message"></span>

    </div>

    <div class="form-group">
        <label for="date_birh">ngày sinh</label>
        <input type="date" class="form-control" id="date_birh" value="{{$item->dateofbirth}}" name="date_birh" placeholder="">
        <span style="color:red;font-size:13px" class="form-message"></span>

    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <button type="button" onclick="window.location.href='{{route('list-contact')}}'" class="btn btn-primary">quay lại</button>

</form>
@endforeach
</div>
@endsection