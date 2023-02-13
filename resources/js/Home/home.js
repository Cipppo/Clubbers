let togglebutton = document.querySelector('.toggle-btn');

const navLinks = document.querySelector('.nav-links');

function onToggleMenu(){
    navLinks.classList.toggle('top-[110%]');
}

togglebutton.addEventListener('click', function(){
    onToggleMenu();
    togglebutton.name = togglebutton.name === 'menu' ? 'close' : 'menu';
})