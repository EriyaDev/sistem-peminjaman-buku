const hamburger = document.getElementById('hamburger');
const sidebar = document.querySelector('aside');
const nav = document.querySelector('nav');
const main = document.querySelector('main');

function toggleSidebar(){
    sidebar.classList.toggle('hide');
    nav.classList.toggle('full');
    main.classList.toggle('full');
}

if(window.innerWidth < 1280){
    sidebar.classList.add('hide');
    nav.classList.add('full');
    main.classList.add('full');
}else{
    sidebar.classList.remove('hide');
    nav.classList.remove('full');
    main.classList.remove('full');
}
