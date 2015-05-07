/**
 * searchbox.js
 *
 * Handles toggling a searchbox for small screens.
 */
(function(){

    // get vars
    var searchEl = document.querySelector("#input");
    var labelEl = document.querySelector("#label");

    // register clicks and toggle classes
    labelEl.addEventListener("click",function(){
        searchEl.classList.toggle("focus");
        labelEl.classList.toggle("active");
    });

    // register clicks outisde search box, and toggle correct classes
    document.addEventListener("click",function(e){
        var clickedID = e.target.id;
        if (clickedID != "search-terms" && clickedID != "search-label" && clickedID != "search-icon") {
            if (searchEl.classList.contains("focus")) {
                searchEl.classList.remove("focus");
                labelEl.classList.remove("active");
            }
        }
    });
} )();
