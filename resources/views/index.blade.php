@extends('layouts.layout')
@section('content')
@if (session('message'))
<div class="text-center alert {{ session('class') }}" role="alert">
        {{ session('message') }}
</div>
@endif 
@include('layouts.filter')
<a href="{{route('form-contact')}}"><button type="button" class="float-right btn btn-primary">Thêm</button></a>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Ngày sinh</th>
        <th scope="col">Tuổi</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>
        @if (count($contacts)== 0)
        <tr>
          <td colspan="7" class="text-center">Không có khách hàng nào</td>
        </tr>
            
        @else
        @foreach($contacts as $key => $item)
      <tr>    
        <th scope="row">{{++$key}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->address}}</td>
        <td>{{$item->phone}}</td>
        <td>{{$item->dateofbirth}}</td>
        <td>{{$item->olds}}</td>
        <td>
          <a href="/edit/{{$item->id}}"><button type="button" class=" btn btn-info">Sửa</button></a>
          <a href="/destroy/{{$item->id}}" ><button type="button" class=" btn btn-danger">Xóa</button></a>
        </td>
      </tr>
      @endforeach
        @endif
     
    </tbody>
  </table>
@endsection