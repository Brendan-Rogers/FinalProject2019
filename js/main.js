

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




