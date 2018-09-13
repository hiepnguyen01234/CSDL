// JavaScript Document
function callAjaxSP(url, id){
	$(id).html('<p align="center"><img src="./images/loading.gif" /></p>');
	$.ajax({
	type: "GET",
	url: url
	})
	.done(function( msg ) {
		$(id).html(msg);
		//alert(msg);
	});
}
function callAjaxLoai(url, id){
	$(id).html('<p align="center"><img src="./images/loading.gif" /></p>');
	$.ajax({
	type: "GET",
	url: url
	})
	.done(function( msg ) {
		$(id).html(msg);
		//alert(msg);
	});
}
function callAjaxTT(url, id){
	idT = $('#TinhThanh').val();
	$(id).html('');
	//idH = $('#QuanHuyen').val();
	//alert(idH);
	//alert(idT);
	//$(id).html('<p align="center"><img src="images/loading.gif" /></p>');
	$.ajax({
	type: "GET",
	url: url,
	data: { idT: idT }
	})
	.done(function( msg ) {
		$(id).html(msg);
		//alert(msg);
	});
}
function callAjaxPX(url, id){
	idH = $('#QuanHuyen').val();
	$(id).html('');
	$.ajax({
	type: "GET",
	url: url,
	data: { idT: idT, idH : idH }
	})
	.done(function( msg ) {
		$(id).html(msg);
	});
}
function callAjax(url, id){
	$(id).html('');
	$.ajax({
	type: "GET",
	url: url
	})
	.done(function( msg ) {
		$(id).html(msg);
		//alert(msg);
	});
}
emailPattern = /^[a-z0-9_.]+@[a-z0-9.]+\.[a-z]{2,}$/i;
phonePattern = /^[0-9]{9,11}$/;
function checkData(){
	var obj = document.getElementById('HoTen');
	if(obj.value == ''){
		alert('Vui lòng nhập họ tên của bạn.');
		obj.focus();
		return false;
	}
	var obj = document.getElementById('Email');
	if(emailPattern.test(obj.value) == false){
		alert('Email không hợp lệ. Vui lòng kiểm tra lại');
		obj.focus();
		return false;
	}
	var obj = document.getElementById('Pass');
	if(obj.value.length < 3){
		alert('Mật khẩu của bạn phải lớn hơn 3 ký tự');
		obj.focus();
		return false;
	}
	var objRe = document.getElementById('rePass');
	if(objRe.value != document.getElementById('Pass').value){
		alert('Mật khẩu chưa khớp. Hãy kiểm tra lại!');
		obj.focus();
		return false;
	}
	var objDT = document.getElementById('DienThoai');
	if(phonePattern.test(objDT.value) == false){
		alert('Số điện thoại phải ở dạng số.');
		objDT.focus();
		return false;
	}
	var objTT = document.getElementById('TinhThanh');
	if(objTT.value == 0){
		alert('Vui lòng chọn thành phố bạn đang ở.');
		return false;
	}
	var objQH = document.getElementById('QuanHuyen');
	if(objQH.value == 0){
		alert('Hãy chọn quận huyện bạn đang sống.');
		return false;
	}
	var objPX = document.getElementById('PhuongXa');
	if(objPX.value == 0){
		alert('Chọn phường xã hiện tại nơi cư chú của bạn.');
		return false;
	}
	var objSN = document.getElementById('SoNha');
	if(objSN.value == ''){
		alert('Vui lòng nhập địa chỉ của bạn');
		objSN.focus();
		return false;
	}
	var objDiaChi = document.getElementById('DiaChi');
	if(objDiaChi.value == ''){
		alert('Vui lòng nhập địa chỉ của bạn');
		objDiaChi.focus();
		return false;
	}
	var obj = document.getElementById('MatMa');
	if(obj.value == ''){
		alert('Bạn chưa nhập mã bảo mật.');
		obj.focus();
		return false;
	}		
}
function copyThongTin(){
	//hoten = $('label#HoTenDH').html();
	//alert(hoten);
	$('#HoTen').val($('label#HoTenDH').html());
	$('#Email').val($('label#EmailDH').html());
	$('#DienThoai').val($('label#DienThoaiDH').html());
	$('#DiaChi').val($('label#DiaChiDH').html());
}
function callAjaxEmail(){
	Email = $('#Email').val();
	$('#msg').html('');//Xoa thong diep cũ
	if(emailPattern.test(Email))//Neu email hop le
	{
		$.ajax({
		type: "POST",
		url: "modules/ajaxEmail.php",
		data: { Email: Email }
		})
		.done(function( msg ) {
			//alert( "Ket qua: " + msg );
			$('#msg').html(msg);
		});
	}
}