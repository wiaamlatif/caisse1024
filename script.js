function sayBjr(){
  alert("Bjr les amis une nouvelle fois !");
}


const idProductEl = document.querySelectorAll(".idProduct");
const  qtyInputEl = document.querySelectorAll(".qtyInput");
const tdtotalItemEl = document.querySelectorAll(".tdtotalItem");
const tdPriceEl = document.querySelectorAll(".tdPrice");

const thtotalTicketEl = document.getElementById("thtotalTicket");

//const counterEl = document.querySelectorAll(".counter");



//=========(C:\caisse1023\include\front\counter.php)=========//
//=======(counter.php)=======//

//Ajouter
const ajouterEl = document.querySelectorAll(".ajouter");

for (let i = 0; i < ajouterEl.length; i++) {

    ajouterEl[i].addEventListener('click',()=>{
    ajouterEl[i].click();  
  });      
}

//btnPlus
const btnPlusEl = document.querySelectorAll(".btnPlus");

for (let i = 0; i < btnPlusEl.length; i++) {

  btnPlusEl[i].addEventListener('click',()=>{
    
    qtyInputEl[i].value= parseInt(qtyInputEl[i].value)+1;
    tdtotalItemEl[i].innerText =qtyInputEl[i].value*parseInt(tdPriceEl[i].innerText);
  
    thtotalTicketEl.innerText=totalTicket();
  })
  
}

//btnMinus
const btnMinusEl = document.querySelectorAll(".btnMinus");
for (let i = 0; i < btnMinusEl.length; i++) {

  btnMinusEl[i].addEventListener('click',()=>{

    if(parseInt(qtyInputEl[i].value)> 0 ){
      qtyInputEl[i].value= parseInt(qtyInputEl[i].value)-1;  
      tdtotalItemEl[i].innerText =qtyInputEl[i].value*parseInt(tdPriceEl[i].innerText);
    }  

    thtotalTicketEl.innerText=totalTicket();    
  })    
}

function totalTicket(){
  let total=0;
  for (let i = 0; i < tdtotalItemEl.length; i++) {   
   total += parseInt(tdtotalItemEl[i].innerText);
  }
  return total;
}

//x_z/liste.php


//.getElementById("OkResetDiv").style.display = "none";

function xz_Periode(){

 document.getElementById("btnXzPeriode").click(); 

}

function xz_Uact(){
    
 document.getElementById("btnXzUact").click();
  
 }

 function xz_Etat(){
  
  document.getElementById("btnXz").click();
   
  }

// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}





//console.log();
