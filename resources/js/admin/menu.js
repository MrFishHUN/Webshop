const menus = document.querySelectorAll('.nav-button');

menus.forEach(menu => {
        console.log(menu.children[0])
        menu.children[1].style.display = 'none';
        menu.children[0].addEventListener('click',
            ()=>{
                if (menu.children[1].style.display === 'none') {
                    menu.children[1].style.display = 'block';
                    menu.children[0].classList.add('open');
                    menu.children[0].children[0].classList.add('bi-chevron-up');
                    menu.children[0].children[0].classList.remove('bi-chevron-down');
                } else {
                    menu.children[1].style.display = 'none';
                    menu.children[0].classList.remove('open');
                    menu.children[0].children[0].classList.remove('bi-chevron-up');
                    menu.children[0].children[0].classList.add('bi-chevron-down');
                }
            })
}
);
