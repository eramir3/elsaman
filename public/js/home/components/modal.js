function fruitImageClick(fruit) {

    // let modal = document.getElementById("myModal");
    let modal = document.getElementById(fruit);

    let index = 0;
    switch(fruit) {
        case 'pineapple':
            index = 0;
            break;
        case 'passion-fruit':
            index = 1;
            break;
        case 'strawberry':
            index = 2;
            break;
        case 'mango':
            index = 3;
            break;
        case 'tamarillo':
            index = 4;
            break;
        case 'guava':
            index = 5;
            break;
        case 'lulo':
            index = 6;
            break;
        case 'tangerine':
            index = 7;
            break;
        case 'blackberry':
            index = 8;
            break;
        case 'soursop':
            index = 9;
            break;
        case 'curuba':
            index = 10;
            break;
        case 'feijoa':
            index = 11;
            break;
    }

    // Get the <span> element that closes the modal
    // original -  es el que se debe usar cuando haya una db
    //let span = document.getElementsByClassName("modal-content__close")[0];

    // debe ser borrado junto con el switch cuando haya db
    let span = document.getElementsByClassName("modal-content__close")[index];

    modal.style.display = "block";

    

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

$(window).on('load', function() {
    const url = window.location.href;
    const fruit = url.split('#')[1];
    fruitImageClick(fruit)
});