$(document).ready(function () {
   $(".update").click(function () {
       var rowid = $(this).attr('rowid');
       var qty = $(this).parent().parent().find("#qty").val();
       var token = $("input[name='_token']").val();

       $.ajax({
           url: 'cap-nhat/' + rowid + '/' + qty,
           type: 'GET',
           cache: false,
           data: {"_token":token, "id":rowid, "qty":qty},
           success: function (data) {
               if(data = "oke"){
                    window.location = "gio-hang";
               }
           }
       });
   })
});

$(document).ready(function () {
    $("#updatecheckout").click(function () {

        var rowid = $(this).attr('rowid');
        var qty = $(this).parent().parent().find("#qty").val();
        var token = $("input[name='_token']").val();

        $.ajax({
            url: 'cap_nhap/' + rowid + '/' + qty,
            type: 'GET',
            cache: false,
            data: {"_token":token, "id":rowid, "qty":qty},
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