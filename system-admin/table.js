let deleteModal = document.querySelector(".delete-modal #exampleModal")
let deleteModalOkBtn = document.querySelector(".delete-modal #modal-ok-btn")
let deleteModalModalLabel = document.querySelector(".delete-modal #exampleModalLabel")
let deleteModalLaunchButton = document.querySelector(".delete-modal .launch")
let deleteModalCloseButton = document.querySelector(".delete-modal .close")

const onSave = (id, action, value) => {
  //console.log(value);
  obj = { id: id, action: action, value: value };
  //console.log(obj.id);
  fetch("./API/modifyService.php", {
    method: "post",
    body: JSON.stringify(obj),
  })
    .then(function (res) {
      //alert("Edited successfully")
      //console.log(res.text());
      popuTable();
    })
    .catch((err) => {
      //console.log(err);
      return err;
    });
};

const onEdit = (id, action) => {
  //console.log(id);
  let elem = document.getElementById(id);
  let edit = document.getElementById(id + "c");
  //console.log(elem.textContent);
  let x = document.createElement("INPUT");
  //let br = document.createElement("br")
  x.setAttribute("type", "text");
  x.setAttribute("value", elem.textContent);
  x.setAttribute("id", id + "a");
  x.setAttribute("class", "form-control focus");
  x.style.maxWidth = "80%";
  elem.innerHTML = "";
  elem.appendChild(x).focus();
  x.setSelectionRange(x.value.length, x.value.length, "forward");
  edit.innerHTML = "";

  //elem.appendChild(br);
  let btn2 = document.createElement("input");
  btn2.type = "button";
  btn2.className = "btn btn-primary btn-sm";
  btn2.value = "SAVE";
  btn2.onclick = () => {
    confirm("Are you sure you want to Save it?")
      ? onSave(id, action, document.getElementById(id + "a").value)
      : popuTable();
  };
  edit.appendChild(btn2);
  // let btn3= document.createElement('input');
  //     btn3.type = "button";
  //     btn3.className = "btn btn-primary btn-sm";
  //     btn3.value = "CANCEL";
  //     btn3.onclick = (() => {popuTable()});
  //     elem.appendChild(btn3);
};
const onDelete = (id, action) => {
  obj = { id: id, action: action };
  console.log(obj.id);
  fetch("./API/modifyService.php", {
    method: "post",
    body: JSON.stringify(obj),
  })
    .then(function (res) {
      //console.log(res.text());
      popuTable();
    })
    .catch((err) => {
      //console.log(err);
      return err;
    });
};
const popuTable = () => {
  document.getElementById("table").innerHTML = "";
  let table = document.getElementById("table");
  //let cell = document.createElement('td');
  fetch("./API/servicename.php")
    .then((res) => {
      return res.text();
    })
    .then((text) => {
      //console.table(text);
      let stat = JSON.parse(text);
      for (let i = 0, j = stat.length; i < stat.length; i++, j--) {
        var row = table.insertRow(0);
        var cell0 = row.insertCell(0);
        var cell1 = row.insertCell(1);
        var cell2 = row.insertCell(2);
        var cell3 = row.insertCell(3);
        var cell4 = row.insertCell(4);
        cell0.innerHTML = j;
        cell1.innerHTML = stat[i].service_name;
        cell1.setAttribute("id", stat[i].id);
        cell2.innerHTML = stat[i].servicetype;
        var btn1 = document.createElement("input");
        btn1.type = "button";
        btn1.className = "btn btn-primary btn-sm";
        btn1.value = "EDIT";
        btn1.onclick = () => {
          onEdit(stat[i].id, "edit");
        };
        cell3.appendChild(btn1);
        cell3.setAttribute("id", stat[i].id + "c");
        var btn = document.createElement("input");
        btn.type = "button";
        btn.className = "btn btn-primary btn-sm";
        btn.value = "DELETE";
        btn.onclick = () => {
          deleteModalOkBtn1(stat[i].id, "delete", 0);
        };
        cell4.appendChild(btn);
      }
    });
};
const deleteModalOkBtn1 = (id, action, c) => {
  deleteModalLaunchButton.click();
  $(deleteModalOkBtn).click(function () {
    console.log("delete");
    // //console.log("json data", jsonData)
    // onDelete(stat[i].id, "delete")
    deleteModalCloseButton.click();
    // jsonData = {}
    if (c == 0) onDelete(id, action);
    c = 1;
  });
};
