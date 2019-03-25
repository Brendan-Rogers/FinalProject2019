// JavaScript Document
(() => {

    //VARIABLE STACK
    let orgPosterImg = document.querySelectorAll('.orgPosterImg'),
        lightbox = document.querySelector('.lightbox'),
        close = document.querySelector('.closeLightbox'),
        body = document.querySelector('body'),
        lbImg = document.querySelector('.lbImg');


    //FUNCTIONS
    function showLightbox(poster) {
        console.log(poster.src);

    }

    function closeLightbox() {
        lightbox.classList.remove('showLightbox');
        body.classList.remove('scrollStop');
    }

    
    let posters = [];
    orgPosterImg.forEach(function(poster) {
        posters.push(poster);
    });

    for (var i = 0; i < posters.length; i++) {
        (function(index) {
             posters[index].addEventListener("click", function() {
                // console.log(posters[index]);
                lightbox.classList.add('showLightbox');
                body.classList.add('scrollStop');
                lbImg.src = posters[index].src;
              })
        })(i);
     }


    //EVENT HANDLING
    close.addEventListener('click', closeLightbox);
    document.addEventListener("keyup", function(event) {
        if (event.code == 'Escape') {
            closeLightbox();
        }
    });



})();
