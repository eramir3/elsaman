$(".lang-dropdown__selected").click(function() {
    $(".lang-dropdown__items").toggle();
});
       
// Accion seleccion dropdown
// $(".lang-dropdown-web .lang-dropdown__item a").click(function() {
//     var value = $(this).html();

//     // Actualiza el dropdown al momento de ser seleccionado
//     // $(".lang-dropdown-web .lang-dropdown__selected span").html(value);
//     // $(".lang-dropdown-web .lang-dropdown__items").hide();

//     // Obtiene el resultado
//     // $("#result").html("Selected value is: " + getSelectedValue("lang-dropdown-menu"));
// });

$(".lang-dropdown-mobile .lang-dropdown__item a").click(function() {
    let languageName = this.innerText;
    let text = $(this).html();
    text = text.replace(languageName, '');

    // Actualiza el dropdown
    // $(".lang-dropdown-mobile .lang-dropdown__selected span").html(text);
    // $(".lang-dropdown-mobile .lang-dropdown__items").hide();

    // Obtiene el resultado
    // $("#result").html("Selected value is: " + getSelectedValue("lang-menu"));
});

$(document).bind('click', function(element) {
    let clicked = $(element.target);
    if (! clicked.parents().hasClass("lang-dropdown"))
        $(".lang-dropdown__items").hide();
});
            
function getSelectedValue(id) {
    return $("#" + id).find(".lang-dropdown__selected span.lang-dropdown__value").html();
}