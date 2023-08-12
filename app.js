const newLocal = document.querySelector('.header .nav .nav-list .hamburger');
const mobile_menue=document.querySelector('.header .nav .nav-list ul');
const menue_item=document.querySelectorAll('.header .nav .nav-list ul li a');
const header=document.querySelector('header.container');
const showFormButton = document.getElementById("showFormButton");
const formContainer = document.getElementById("formContainer");


hamburger.addEventListner('click',()=>{
   hamburger.classList.toggle('active');
   mobile_menue.classList.toggle('active');


});

document.addEventListner('scroll',()=>{
    var scroll_position=window.scrollY;
    if (scroll_position>250) {
        header.style.backgroundColor='#29323c';
    }
    else{
        header.style.backgroundColor='transparent';
    }
});

menue_item.forEach((item)=>{
    item.addEventListener('click',()=>{
        hamburger.classList.toggle('active');
        mobile_menue.classList.toggle('active');
    });
});

showFormButton.addEventListener("click", () => {
    formContainer.classList.remove("hidden");
    showFormButton.style.display = "none";
});


