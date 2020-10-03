require('./bootstrap');

$(function() {
    let darkSwitch = $("#darkSwitch")
    $(darkSwitch).on("click", function () {
        if ($("body").hasClass("bg-white")) {
            $("body").removeClass("bg-white");
            $("body").addClass("bg-dark");
        }
        else {
            $("body").removeClass("bg-dark");
            $("body").addClass("bg-white");
        }
        $("body").toggleClass("text-white");
    });
});

