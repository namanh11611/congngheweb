$(document).ready(function () {
   $(".update").click(function () {
       var rowId = $(this).attr('rowId');
       var qty = $(this).parent().parent().find("#qty").val();
       var token = $("input[name='_token']").val();

console.log(rowId);
           console.log(qty);
           return;
       $.ajax({
           url: 'cap-nhat/' + rowId + '/' + qty,
           type: 'GET',
           cache: false,
           data: {"_token":token, "id":rowId, "qty":qty},
           success: function (data) {
            console.log(rowId);
           console.log(qty);
               if(data = "oke"){
                    window.location = "gio-hang";
               }
           }
       });
   })
});

$(document).ready(function () {
    $("#updatecheckout").click(function () {

        var rowId = $(this).attr('rowId');
        var qty = $(this).parent().parent().find("#qty").val();
        var token = $("input[name='_token']").val();

        $.ajax({
            url: 'cap_nhap/' + rowId + '/' + qty,
            type: 'GET',
            cache: false,
            data: {"_token":token, "id":rowId, "qty":qty},
            success: function (data) {
                if(data = 'oke'){
                    window.location = "checkout";
                }
            }
        });
    })
});

$(document).ready(function () {
    $("#xacnhan").click(function () {
        window.confirm("Are you want to buy now?");
    });
});

$("div.alert").delay(3000).slideUp();