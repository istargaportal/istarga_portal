let dynamicTable=null;
let tempTableDiv=document.getElementById("tempTableDiv");
window.onload=()=>{
  dynamicTable=  createTabel();
  tempTableDiv.innerHTML=dynamicTable;
}

let btn=document.getElementById("excelButton");
let newTable=document.getElementById("tempTableDiv");
btn.addEventListener("click" , ()=>{
  TableToExcel.convert(newTable);
})

function myFunction(){
  window.print();
}

let PrintButton=document.getElementById("PrintButton");
let originalContents = document.body.innerHTML;


PrintButton.addEventListener("click", ()=>{
  let printContents=newTable.innerHTML;
  document.body.innerHTML=printContents;
  window.print();
  document.body.innerHTML=originalContents;
})

function createTabel(){
  let output = $('#datatable_tbl').html();
  return output;
}