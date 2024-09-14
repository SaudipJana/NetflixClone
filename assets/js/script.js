function volumeToggle(button){
    var muted = $(".previewVideo").prop("muted");
    $(".previewVideo").prop("muted", !muted)

    $(button).find("i").toggleClass("fa-volume-xmark");
    $(button).find("i").toggleClass("fa-volume-high");
}

function previewEnded(){
    $(".previewVideo").toggle();
    $(".previewImage").toggle();
}






// entitiesDivs.forEach(entitiesDiv => {
//     // Adding a wheel event listener for horizontal scroll with mouse scroll
//     entitiesDiv.addEventListener('wheel', function(event) {
//         event.preventDefault(); // Prevent vertical scroll
//         entitiesDiv.scrollLeft += event.deltaY * 2 ; // Apply horizontal scroll
//     });
// });



const entitiesDivs = document.querySelectorAll('.scroll');

entitiesDivs.forEach(entitiesDiv => {
    entitiesDiv.addEventListener('wheel', function(event) {

        start = entitiesDiv.scrollLeft === 0;
        end = entitiesDiv.scrollLeft >= entitiesDiv.scrollWidth - entitiesDiv.clientWidth;
        
        if (start && event.deltaY < 0) {
            entitiesDiv.scrollTop += event.deltaY;
        }

        else if (end && event.deltaY > 0) {
            entitiesDiv.scrollTop += event.deltaY;
        } else {
            event.preventDefault();
            entitiesDiv.scrollLeft += event.deltaY * 2; 
        }
    });
});