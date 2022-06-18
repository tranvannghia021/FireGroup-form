document.addEventListener('DOMContentLoaded', function () {
    Validator({
        form: '#form-add-contact',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('#username', 'Vui lòng nhập họ và tên'),
            Validator.isRequired('#address', 'Vui lòng nhập địa chỉ'),
            Validator.isRequired('#phone', 'Vui lòng nhập số điện thoại'),
            Validator.isPhoneNumber('#phone', 'Trường này phải là số điên thoại'),
            Validator.isRequired('#date_birh', 'Vui lòng nhập ngày sinh'),
        ],
    });
});

//filter
function HandleOnchange() {
    const old_start = document.getElementById('old-start').value;
    const old_end = document.getElementById('old-end').value;
    const message_tag = document.getElementById('message_tag');
    if (old_end - old_start <= 0) {
        message_tag.innerHTML = 'Giá trị nhập vào không đúng';
    } else if (old_start < 0 || old_end < 0) {
        message_tag.innerHTML = 'Tuổi không âm';
    } else {
        message_tag.innerHTML = '';
    }
}
function HandlePhone(value) {
    const message_phone = document.getElementById('message_phone');
    var regex = /^0[3|7|8|9|5]\d{7,8}$/;
    if (regex.test(value) == false) {
        message_phone.innerHTML = 'Trường này phải là số điện thoại';
    } else {
        message_phone.innerHTML = '';
    }
}
