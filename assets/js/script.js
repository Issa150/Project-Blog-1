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