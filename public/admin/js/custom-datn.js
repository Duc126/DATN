$(document).ready(function () {
    //call datatable
    $("#section").DataTable();

    //remove active side-bar
    $(".nav-item").removeClass("active");
    $(".nav-link").removeClass("active");

    //check password
    $("#current_password").keyup(function () {
        var current_password = $("#current_password").val();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/check-admin-password",
            data: {
                current_password: current_password,
            },
            success: function (resp) {
                if (resp == "false") {
                    $("#check_password").html(
                        "<font color='red'>Mật Khẩu Bạn Nhập Không Đúng!</font>"
                    );
                } else if (resp == "true") {
                    $("#check_password").html(
                        "<font color='green'>Mật Khẩu Chính Xác!</font>"
                    );
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });
});

//update status admin

$(document).on("click", ".updateAdminStatus", function () {
    var status = $(this).children("i").attr("status");
    var admin_id = $(this).attr("admin_id");
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        url: "/admin/update-status-admin",
        data: {
            status: status,
            admin_id: admin_id,
        },
        success: function (resp) {
            if (resp["status"] == 0) {
                $("#admin-" + admin_id).html(
                    "<i style='font-size: 25px' class='mdi mdi mdi-bookmark-outline' status='Inactive'></i>"
                );
            } else if (resp["status"] == 1) {
                $("#admin-" + admin_id).html(
                    "<i style='font-size: 25px' class='mdi mdi mdi-bookmark-check' status='Active'></i>"
                );
            }
        },
        error: function () {
            alert("Error");
        },
    });
});
//update status section
$(document).on("click", ".updateSection", function () {
    var status = $(this).children("i").attr("status");
    var section_id = $(this).attr("section_id");
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        url: "/admin/update-status-section",
        data: {
            status: status,
            section_id: section_id,
        },
        success: function (resp) {
            if (resp["status"] == 0) {
                $("#section-" + section_id).html(
                    "<i style='font-size: 25px' class='mdi mdi mdi-bookmark-outline' status='Inactive'></i>"
                );
            } else if (resp["status"] == 1) {
                $("#section-" + section_id).html(
                    "<i style='font-size: 25px' class='mdi mdi mdi-bookmark-check' status='Active'></i>"
                );
            }
        },
        error: function () {
            alert("Error");
        },
    });
});
//update status category
$(document).on("click", ".updateCategory", function () {
    var status = $(this).children("i").attr("status");
    var category_id = $(this).attr("category_id");
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        url: "/admin/update-category-status",
        data: {
            status: status,
            category_id: category_id,
        },
        success: function (resp) {
            if (resp["status"] == 0) {
                $("#category-" + category_id).html(
                    "<i style='font-size: 25px' class='mdi mdi mdi-bookmark-outline' status='Inactive'></i>"
                );
            } else if (resp["status"] == 1) {
                $("#category-" + category_id).html(
                    "<i style='font-size: 25px' class='mdi mdi mdi-bookmark-check' status='Active'></i>"
                );
            }
        },
        error: function () {
            alert("Error");
        },
    });
});

$(".confirm-section").click(function () {
    var module = $(this).attr("module");
    var moduleid = $(this).attr("moduleid");
    Swal.fire({
        title: "Bạn có chắc không?",
        text: "Bạn sẽ không thể hoàn nguyên điều này!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Đã xóa!", "Sản Phẩm Bạn Chọn Đã Được Xóa.", "success");
            window.location = "/admin/delete-" + module + "/" + moduleid;
        }
    });
});

$("#section_id").change(function () {
    var section_id = $(this).val();
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "get",
        url: "/admin/append-categories",
        data: { section_id: section_id },
        success: function (resp) {
            $("#appendCategoriesLevel").html(resp);
        },
        error: function () {
            alert("Error");
        },
    });
});

//confirm delete category
$(".confirm-category").click(function () {
    var module = $(this).attr("module");
    var moduleid = $(this).attr("moduleid");
    Swal.fire({
        title: "Bạn có chắc không?",
        text: "Bạn sẽ không thể hoàn nguyên điều này!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Đã xóa!", "Sản Phẩm Bạn Chọn Đã Được Xóa.", "success");
            window.location = "/admin/delete-" + module + "/" + moduleid;
        }
    });
});

//brands
$(document).on("click", ".updateBrand", function () {
    var status = $(this).children("i").attr("status");
    var brand_id = $(this).attr("brand_id");
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        url: "/admin/update-status-brand",
        data: {
            status: status,
            brand_id: brand_id,
        },
        success: function (resp) {
            if (resp["status"] == 0) {
                $("#brand-" + brand_id).html(
                    "<i style='font-size: 25px' class='mdi mdi mdi-bookmark-outline' status='Inactive'></i>"
                );
            } else if (resp["status"] == 1) {
                $("#brand-" + brand_id).html(
                    "<i style='font-size: 25px' class='mdi mdi mdi-bookmark-check' status='Active'></i>"
                );
            }
        },
        error: function () {
            alert("Error");
        },
    });
});

$(".confirm-brand").click(function () {
    var module = $(this).attr("module");
    var moduleid = $(this).attr("moduleid");
    Swal.fire({
        title: "Bạn có chắc không?",
        text: "Bạn sẽ không thể hoàn nguyên điều này!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Đã xóa!", "Thương Hiệu Bạn Chọn Đã Được Xóa.", "success");
            window.location = "/admin/delete-" + module + "/" + moduleid;
        }
    });
});

//products
$(document).on("click", ".updateProduct", function () {
    var status = $(this).children("i").attr("status");
    var product_id = $(this).attr("product_id");
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        url: "/admin/update-status-product",
        data: {
            status: status,
            product_id: product_id,
        },
        success: function (resp) {
            if (resp["status"] == 0) {
                $("#product-" + product_id).html(
                    "<i style='font-size: 25px' class='mdi mdi mdi-bookmark-outline' status='Inactive'></i>"
                );
            } else if (resp["status"] == 1) {
                $("#product-" + product_id).html(
                    "<i style='font-size: 25px' class='mdi mdi mdi-bookmark-check' status='Active'></i>"
                );
            }
        },
        error: function () {
            alert("Error");
        },
    });
});

$(".confirm-product").click(function () {
    var module = $(this).attr("module");
    var moduleid = $(this).attr("moduleid");
    Swal.fire({
        title: "Bạn có chắc không?",
        text: "Bạn sẽ không thể hoàn nguyên điều này!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Đã xóa!", "Thương Hiệu Bạn Chọn Đã Được Xóa.", "success");
            window.location = "/admin/delete-" + module + "/" + moduleid;
        }
    });
});