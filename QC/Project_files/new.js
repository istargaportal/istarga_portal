let btn=document.querySelector("#moveBtn");
let input=document.querySelectorAll(".input");
let value=document.querySelectorAll(".value");
let labels=document.querySelectorAll(".labels")
let length=input.length;

window.onload=()=>{
    input.forEach(ele=>{
        ele.style.display="none";
    })
}

btn.addEventListener("click", ()=>{
 for(let i=0; i<length; i++){
     labels[i].style.marginTop="0"
     input[i].style.display="block"
     let newValue=value[i].textContent;
     labels[i].classList.remove("bmd-label-floating")
     input[i].value=newValue;

  }
})


