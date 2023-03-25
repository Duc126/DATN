$(document).ready(function () {
    $("#getPrice").change(function () {
        var size = $(this).val();
        var product_id = $(this).attr("product-id");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/get-product-price",
            data: {
                size: size,
                product_id: product_id,
            },
            type:'post',
            success:function(resp){
                if(resp['discount'] > 0){
                    $(".getAttributePrice").html("<div class='price'><h4>"+resp['final_price']+".đ</h4></div><div class='original-price'><strong>Giá Gốc: </strong><span>"+resp['product_price']+".đ</span></div>");
                }else {
                    $(".getAttributePrice").html("<div class='price'><h4>"+resp['final_price']+".đ</h4></div>");

                }
            },
            error: function () {
                alert("Error");
            },
        });
    });

    //update cart item quantity
    $(document).on("click", ".updateCartItem", function () {
        if ($(this).hasClass("plus-a")) {
            //get QTY
            var quantity = $(this).data("qty");
            //increase the qty by 1
            new_qty = parseInt(quantity) + 1;
            // alert(new_qty);
        }
        if ($(this).hasClass("minus-a")) {
            //get QTY
            var quantity = $(this).data("qty");
            //check QTy is atleast 1
            if (quantity <= 1) {
                alert("Số lượng mặt hàng phải từ 1 trở lên!");
                return false;
            }
            //increase the qty by 1
            new_qty = parseInt(quantity) - 1;
            // alert(new_qty);
        }
        var cartid = $(this).data("cartid");
        // alert(cartid);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                cartid: cartid,
                qty: new_qty,
            },
            url: "/cart/update",
            type: "post",
            success: function (resp) {
                if (resp.status == false) {
                    alert(resp.message);
                }
                $("#appendCartItems").html(resp.view);
            },
            error: function () {
                alert("Error");
            },
        });
    });

    //Delete Cart item
    $(document).on("click", ".deleteCartItem", function () {
        var cartid = $(this).data("cartid");
        var result = confirm(
            "Bạn có chắc muôn xóa sản phẩm này trong giỏ hàng?"
        );
        if (result) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    cartid: cartid,
                },
                url: "/cart/delete",
                type: "post",
                success: function (resp) {
                    $("#appendCartItems").html(resp.view);
                },
                error: function () {
                    alert("Error");
                },
            });
        }
    });
    // Register Form validation
    $("#registerForm").submit(function(){
        $(".loader").show();
        var formData = $(this).serialize();
        $.ajax({
            // headers: {
            //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
            //         "content"
            //     ),
            // },
            url: "/user/register",
            type: "Post",
            data:formData,
            success: function(resp){
                if(resp.type=="error"){
                    $(".loader").hide();

                    $.each(resp.errors, function(i,error){
                    $("#register-"+i).attr('style', 'color:red');

                    $("#register-"+i).html(error);
                    setTimeout(function(){
                        $("#register-"+i).css({
                            'display':'none'
                        });

                    },3000);
                });
                }else if(resp.type=="success"){
                    // alert(resp.message);
                    $(".loader").hide();
                    $("#register-success").attr('style', 'color:green');
                    $("#register-success").html(resp.message);
                    // window.location.href = resp.url;

                }
            }, error:function(){
                alert("Error");
            }
        })
    });
    $("#loginForm").submit(function(){
        var formData = $(this).serialize();
        $.ajax({
            // headers: {
            //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
            //         "content"
            //     ),
            // },
            url: "/user/login",
            type: "Post",
            data:formData,
            success: function(resp){
                if(resp.type=="error"){
                    $.each(resp.errors, function(i,error){
                    $("#login-"+i).attr('style', 'color:red');

                    $("#login-"+i).html(error);
                    setTimeout(function(){
                        $("#login-"+i).css({
                            'display':'none'
                        });

                    },3000);
                });
                }else if(resp.type=="incorrect"){
                    // alert(resp.message);
                    $("#login-error").attr('style', 'color:red');
                    $("#login-error").html(resp.message);
                }else if(resp.type=="inactive"){
                    // alert(resp.message);
                    $("#login-error").attr('style', 'color:red');
                    $("#login-error").html(resp.message);
                }else if(resp.type=="success"){
                    window.location.href = resp.url;

                }
            }, error:function(){
                alert("Error");
            }
        })
    });

});

function get_filter(class_name) {
    var filter = [];
    $("." + class_name + ":checked").each(function () {
        filter.push($(this).val());
    });
    return filter;
}
