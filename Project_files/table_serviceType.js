let deleteModal = document.querySelector(".delete-modal #exampleModal")
let deleteModalOkBtn = document.querySelector(".delete-modal #modal-ok-btn")
let deleteModalModalLabel = document.querySelector(".delete-modal #exampleModalLabel")
let deleteModalLaunchButton = document.querySelector(".delete-modal .launch")
let deleteModalCloseButton = document.querySelector(".delete-modal .close")

const onSave = (id, action, value) => {
  if(value.trim() == "")
  {
    alert("Please enter service type!");
    $('#'+id+'a').focus();
    return;
  }
  obj = { "id": id, "action": action, "value": value };
  fetch('./API/modifyServiceType.php', {
    method: 'post',
    body: JSON.stringify(obj)
  }).then(response => response.text())
    .then(data => {
      if(data == "updated")
      {
        alert('Service Type updated Successfully');
        popuTable();
      }
      else if(data == "already")
      {
        alert('Service Type already exists');
      }
      else
      {
        alert('Error occurred');
      }
    }).catch(err => {
    //console.log(err);
    return err;
  })
}

const onEdit = (id, action) => {
  //console.log(id);
  let elem = document.getElementById(id);
  //console.log(elem.textContent);
  let edit = document.getElementById(id+"c");
  //console.log(elem.textContent);
  let x = document.createElement("INPUT");
  //let br = document.createElement("br")
  x.setAttribute("type", "text");
  x.setAttribute("value",elem.textContent);
  x.setAttribute("id",id+"a")
  x.setAttribute("required","");
  x.setAttribute("class","form-control focus");
  x.style.maxWidth="80%"
  elem.innerHTML="";
  elem.appendChild(x).focus()
  x.setSelectionRange(x.value.length,x.value.length,"forward");
  edit.innerHTML="";

  //elem.appendChild(br);
  let btn2= document.createElement('button');
      btn2.type = "button";
      btn2.className = "btn btn-success btn-sm";
      btn2.innerHTML = "<i class='material-icons icon'>note_add</i> SAVE";
      btn2.onclick = (() => {confirm('Are you sure you want to Save it?')?onSave(id, action,document.getElementById(id+"a").value):popuTable()});
      edit.appendChild(btn2);
}
const onDelete = (id, action,c) => {
  //let cnf= false;
  // let cnf = await deleteModalOkBtn1();
  // //console.log(cnf);
  // if (cnf){
    obj = { "id": id, "action": action };
    fetch('./API/modifyServiceType.php', {
      method: 'post',
      body: JSON.stringify(obj)
    }).then(response => response.text())
    .then(data => {
      if(data == "deleted")
      {
        alert('Service Type deleted successfully!');
        popuTable();
      }
      else
      {
        alert('Error occurred');
      }
    }).catch(err => {
      //console.log(err);
      return err;
    })
  //}
}
const popuTable = () => {
  console.log("hi");
  document.getElementById("table").innerHTML = "";
  let table = document.getElementById('table');
  //let cell = document.createElement('td');
  fetch('./API/veiwServiceType.php').then(res => {
    return res.text();
  }).then(text => {
    let id = [];
    //console.table(text);
    let stat = JSON.parse(text);
    for (let i = 0, j = stat.length; i < stat.length; i++, j--) {
      id.push(stat[i].id);
      console.log(id);
      var row = table.insertRow(0);
      var cell0 = row.insertCell(0);
      var cell1 = row.insertCell(1);
      var cell2 = row.insertCell(2);
      var cell3 = row.insertCell(3);
      cell0.innerHTML = j;
      cell1.innerHTML = stat[i].servicetype;
      cell1.setAttribute("id",stat[i].id)
      var btn1= document.createElement('button');
      btn1.type = "button";
      btn1.className = "btn btn-warning btn-sm";
      btn1.innerHTML = "<i class='material-icons icon'>edit</i> EDIT";
      btn1.onclick = (() => { onEdit(stat[i].id, "edit")});
      cell2.appendChild(btn1);
      cell2.setAttribute("id",stat[i].id+"c");
      var btn = document.createElement('button');
      btn.type = "button";
      btn.className = "btn btn-danger btn-sm";
      btn.innerHTML = "<i class='material-icons icon'>delete</i> DELETE";
      //btn.addEventListener(onclick,deleteModalLaunchButton1);
      //btn.addEventListener(onclick,deleteModalOkBtn1(stat[i].id, "delete"));
      //addHandler("click", btn, deleteModalLaunchButton.click);
      //addHandler("click", btn, deleteModalOkBtn1(stat[i].id, "delete"));
      btn.onclick = (() => {deleteModalOkBtn1(stat[i].id, "delete",0)});
      cell3.appendChild(btn);
    }
  });
}
//let c = 0;
const deleteModalOkBtn1 = (id, action,c) => {
  // deleteModalLaunchButton.click();
  // $(deleteModalOkBtn).click(function(){
  //   deleteModalCloseButton.click()
  //   if(c==0)onDelete(id, action, c);
  //   c=1;
  //  })
  var r = confirm('Are you sure to delete this Service Type!');
  if(r == true)
  {
    onDelete(id, action, c);
  }
}