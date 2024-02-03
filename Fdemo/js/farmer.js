const regBtn = document.querySelector("#register-btn");
const allForm = document.querySelector(".farm-product-form");
const cancelBnt = document.querySelector("form .cancel-icon");

cancelBnt.addEventListener("click", ()=>{
    allForm.classList.toggle("active");
});

regBtn.addEventListener("click", ()=>{
    allForm.classList.toggle("active");
});