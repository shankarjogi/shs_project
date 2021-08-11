// darkmode

$(document).ready(function() {
    $(".light_mode").click(function() {
        $("body").removeClass("dark-mode");
    });
    $(".dark_mode").click(function() {
        $("body").addClass("dark-mode");
    });
});
$(".changeView").click(function() {
    $(".changeView").removeClass("active");
    $(this).addClass("active");
});
$(".changeView2").click(function() {
    $(".changeView2").removeClass("active");
    $(this).addClass("active");
});
$(".fx_account_name").click(function() {
    $(".fx_account_name").removeClass("active");
    $(this).addClass("active");
});



// input tab
$(document).ready(function() {
    $('input[type="radio"]').click(function() {
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});

// otp
$('.otp input').on('keyup change', function() {
    $t = $(this);
    if ($t.val().length > 0) {
        $t.next().focus();
    }
});

// show hide
$(".login_btn").click(function() {
    $(".fx_form_tab").toggle();
});


// sidebar
$(".sidebar-dropdown > a").click(function() {
    $(".sidebar-submenu").slideUp(200);
    if (
        $(this)
        .parent()
        .hasClass("active")
    ) {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
            .parent()
            .removeClass("active");
    } else {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
            .next(".sidebar-submenu")
            .slideDown(200);
        $(this)
            .parent()
            .addClass("active");
    }
});

$(".menubar").click(function() {
    $(".page-wrapper").toggleClass("toggled");
});

$(".menubar").click(function() {
    $("body").toggleClass("side_bar");
});

$(window).on('load', function() {
    $('#status').fadeOut();
    $('#preloader').delay(350).fadeOut('slow');
});


// mobile menu
$(".menubar2").click(function() {
    $(".sidebar-wrapper").toggle();
});


$(".image-box").click(function(event) {
    var previewImg = $(this).children("img");

    $(this)
        .siblings()
        .children("input")
        .trigger("click");

    $(this)
        .siblings()
        .children("input")
        .change(function() {
            var reader = new FileReader();

            reader.onload = function(e) {
                var urll = e.target.result;
                $(previewImg).attr("src", urll);
                previewImg.parent().css("background", "transparent");
                previewImg.show();
                previewImg.siblings("p").hide();
            };
            reader.readAsDataURL(this.files[0]);
        });
});

// money page payment
$(".mode-list").click(function() {
    $(".list-view").fadeIn("fast");
    $(".grid-view").fadeOut("fast");
});

$(".mode-grid").click(function() {
    $(".grid-view").fadeIn("fast");
    $(".list-view").fadeOut("fast");
});

$(".money_list").click(function() {
    $(".list_view").fadeIn("fast");
    $(".grid_view").fadeOut("fast");
});

$(".money_grid").click(function() {
    $(".grid_view").fadeIn("fast");
    $(".list_view").fadeOut("fast");
});


$(".gridView").click(function() {
    $(".gridView").removeClass("active");
    $(this).addClass("active");
});


$("#skrill, #skrill2").click(function() {
    $(".default_img, .bank_wire_img").css("display", "none")
    $(".fx_payment_details").css("display", "block")
        // $("#").show();   
});

$("#bank, #bank2").click(function() {
    $(".bank_wire_img").css("display", "block")
    $(".default_img, .fx_payment_details").css("display", "none")
        // $("#").show();   
});

$("#dropdownMenuButton").click(function() {
    $(".bank_wire_img").css("display", "block")
    $(".default_img").css("display", "none")
        // $("#").show();   
});

$("#dropdownMenuButton2").click(function() {
    $(".default_img").css("display", "block")
    $(".bank_wire_img").css("display", "none")
        // $("#").show();   
});


$("#Transaction-tab").click(function() {
    $(".fx_tab_money").addClass("tab-width_inner");
});

$("#Deposit-tab, #Withdrawal-tab, #Internal-tab").click(function() {
    $(".fx_tab_money").removeClass("tab-width_inner");
});

// select all
$('#select-all').click(function(event) {
    if (this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;
        });
    }
});


// page load
let current_menu = localStorage.getItem('current-menu');
if (current_menu != '') {
    if (current_menu == 'horizontal') {
        $(".fx_vertical_menu").css("display", "none");
        $(".fx_horizontal_menu").css("display", "block");
        $("body").addClass("horizontal_menu");
    } else {
        $(".fx_horizontal_menu").css("display", "none");
        $(".fx_vertical_menu").css("display", "block");
        $("body").removeClass("horizontal_menu");
    }
} else {
    localStorage.setItem("current-menu", "horizontal");
}


$(".vertical").click(function() {
    localStorage.setItem("current-menu", "vertical");
    $(".fx_horizontal_menu").css("display", "none");
    $(".fx_vertical_menu").css("display", "block");
    $("body").removeClass("horizontal_menu");
    // $("#").show();   
});

$(".horizontal").click(function() {
    localStorage.setItem("current-menu", "horizontal");
    $(".fx_vertical_menu").css("display", "none");
    $(".fx_horizontal_menu").css("display", "block");
    $("body").addClass("horizontal_menu");
    // $("#").show();   
});


// Vanilla Javascript
var input = document.querySelector("#phone");
window.intlTelInput(input,({
  // options here
}));