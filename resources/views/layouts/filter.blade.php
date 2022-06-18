
<div class="container">
<h1>Filter</h1>
<form method="post" id="form-filter" >
    @csrf
<div class="form-group col col-sm-6">
<label for="">Tên khách hàng</label>
<input type="text" class="form-control " name="name" id="name-filter" placeholder="Tìm theo tên">
<span style="color:red;font-size:13px" class="form-message"></span>

</div>
<div class="form-group col col-sm-6">
    <label for="">Số điện thoại</label>
    <input type="number" class="form-control" onchange="HandlePhone(this.value)"  name="phone" id="phone-filter" placeholder="Tìm theo số điện thoại">
    <span style="color:red;font-size:13px" id="message_phone"></span>

</div>
<div class="form-group col col-sm-6">
<label for="">Theo độ tuổi</label>
<input type="number" class="form-control" min="0" onchange="HandleOnchange()" id="old-start" name="old-start" placeholder="Tuổi bắt đầu...">
<label for=""></label>
<input type="number" class="form-control" min="0" onchange="HandleOnchange()" id="old-end" name="old-end" placeholder="Tuổi kết thúc...">
<span style="color:red;font-size:13px" id="message_tag"></span>

</div> 

 
<button type="submit" class="btn btn-info">Filter</button>
</form>
</div>
