

new Vue({

    el: '#app',
    name: 'app',
    data() {
        return {
            options: {
                controlArrows: true,
                // scrollBar: true,
                // menu: '#menu',
                //anchors: ['page1', 'page2', 'page3'],


            },
        }
    }

});

//creating the section div
var section = document.createElement('div');
section.className = 'section';

//adding section
document.querySelector('#fullpage').appendChild(section);

//vm.$refs.fullpage.build();
this.$refs.fullpage.build();

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
cont.addEventListener('click', closeMenu);


