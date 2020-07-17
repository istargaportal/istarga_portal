const onSave = (id, action, value) => {
  //console.log(value);
  obj = { "id": id, "action": action, "value": value };
  //console.log(obj.id);
  fetch('./API/modifyDocumentName.php', {
    method: 'post',
    body: JSON.stringify(obj)
  }).then(function (res) {
    //alert("Edited successfully")
    //console.log(res);
    popuTable();
  }).catch(err => {
    //console.log(err);
    return err;
  })
}

const onEdit = (id, action) => {
  //console.log(id);
  let elem = document.getElementById(id);
  let edit = document.getElementById(id+"c");
  //console.log(elem.textContent);
  let x = document.createElement("INPUT");
  x.setAttribute("type", "text");
  x.setAttribute("value",elem.textContent);
  x.setAttribute("id",id+"a")
  x.setAttribute("class","form-control focus");
  x.style.maxWidth="80%"
  elem.innerHTML="";
  elem.appendChild(x).focus()
  x.setSelectionRange(x.value.length,x.value.length,"forward");
  edit.innerHTML="";

  //elem.appendChild(br);
  let btn2= document.createElement('input');
      btn2.type = "button";
      btn2.className = "btn btn-primary btn-sm";
      btn2.value = "SAVE";
      btn2.onclick = (() => {confirm('Are you sure you want to Save it?')?onSave(id, action,document.getElementById(id+"a").value):popuTable()});
      edit.appendChild(btn2);
}
const onDelete = (id, action) => {
  obj = { "id": id, "action": action };
  //console.log(obj.id);
  fetch('./API/modifyDocumentName.php', {
    method: 'post',
    body: JSON.stringify(obj)
  }).then(function (res) {

    //console.log(res.text());
    popuTable();
  }).catch(err => {
    //console.log(err);
    return err;
  })
}
const popuTable = () => {
  document.getElementById("table").innerHTML = "";
  let table = document.getElementById('table');
  //let cell = document.createElement('td');
  fetch('./API/documentlist.php').then(res => {
    return res.text();
  }).then(text => {
    //console.table(text);
    let stat = JSON.parse(text);
    for (let i = 0, j = stat.length; i < stat.length; i++, j--) {
      var row = table.insertRow(0);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      cell1.innerHTML = stat[i].document_name;
      cell1.setAttribute("id",stat[i].id);
      var btn1= document.createElement('input');
      btn1.type = "button";
      btn1.className = "btn btn-primary btn-sm";
      btn1.value = "EDIT";
      btn1.onclick = (() => { onEdit(stat[i].id, "edit")});
      cell2.appendChild(btn1);
      cell2.setAttribute("id",stat[i].id+"c");
      var btn = document.createElement('input');
      btn.type = "button";
      btn.className = "btn btn-primary btn-sm";
      btn.value = "DELETE";
      btn.onclick = (() => { confirm('Are you sure you want to delete it?') ? onDelete(stat[i].id, "delete") : ''; });
      cell3.appendChild(btn);
    }
  });
}



// const inputFields = document.querySelectorAll('#ajax input:not([type="radio"] )'),
//   inputFieldsArray = [...inputFields],
//   mandatoryDocumentSubmit = document.querySelector("#ajax button[type='submit']")

// let data = {}

// const sendRequest = (url) => {
//   fetch(url, {
//     method: 'POST',
//     body: JSON.stringify(data),
//   })
//   .then(response => response.text())
//   .then(data => {
//     if (url === "https://www.bgvhwd.xyz/Project_files/API/addClient.php" && data.trim() == 'sucess') {
//       alert('data submitted successfully')
//       window.location.href = "modifyClient.php"
//     }

//     console.log('Success:', data);
//   })
//   .catch((error) => {
//     console.error('Error:', error);
//   });
// }

// const submit = (url) => {
//   return e => {
//     e.preventDefault()
//     let run = true
//     inputFieldsArray ? inputFieldsArray.map((value) => {
//       if (run === true) {
//         if (value.value.trim().length == 0) {
//           alert('all fields are required')
//           run = false
//         }
//         data[value.name] = value.value
//       }
//     }) : false
//     if (run === true) {
//       sendRequest(url)
//     }
//     data = {}
//   }
// }

// mandatoryDocumentSubmit && mandatoryDocumentSubmit.addEventListener('click', submit('API/mandatoryDocuments.php'))

// console.log('mandatoryDocuments.php working 2')

// let mandatoryDocumentData

// fetch('https://www.bgvhwd.xyz/Project_files/API/documentlist.php')
//   .then(response => response.json())
//   .then(data => {
//     mandatoryDocumentData = data
//     updateMandatoryDocumentData(mandatoryDocumentData)
//     console.log(mandatoryDocumentData)
//   })
//   .catch((error) => {
//     console.error('Error:', error);
//   });

// const tbody = document.querySelector('#table')

// const updateMandatoryDocumentData = (d) => {
//   tbody ? tbody.innerHTML = '' : false
//   d.map((value, i) => {
//     tbody ? tbody.innerHTML += `
//     <tr>
//       <td>
//         ${value.document_name}
//       </td>

//       <td class="text-primary">
//         <button
//           type="button"
//           class="btn btn-primary btn-sm"
//         >
//           Edit
//         </button>
//       </td>
//       <td class="text-primary">
//         <button
//           type="button"
//           class="btn btn-primary btn-sm"
//         >
//           Delete
//         </button>
//       </td>
//     </tr>
//     ` : false
//   })
// }


// console.log('mandatoryDocuments.php working all')
