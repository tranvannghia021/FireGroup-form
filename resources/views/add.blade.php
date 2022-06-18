@extends('layouts.layout')
@section('content')
@if (session('message'))
<div class="text-center alert {{ session('class') }}" role="alert">
        {{ session('message') }}
</div>
@endif  
<div class="m-5">
<h2 class="text-center">Thêm thông tin khách hàng</h2>
<form action="" method="post" id="form-add-contact">
    @csrf
    <div class="form-group">
        <label for="username">Họ và tên</label>
        <input type="text" class="form-control" name="name" id="username" placeholder="Họ và tên...">
        <span style="color:red;font-size:13px" class="form-message"></span>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ...">
        <span style="color:red;font-size:13px" class="form-message"></span>

    </div>

    <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại...">
        <span style="color:red;font-size:13px" class="form-message"></span>

    </div>

    <div class="form-group">
        <label for="date_birh">ngày sinh</label>
        <input type="date" class="form-control" id="date_birh" name="date_birh" placeholder="">
        <span style="color:red;font-size:13px" class="form-message"></span>

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-info">Clear</button>
</form>
</div>
@endsection