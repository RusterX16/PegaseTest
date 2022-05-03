$(document).ready(function() {
    if($(window).width() <= 550) {
        $("#burger").addClass("visible");
    } else {
        $("#burger").addClass("hidden");
    }

    $(".menu-element")
        .hover(function() {
            let parent = $(this).parent().parent().parent().parent();

            switch(parent.attr("id")) {
                case "vertical-menu":
                    $(this)
                        .css("backgroundColor", "rgba(127, 92, 199, 1)");
                    break;
                case "horizontal-menu":
                    $(this)
                        .css("backgroundColor", "rgba(80, 129, 217, 1)");
                    break;
                case "admin-vertical-menu":
                    $(this)
                        .css("backgroundColor", "rgba(235, 172, 183, 1)");
                    break;
                case "admin-horizontal-menu":
                    $(this)
                        .css("backgroundColor", "rgba(107, 235, 192, 1)");
                    break;
            }
            $(this)
                .css("transitionDuration", ".2s");
    }).mouseleave(function() {
        $(this)
            .css("backgroundColor", "transparent")
            .css("transitionDuration", ".2s");
    });
});

window.onload = function() {
    initDate();
}

window.onresize = function() {
    const burger = $("#burger");

    if($(window).width() <= 550) {
        burger.removeClass("hidden");
        burger.addClass("visible");
    } else {
        burger.removeClass("visible");
        burger.addClass("hidden");
    }
};

function toggle() {
    const menu = document.getElementById("vertical-menu");
    const list = menu.classList;

    const admin = document.getElementById("admin-vertical-menu");
    const list2 = admin.classList;

    if(list.contains("open")) {
        closeMenu(list, menu.style);
        closeMenu(list2, admin.style);
        list2.remove("scope");
        list2.add("open");
    } else if(list.contains("closed")) {
        openMenu(list, menu.style);
        openMenu(list2, admin.style);
    }
    if(list2.contains("scoped")) {
        closeMenu(list2, admin.style);
    }
}

function toggleAdminMenu() {
    const burger = document.getElementById("burger");
    const list = burger.classList;

    if(list.contains("hidden")) {
        toggleHorizontalAdminMenu();
    } else if(list.contains("visible")) {
        toggleVerticalAdminMenu();
    }
}

function toggleHorizontalAdminMenu() {
    const menu = document.getElementById("admin-horizontal-menu");
    const list = menu.classList;

    if(list.contains("closed")) {
        list.remove("closed");
        list.add("open");
        menu.style.top = "64px";
        menu.style.transitionDuration = ".5s";
    } else if(list.contains("open")) {
        list.remove("open");
        list.add("closed");
        menu.style.top = "-192px";
        menu.style.transitionDuration = ".5s";
    }
}

function toggleVerticalAdminMenu() {
    const menu = document.getElementById("admin-vertical-menu");
    const list = menu.classList;

    if(list.contains("scope")) {
        openMenu(list, menu.style);
        list.remove("scope");
    } else if(list.contains("open")) {
        list.remove("open");
        list.add("scope");
        menu.style.right = "128px";
        menu.style.transitionDuration = ".5s";
    }
}

function openMenu(list, style) {
    list.remove("closed");
    list.add("open");
    style.right = "0px";
    style.transitionDuration = ".5s";
}

function closeMenu(list, style) {
    list.remove("open");
    list.add("closed");
    style.right = "-128px";
    style.transitionDuration = ".5s";
}

function initDate() {
    const today = new Date();
    const ss = String(today.getSeconds()).padStart(2, "0");
    const mm = String(today.getMinutes()).padStart(2, "0");
    const HH = String(today.getHours()).padStart(2, "0");
    const dd = String(today.getDate()).padStart(2, "0");
    const MM = String(today.getMonth() + 1).padStart(2, "0");
    const yyyy = String(today.getFullYear());
    $("#timeslot").attr("min", yyyy + "-" + MM + "-" + dd + "T" + HH + ":" + mm);
    $("#reminder").attr("min", yyyy + "-" + MM + "-" + dd);
}