// Hide or show mobile nav items
function openNav() {

    let mobileNavbarHeight = "11.5rem";

    if (document.getElementById("mobile-nav__menu").style.height == mobileNavbarHeight) {
        document.getElementById("mobile-nav__menu").style.height = "0";
        document.getElementById("slidable").style.marginTop= "0";
    }
    else {
        document.getElementById("mobile-nav__menu").style.height = mobileNavbarHeight;
        document.getElementById("slidable").style.marginTop = mobileNavbarHeight;
    }
}





























// // Language menu dropdown
// $(".lang-dropdown dt a").click(function() {
//     $(".lang-dropdown dd ul").toggle();
// });

// $(".lang-dropdown-web dd ul li a").click(function() {
//     var text = $(this).html();
//     $(".lang-dropdown dt a span").html(text);
//     $(".lang-dropdown dd ul").hide();
//     // $("#result").html("Selected value is: " + getSelectedValue("lang-menu"));
// });
            
// $(".lang-dropdown-mobile dd ul li a").click(function() {
//     let languageName = this.innerText;
//     let text = $(this).html();
//     text = text.replace(languageName, '');
//     $(".lang-dropdown dt a span").html(text);
//     $(".lang-dropdown dd ul").hide();
//     // $("#result").html("Selected value is: " + getSelectedValue("lang-menu"));
// });
            
// function getSelectedValue(id) {
//     return $("#" + id).find("dt a span.value").html();
// }

// $(document).bind('click', function(e) {
//     let $clicked = $(e.target);
//     if (! $clicked.parents().hasClass("lang-dropdown"))
//         $(".lang-dropdown dd ul").hide();
// });


// // Hide or show mobile nav items
// function hideMobileNavItems() {
//     var x = document.getElementById("mobile-nav__items--container");
//     if (x.style.display === "block") {
//         x.style.display = "none";
//     } 
//     else {
//         x.style.display = "block";
//     }
// }


