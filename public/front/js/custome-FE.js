$(document).ready(function () {
    // $("#getPrice").change(function () {
    //     var size = $(this).val();
    //     var product_id = $(this).attr("product-id");
    //     $.ajax({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //         url: "/get-product-price",
    //         data: {
    //             size: size,
    //             product_id: product_id,
    //         },
    //         type: "post",
    //         success: function (resp) {
    //             if (resp["discount"] > 0) {
    //                 $(".getAttributePrice").html(
    //                     "<div class='price'><h4>" +
    //                         resp["final_price"] +
    //                         ".VNĐ</h4></div><div class='original-price'><strong>Giá Gốc: </strong><span>" +
    //                         resp["product_price"] +
    //                         ".VNĐ</span></div>"
    //                 );
    //             } else {
    //                 $(".getAttributePrice").html(
    //                     "<div class='price'><h4>" +
    //                         resp["final_price"] +
    //                         ".VNĐ</h4></div>"
    //                 );
    //             }
    //         },
    //         error: function () {
    //             alert("Error");
    //         },
    //     });
    // });
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
            type: "post",
            success: function (resp) {
                if (resp["discount"] > 0) {
                    $(".getAttributePrice").html(
                        "<div class='price'><h4>" +
                            formatNumber(resp["final_price"]) +
                            " VNĐ</h4></div><div class='original-price'><strong>Giá Gốc: </strong><span>" +
                            formatNumber(resp["product_price"]) +
                            " VNĐ</span></div>"
                    );
                } else {
                    $(".getAttributePrice").html(
                        "<div class='price'><h4>" +
                            formatNumber(resp["final_price"]) +
                            " VNĐ</h4></div>"
                    );
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    }
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
                $(".totalCartItems").html(resp.totalCartItems);
                if (resp.status == false) {
                    alert(resp.message);
                }
                $("#appendCartItems").html(resp.view);
                $("#appendHeaderCartItems").html(resp.headerView);
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
                    $(".totalCartItems").html(resp.totalCartItems);
                    $("#appendCartItems").html(resp.view);
                    $("#appendHeaderCartItems").html(resp.headerView);
                },
                error: function () {
                    alert("Error");
                },
            });
        }
    });

    //đặt hàng show loader at the time
    // $(document).on("click", "#placeOrder", function () {
    //     $(".loader").show();
    // });

    // Register Form validation
    $("#registerForm").submit(function () {
        $(".loader").show();
        var formData = $(this).serialize();
        $.ajax({
            url: "/user/register",
            type: "Post",
            data: formData,
            success: function (resp) {
                if (resp.type == "error") {
                    $(".loader").hide();

                    $.each(resp.errors, function (i, error) {
                        $("#register-" + i).attr("style", "color:red");

                        $("#register-" + i).html(error);
                        setTimeout(function () {
                            $("#register-" + i).css({
                                display: "none",
                            });
                        }, 3000);
                    });
                } else if (resp.type == "success") {
                    // alert(resp.message);
                    $(".loader").hide();
                    $("#register-success").attr("style", "color:green");
                    $("#register-success").html(resp.message);
                    // window.location.href = resp.url;
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });
    //Account form
    $("#accountForm").submit(function () {
        $(".loader").show();
        var formData = $(this).serialize();
        $.ajax({
            // headers: {
            //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
            //         "content"
            //     ),
            // },
            url: "/user/account",
            type: "Post",
            data: formData,
            success: function (resp) {
                if (resp.type == "error") {
                    $(".loader").hide();

                    $.each(resp.errors, function (i, error) {
                        $("#account-" + i).attr("style", "color:red");

                        $("#account-" + i).html(error);
                        setTimeout(function () {
                            $("#account-" + i).css({
                                display: "none",
                            });
                        }, 3000);
                    });
                } else if (resp.type == "success") {
                    // alert(resp.message);
                    $(".loader").hide();
                    $("#account-success").attr("style", "color:green");
                    $("#account-success").html(resp.message);
                    setTimeout(function () {
                        $("#account-success").css({
                            display: "none",
                        });
                    }, 3000);
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });
    //Update Password form
    $("#passwordForm").submit(function () {
        // $(".loader").show();
        var formData = $(this).serialize();
        $.ajax({
            url: "/user/update-password",
            type: "Post",
            data: formData,
            success: function (resp) {
                if (resp.type == "error") {
                    $(".loader").hide();
                    $.each(resp.errors, function (i, error) {
                        $("#password-" + i).attr("style", "color:red");

                        $("#password-" + i).html(error);
                        setTimeout(function () {
                            $("#password-" + i).css({
                                display: "none",
                            });
                        }, 3000);
                    });
                } else if (resp.type == "incorrect") {
                    $(".loader").hide();
                    $("#password-error").attr("style", "color:red");
                    $("#password-error").html(resp.message);
                    setTimeout(function () {
                        $("#password-error").css({
                            display: "none",
                        });
                    }, 3000);
                } else if (resp.type == "success") {
                    // alert(resp.message);
                    $(".loader").hide();
                    $("#password-success").attr("style", "color:green");
                    $("#password-success").html(resp.message);
                    setTimeout(function () {
                        $("#password-success").css({
                            display: "none",
                        });
                    }, 3000);
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });
    //login form
    $("#loginForm").submit(function () {
        var formData = $(this).serialize();
        $.ajax({
            // headers: {
            //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
            //         "content"
            //     ),
            // },
            url: "/user/login",
            type: "Post",
            data: formData,
            success: function (resp) {
                if (resp.type == "error") {
                    $.each(resp.errors, function (i, error) {
                        $("#login-" + i).attr("style", "color:red");

                        $("#login-" + i).html(error);
                        setTimeout(function () {
                            $("#login-" + i).css({
                                display: "none",
                            });
                        }, 3000);
                    });
                } else if (resp.type == "incorrect") {
                    // alert(resp.message);
                    $("#login-error").attr("style", "color:red");
                    $("#login-error").html(resp.message);
                } else if (resp.type == "inactive") {
                    // alert(resp.message);
                    $("#login-error").attr("style", "color:red");
                    $("#login-error").html(resp.message);
                } else if (resp.type == "success") {
                    window.location.href = resp.url;
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });
    // forgot password Form validation
    $("#forgotForm").submit(function () {
        $(".loader").show();
        var formData = $(this).serialize();
        $.ajax({
            // headers: {
            //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
            //         "content"
            //     ),
            // },
            url: "/user/forgot-password",
            type: "Post",
            data: formData,
            success: function (resp) {
                if (resp.type == "error") {
                    $(".loader").hide();

                    $.each(resp.errors, function (i, error) {
                        $("#forgot-" + i).attr("style", "color:red");

                        $("#forgot-" + i).html(error);
                        setTimeout(function () {
                            $("#forgot-" + i).css({
                                display: "none",
                            });
                        }, 3000);
                    });
                } else if (resp.type == "success") {
                    // alert(resp.message);
                    $(".loader").hide();
                    $("#forgot-success").attr("style", "color:green");
                    $("#forgot-success").html(resp.message);
                    // window.location.href = resp.url;
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });
    //apply coupon

    $("#applyCoupon").submit(function () {
        const user = $(this).attr("user");
        // alert(user);
        if (user == 1) {
            //do nothing
        } else {
            alert("Vui lòng đăng nhập để áp dụng phiếu giảm giá!");
            return false;
        }
        const code = $("#code").val();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            data: {
                code: code,
            },
            url: "/apply-coupon",
            success: function (resp) {
                if (resp.message != "") {
                    alert(resp.message);
                }
                $(".totalCartItems").html(resp.totalCartItems);
                $("#appendCartItems").html(resp.view);
                $("#appendHeaderCartItems").html(resp.headerView);
                if (resp.couponAmount > 0) {
                    // $(".couponAmount").text(resp.couponAmount + ".VNĐ");
                    $(".couponAmount").text(formatNumber(resp.couponAmount) + " VNĐ");

                } else {
                    $(".couponAmount").text("0.VNĐ");
                }
                if (resp.grand_total > 0) {
                    // $(".grand_total").text(resp.grand_total + ".VNĐ");
                    $(".grand_total").text(formatNumber(resp.grand_total) + " VNĐ");

                }
            },
            error: function () {
                alert("Error");
            },
        });
    });

    // edit delivery address
    $(document).on("click", ".editAddress", function () {
        var addressid = $(this).data("addressid");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                addressid: addressid,
            },
            url: "/get-delivery-address",
            type: "post",
            success: function (resp) {
                $("#showDifferent").removeClass("collapse");
                $(".newAddress").hide();
                $(".deliveryText").text("Chỉnh sửa địa chỉ giao hàng");
                $("[name=delivery_id]").val(resp.address["id"]);
                $("[name=delivery_name]").val(resp.address["name"]);
                $("[name=delivery_address]").val(resp.address["address"]);
                $("[name=delivery_city]").val(resp.address["city"]);
                $("[name=delivery_state]").val(resp.address["state"]);
                $("[name=delivery_country]").val(resp.address["country"]);
                $("[name=delivery_pincode]").val(resp.address["pincode"]);
                $("[name=delivery_phone]").val(resp.address["phone"]);
            },
            error: function () {
                alert("Error");
            },
        });
    });

    //save Delivery address
    $(document).on("submit", "#addressAddEditForm", function () {
        const formData = $("#addressAddEditForm").serialize();
        $.ajax({
            url: "/save-delivery-address",
            type: "post",
            data: formData,
            success: function (data) {
                if (data.type == "error") {
                    $(".loader").hide();

                    $.each(data.errors, function (i, error) {
                        $("#delivery-" + i).attr("style", "color:red");

                        $("#delivery-" + i).html(error);
                        setTimeout(function () {
                            $("#delivery-" + i).css({
                                display: "none",
                            });
                        }, 3000);
                    });
                } else {
                    $("#deliveryAddress").html(data.view);
                    window.location.href = "checkout";
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });

    //Remove Delivery Address
    $(document).on("click", ".removeAddress", function () {
        if (confirm("Are you sure to remove this?")) {
            const addressid = $(this).data("addressid");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/remove-delivery-address",
                type: "post",
                data: {
                    addressid: addressid,
                },
                success: function (resp) {
                    $("#deliveryAddress").html(resp.view);
                    window.location.href = "checkout";
                },
                error: function () {
                    alert("Error");
                },
            });
        }
    });

    //
    // $("input[name=address_id").bind("change", function () {
    //     var shipping_charges = $(this).attr("shipping_charges");
    //     var total_price = $(this).attr("total_price");
    //     var coupon_amount = $(this).attr("coupon_amount");
    //     $(".shipping_charges").html(shipping_charges + ".VNĐ");
    //     if (coupon_amount == "") {
    //         coupon_amount = 0;
    //     }

    //     $(".couponAmount").html(coupon_amount + ".VNĐ");

    //     var grand_total =
    //         parseInt(total_price) +
    //         parseInt(shipping_charges) -
    //         parseInt(coupon_amount);
    //         // alert(grand_total);
    //     $(".grand_total").html(grand_total + ".VNĐ");

    // });
    $("input[name=address_id]").bind("change", function () {
        var shipping_charges = $(this).attr("shipping_charges");
        var total_price = $(this).attr("total_price");
        var coupon_amount = $(this).attr("coupon_amount") || 0;

        var formatted_shipping_charges = parseInt(shipping_charges).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        var formatted_total_price = parseInt(total_price).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        var formatted_coupon_amount = parseInt(coupon_amount).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });

        $(".shipping_charges").html(formatted_shipping_charges);
        $(".couponAmount").html(formatted_coupon_amount);

        var grand_total = parseInt(total_price) + parseInt(shipping_charges) - parseInt(coupon_amount);
        var formatted_grand_total = grand_total.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        $(".grand_total").html(formatted_grand_total);
    });

});

function get_filter(class_name) {
    var filter = [];
    $("." + class_name + ":checked").each(function () {
        filter.push($(this).val());
    });
    return filter;
}
//show hide credit card
// const myCheckbox = document.getElementById('credit_card');
// const myDiv = document.getElementById('myDiv');

// myCheckbox.addEventListener('change', function() {
//   if(this.checked) {
//     myDiv.style.display = 'block';
//   } else {
//     myDiv.style.display = 'none';
//   }
// });


// var form = document.getElementById("myForm");
// var creditCard = document.getElementById("credit_card");
// var myDiv = document.getElementById("myDiv");

// creditCard.addEventListener("click", function() {
//     if (creditCard.checked) {
//         myDiv.style.display = "block";
//         var inputs = myDiv.getElementsByTagName("input");
//         for (var i = 0; i < inputs.length; i++) {
//             if (inputs[i].name === "ccd") {
//                 // Validate CCD format (3 digits)
//                 inputs[i].setAttribute("pattern", "[0-9]{3}");
//                 inputs[i].setAttribute("title", "CCD must be a 3-digit number");
//             } else if (inputs[i].name === "card_number") {
//                 // Validate card number format (16 digits)
//                 inputs[i].setAttribute("pattern", "[0-9]{16}");
//                 inputs[i].setAttribute("title", "Card number must be a 16-digit number");
//             } else if (inputs[i].name === "expriation_date") {
//                 // Validate expiration date format (MM/YY)
//                 inputs[i].setAttribute("pattern", "(0[1-9]|1[0-2])/[0-9]{2}");
//                 inputs[i].setAttribute("title", "Expiration date must be in the format MM/YY");
//             }
//             inputs[i].setAttribute("required", "");
//         }
//     } else {
//         myDiv.style.display = "none";
//         var inputs = myDiv.getElementsByTagName("input");
//         for (var i = 0; i < inputs.length; i++) {
//             inputs[i].removeAttribute("required");
//             inputs[i].removeAttribute("pattern");
//             inputs[i].removeAttribute("title");
//         }
//     }
// });

// form.addEventListener("submit", function(event) {
//     var inputs = myDiv.getElementsByTagName("input");
//     for (var i = 0; i < inputs.length; i++) {
//         if (!inputs[i].checkValidity()) {
//             event.preventDefault();
//             var error = document.createElement("div");
//             error.className = "error-message";
//             error.textContent = inputs[i].title;
//             inputs[i].parentNode.appendChild(error);
//         }
//     }
// });
// const paymentGateway = document.getElementsByName('payment_gateway');

//     paymentGateway.forEach(function(radio) {
//         radio.addEventListener('change', function() {
//             if (radio.value === 'Credit_Card') {
//                 document.getElementById('myDiv').style.display = 'block';
//                 document.getElementById('name').setAttribute('required', '');
//                 document.getElementById('ccd').setAttribute('required', '');
//                 document.getElementById('card_number').setAttribute('required', '');
//                 document.getElementById('expiration_date').setAttribute('required', '');
//             } else {
//                 document.getElementById('myDiv').style.display = 'none';
//                 document.getElementById('name').removeAttribute('required');
//                 document.getElementById('ccd').removeAttribute('required');
//                 document.getElementById('card_number').removeAttribute('required');
//                 document.getElementById('expiration_date').removeAttribute('required');
//             }
//         });
//     });

const paymentGateway = document.getElementsByName('payment_gateway');

paymentGateway.forEach(function(radio) {
  radio.addEventListener('change', function() {
    if (radio.value === 'Credit_Card') {
      document.getElementById('myDiv').style.display = 'block';
      document.getElementById('name').setAttribute('required', '');
      document.getElementById('ccd').setAttribute('required', '');
      document.getElementById('card_number').setAttribute('required', '');
      document.getElementById('expiration_date').setAttribute('required', '');

      // Validate CCD input
      document.getElementById('ccd').addEventListener('input', function() {
        let ccdValue = this.value;
        let ccdPattern = /^[0-9]{3}$/;
        if (ccdPattern.test(ccdValue)) {
          this.setCustomValidity('');
        } else {
          this.setCustomValidity('CCD không hợp lệ. Vui lòng nhập đúng 3 chữ số');
        }
      });

      // Validate Expiration Date input
      document.getElementById('expiration_date').addEventListener('input', function() {
        let expirationDateValue = this.value;
        let expirationDatePattern = /^(0[1-9]|1[0-2])\/([0-9]{4})$/;
        if (expirationDatePattern.test(expirationDateValue)) {
          this.setCustomValidity('');
        } else {
          this.setCustomValidity('Ngày hết hạn không hợp lệ. Vui lòng nhập đúng định dạng MM/YYYY');
        }
      });

    } else {
      document.getElementById('myDiv').style.display = 'none';
      document.getElementById('name').removeAttribute('required');
      document.getElementById('ccd').removeAttribute('required');
      document.getElementById('card_number').removeAttribute('required');
      document.getElementById('expiration_date').removeAttribute('required');
      document.getElementById('ccd').setCustomValidity('');
      document.getElementById('expiration_date').setCustomValidity('');
    }
  });
});
