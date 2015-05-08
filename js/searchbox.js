/**
 * searchbox.js
 *
 * Handles toggling a searchbox for small screens.
 */
( function() {

    // get vars
    var searchEl = document.querySelector("#input-handheld");
    var labelEl = document.querySelector("#label-handheld");

    // register clicks and toggle classes
    labelEl.addEventListener("click",function(){
        searchEl.classList.toggle("focus");
        labelEl.classList.toggle("active");
    });

    // register clicks outisde search box, and toggle correct classes
    document.addEventListener("click",function(e){
        var clickedID = e.target.id;
        if (clickedID != "search-terms-handheld" &&
            clickedID != "search-label-handheld" &&
            clickedID != "search-icon-handheld") {
                if (searchEl.classList.contains("focus")) {
                    searchEl.classList.remove("focus");
                    labelEl.classList.remove("active");
                }
        }
    });
} )();
