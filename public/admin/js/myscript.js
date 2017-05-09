$(document).ready(function() {
	$('#dataTables-example').DataTable({
		responsive: true
	});
});

$("div.alert").delay(3000).slideUp();

function xacnhanxoa(msg) {
	if(window.confirm(msg)){
		return true;
	}
	return false;
}

function getStartDate() {
	return document.getElementById('datepicker').value;
}

function getEndDate() {
	return document.getElementById('datepickerend').value;
}


$(document).ready(function () {
	$("#addImages").click(function () {
		$("#insert").append('<div class="form-group"><input type="file" name="fEditImage[]"></div>');
	});

	$("#divtreating").hide();
	$("#divborder").hide();

	$("#btntreat").click(function () {
		$("#divcontrol").remove();
		$("#divborder").show();
		$("#divtreating").show();
	});
});

$(document).ready(function(){
	$("#tbDetailOrderIn").on('click','#btnDeleteDetailOrderIn',function(){
		$(this).closest('tr').remove();
	});
	$("#tbDetailOrderIn").on('click','#btnAddDetailOrderIn',function(){
		$('#tbDetailOrderIn tr:last').before('<tr class="odd gradeX" align="center"><td><input class="form-control" name="txtProductName[]" placeholder="Name Product" list="products"/><datalist id="products">@foreach($product as $item_product)<option value="{!! $item_product[\'name\'] !!}">@endforeach</datalist></td><td><input class="form-control" name="txtQuantity[]" placeholder="Quantity"/></td><td><input class="form-control" name="txtPriceIn[]" placeholder="Price Input"/></td><td class="center"><button id="btnDeleteDetailOrderIn" type="button" class="btn btn-danger" title="Remove"><i class="fa fa-minus-circle"></i></button></td></tr>');
	});
});

$(document).ready(function(){
	console.log($("#datepicker"))
	$("#datepicker").datepicker();
	$("#datepickerend").datepicker();
});

$(document).ready(function () {
	$("a#del_img_demo").on('click', function () {
		var url = "http://localhost:8080/www/shoppingweb.com/admin/product/delimg/";
		var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
		var idHinh = $(this).parent().find("img").attr("idHinh");
		var img = $(this).parent().find("img").attr("src");
		var rid = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url + idHinh,
			type: 'GET',
			cache: false,
			data: {"_token":_token, "idHinh":idHinh, "urlHinh":img},
			success: function (data) {
				if(data == "Oke"){
					$("#" + rid).remove();
				} else{
					alert('Error! Please contact admin!')
				}
			}
		});
	})
});


// $(document).ready(function () {
//     $("a#statistic").click(function () {
//
//         // var rowid = $(this).attr('rowid');
//         // var qty = $(this).parent().parent().find("#qty").val();
//         var token = $("input[name='_token']").val();
//         var dateStart = getStartDate();
//         var dateEnd = getEndDate();
//
//         $.ajax({
//             url: 'cap_nhap/' + dateStart + '/' + dateEnd,
//             type: 'GET',
//             cache: false,
//             data: {"_token":token, "id":rowid, "qty":qty},
//             success: function (data) {
//                 if(data = 'oke'){
//                     // window.location = "checkout";
//                     alert('aa')
//                 }
//             }
//         });
//     })
// });