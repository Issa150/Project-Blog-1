// password show functionality

const passwordInputs = document.querySelectorAll('.single_wrap_input input[type="password"]');
const showPassBtn = document.querySelectorAll('.single_wrap_input span.showPassword');

showPassBtn.forEach((showBtn, index) => {
    showBtn.onclick = () => {
        // choosing the Other collections item based on the index of clicked item!!
        const passwordInput = passwordInputs[index];
        if (passwordInput.type == "password") {
            passwordInput.type = "text";
            showBtn.innerHTML = `<i class="fa-solid fa-eye-slash"></i>`;
        } else {
            passwordInput.type = "password";
            showBtn.innerHTML = `<i class="fa-solid fa-eye"></i>`;
        }
    };
});
///////////////////////////////////////////////
//            SWIPER SLIDER                  //
const progressCircle = document.querySelector(".autoplay-progress svg");
const progressContent = document.querySelector(".autoplay-progress span");
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    // autoplay: {
    //     delay: 6000,
    //     disableOnInteraction: false,
    // },
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    on: {
        autoplayTimeLeft(s, time, progress) {
            progressCircle.style.setProperty("--progress", 1 - progress);
            progressContent.textContent = `${Math.ceil(time / 1000)}s`;
        }
    }
});

/////////////////////////////////////////////////
//            MENU TOGGLE RESPONSIVE           //
const ul = document.querySelector('nav .container ul');
hamburger_menu.onclick = () => {
    ul.classList.toggle("active")
    // menuUls.forEach(ul => {
    // })
}
////////////////////////////////////////////////
//          Active Menu detection //
let links = document.querySelectorAll("nav ul:first-child a"); 
let pageActive = window.location.href;
// Stockage localisation dans une variable
for (let i = 0; i < links.length; i++) {
    // On boucle sur le tableau "links" qui contient les "a"    
    if (pageActive.includes(links[i].href)) {        // On vérifie si la localisation de la page contient le lien sur lequel on clique // si true        
        links[i].classList.add("active"); // Ajout de la classe "actuel"    
    }
}

////////////////////////////////////////////////
//         Form handling

// const  btnsCloseDialog = document.querySelectorAll('.btn-modal')
// btnsCloseDialog.forEach(btn =>{

//     btn.onclick = ()=>{
//         myModal.showModal();
//         document.body.style.overflow = 'hidden';
//     }
// })
// cancelModal.onclick = ()=>{
//     myModal.close();
//     document.body.style.overflow = 'auto';

// }
const  btnsOpenDialogs = document.querySelectorAll('.btn-modal')

btnsOpenDialogs.forEach(btn =>{
    btn.onclick = ()=>{
        const modal = btn.nextElementSibling
        modal.showModal()
        document.body.style.overflow = 'hidden'
    }
})