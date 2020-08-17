const onSave = (id, action, value) => {
  //console.log(value);
  obj = { "id": id, "action": action, "value": value };
  //console.log(obj.id);
  fetch('./API/modifyDocumentName.php', {
    method: 'post',
    body: JSON.stringify(obj)
  }).then(response => response.text())
  .then(data => {
    if(data == "updated")
    {
      alert('Mandatory Document updated Successfully');
      popuTable();
    }
    else if(data == "already")
    {
      alert('Mandatory Document already exists');
    }
    else
    {
      alert('Error occurred');
    }
  }).catch(err => {
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
  let btn2= document.createElement('button');
      btn2.type = "button";
      btn2.className = "btn btn-success btn-xs";
      btn2.innerHTML = "<i class='material-icons icon'>note_add</i> SAVE";
      btn2.onclick = (() => {confirm('Are you sure you want to Save it?')?onSave(id, action,document.getElementById(id+"a").value):popuTable()});
      edit.appendChild(btn2);
}
const onDelete = (id, action) => {
  if(value.trim() == "")
  {
    alert("Please enter Mandatory Document!");
    $('#'+id+'a').focus();
    return;
  }
  obj = { "id": id, "action": action };
  fetch('./API/modifyDocumentName.php', {
    method: 'post',
    body: JSON.stringify(obj)
  }).then(response => response.text())
    .then(data => {
      if(data == "deleted")
      {
        alert('Mandatory Document deleted successfully!');
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
      var cell0 = row.insertCell(0);
      var cell1 = row.insertCell(1);
      var cell2 = row.insertCell(2);
      var cell3 = row.insertCell(3);
      cell0.innerHTML = j;
      cell1.innerHTML = stat[i].document_name;
      cell1.setAttribute("id",stat[i].id);
      var btn1= document.createElement('button');
      btn1.type = "button";
      btn1.className = "btn btn-warning btn-xs";
      btn1.innerHTML = "<i class='material-icons icon'>edit</i> EDIT";
      btn1.onclick = (() => { onEdit(stat[i].id, "edit")});
      cell2.appendChild(btn1);
      cell2.setAttribute("id",stat[i].id+"c");
      var btn = document.createElement('button');
      btn.type = "button";
      btn.className = "btn btn-danger btn-xs";
      btn.innerHTML = "<i class='material-icons icon'>delete</i> DELETE";
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
