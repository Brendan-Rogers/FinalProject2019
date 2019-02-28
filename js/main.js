//VARIABLE STACK

let menuBut = document.querySelector('.menuButton'),
    closeBut = document.querySelector('.closeButton'),
    nav = document.querySelector('.navArea'),
    body = document.querySelector('body'),
    cont = document.querySelector('main');


function openMenu(){
    nav.classList.remove('hidden');
    body.classList.add('lock');
};
    

function closeMenu(){
    nav.classList.add('hidden');
    body.classList.remove('lock');
};



//EVENT LISTENER

menuBut.addEventListener('click', openMenu);
closeBut.addEventListener('click', closeMenu);
cont.addEventListener('click', closeMenu)