let formBtn = document.getElementById('form__btn')
let formContainer = document.getElementById('form__container')
let status = true
formBtn.addEventListener(
    'click',
    () => {
        if (status){
            formContainer.style.transform = "translateY(0)"
            formBtn.innerText = "CLOSE"
        } else {
            formContainer.style.transform = "translateY(-100%)"
            formBtn.innerText = "ADD"
        }
        status = !status
    }
)