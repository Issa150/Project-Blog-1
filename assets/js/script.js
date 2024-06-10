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
//            SWIPER SLIDER                  //
/////////////////////////////////////////////////
//            MENU TOGGLE RESPONSIVE           //
const ul = document.querySelector('nav .container ul');
hamburger_menu.onclick = () => {
    ul.classList.toggle("active")
    // menuUls.forEach(ul => {
    // })
}
////////////////////////////////////////////////
//          tinymce rich text editor //
tinymce.init({
    container: document.body,
    selector: '#mytextarea',
    height: 250,
    menubar: false,
    plugins: 'formatselect',
    toolbar: 'undo redo | blocks | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help'
});

////////////////////////////////////////////////
// //          Active Menu detection //
// let links = document.querySelectorAll("nav ul:first-child a");
// let pageActive = window.location.href;
// // Stockage localisation dans une variable
// for (let i = 0; i < links.length; i++) {
//     // On boucle sur le tableau "links" qui contient les "a"    
//     if (pageActive.includes(links[i].href)) {        // On vérifie si la localisation de la page contient le lien sur lequel on clique // si true        
//         links[i].classList.add("active"); // Ajout de la classe "actuel"    
//     }
// }

////////////////////////////////////////////////
//         dialog /modal/Form handling/
const modal = document.getElementById("modal");
// const modalContent = document.getElementById("modal-content");
const closeModal = document.getElementById("cancelModal");
const openModalBtn = document.getElementById("open-modal");

openModalBtn.addEventListener("click", () => {
    modal.style.display = "block";
    document.body.style.overflow = "hidden";
});

closeModal.addEventListener("click", () => {
    modal.style.display = "none";
    document.body.style.overflow = "auto";
});

document.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.style.display = "none";
        document.body.style.overflow = "auto";
    }
});
//////////////////////
// const openModalBtnLink = document.querySelectorAll(".btn-link");
// openModalBtnLink.forEach(btn=>{
//     btn.addEventListener("click", function(event) {
//         event.preventDefault();
//     })
// })

////
// const openModalBtnLink = document.querySelectorAll(".btn-link");
// openModalBtnLink.forEach(btn => {
//     btn.addEventListener("click", function (event) {
//         event.preventDefault();
//         const url = this.getAttribute("href");
//         history.pushState({}, "", url);
//         // Now we can open our modal
//         modal.style.display = "block";
//         document.body.style.overflow = "hidden";
//     })
// })