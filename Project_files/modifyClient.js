console.log('working')
const clientCode = document.querySelector('#ClientCode'),
  inputState = document.querySelector('#inputState')

let modifyClientData

// live search
const getModifyClientData = (d) => {
  // debouncing
  let timer
  return e => {
    clearTimeout(timer) 
    timer = setTimeout(() => {
      let lowerCaseClientCode = clientCode.value.toLowerCase()
      let lowerCaseClientName = inputState.value.toLowerCase()
      let newData
      newData = modifyClientData.filter(v => {
        let clientCodeMatch = v['Client_Code'].toLowerCase().search(lowerCaseClientCode) == 0 
        let clientNameMatch = v['Client_Name'].toLowerCase().search(lowerCaseClientName) == 0
        return clientCodeMatch && clientNameMatch
      })

      updateModifyClientData(newData)
    }, d)
  }
}

const getAllClientData = () =>
{
  // fetch('./API/viewclient.php')
  // .then(function (response) {
  //   if (response.status !== 200) {
  //     console.warn('Looks like there was a problem. Status Code: ' +
  //       response.status);
  //     return;
  //   }
  //   response.json().then(data => {
  //     console.log(data);
  //   modifyClientData = data;
  //   console.log(modifyClientData);
  //   updateModifyClientData(modifyClientData)
  // })
  // }
  // )
  // .catch((error) => {
  //   console.error('Error:', error);
  // });
  var load_condition = "load_all_clients";
  $.ajax({
    type:'POST',
    url:'./API/viewclient.php',
    data:{load_condition},
    success:function(html){
      $('#table').html(html);
      load_datatable();
    }
  });
}
getAllClientData()

// getModifyClientData(0)
clientCode && clientCode.addEventListener('keyup', getModifyClientData(0))
inputState && inputState.addEventListener('keyup', getModifyClientData(0))

const tbody = document.querySelector('#table')

const updateModifyClientData = (d) => {
  console.log(d)
  tbody ? tbody.innerHTML = '' : false
  d.map((value, i) => {
    tbody ? tbody.innerHTML += `<tr>
    <td class="tablehead1">
      ${i + 1}
    </td>
    <td class="tablehead1">
      ${value["Client_Name"]}
    </td>
    <td class="tablehead1">
      ${value["Client_Code"]}
    </td>
    <td class="tablehead1">
      ${value["Client_SPOC"]}
    </td>
    <td class="tablehead1">
      ${value["Live_DateDate"]}
    </td>
    <td class="text-primary tablehead1">
      <ul style="list-style: none;">
        <li class="nav-item dropdown">
          <a
            class="nav-link"
            href="javascript:;"
            id="navbarDropdownProfile"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <i  class="material-icons icon">${value.is_block == 1 ? "person_add_disabled" : "tune"}</i>
            <p class="d-lg-none d-md-block">
              Account
            </p>
            <div class="ripple-container"></div
          ></a>
          <div
            class="dropdown-menu dropdown-menu-left"
            aria-labelledby="navbarDropdownProfile" 
          >
            <a class="dropdown-item view-order" href="#" id="${value.Id}">View Order</a>
            <a class="dropdown-item edit" href="#" id="${value.Id}">View / Edit</a>
            <!-- <div class="dropdown-divider"></div> -->
            <a
              id="${value.Id}"
              data-internal-reference-id="${value.Internal_Reference_ID}"
              class="dropdown-item add-bank-details"
              href="./bankDetails.html"
              >Add bank details</a
            >
            <div class="dropdown-divider"></div>
            <a class="dropdown-item block" href="#" id="${value.Id}">${value.is_block == 1 ? "Unblock" : "Block"}</a>
            <a class="dropdown-item soft-delete" href="#" id="${value.Id}">Soft Delete</a>
            <a class="dropdown-item hard-delete" href="#" id="${value.Id}">Hard Delete</a>
          </div>
        </li>
      </ul>
    </td>
  </tr>` : false

  })
}
// updateModifyClientData()

console.log('working 2')

// do things when clicked on action menu
// const tbody = document.querySelector('#table-body')

let clientEditInfo

let data = {}

const sendRequest = (url) => {
  fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
  })
  .then(response => response.text())
  .then(data => {
    console.log('Success:', data);
    getAllClientData()
  })
  .catch((error) => {
    console.error('Error:', error);
  });
  
  // console.log('again', blockBtn.innerHTML)
}

const sendRequestBlock = (e, url) => {
  fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
  })
  .then(response => response.text())
  .then(data => {
    if (data.trim() == 'Blocked Successfully' || data.trim() == 'Unblocked Successfully') {
      // e.target.innerHTML = "Unblock"
      getAllClientData()
    }
    console.log('Success:', data);
  })
  .catch((error) => {
    console.error('Error:', error);
  });
}

tbody ? tbody.onclick = (e) => { 
  console.log(e.target.classList)
  if (e.target.classList.contains('view-order')) {
    e.preventDefault()
    console.log('view-order')
    window.location.href = `vieworder.php?id=${e.target.id}`
  }
  if (e.target.classList.contains('add-bank-details')) {
    e.preventDefault()
    clientEditInfo = modifyClientData.find(client => client.Id == e.target.id)
    localStorage.setItem("data", JSON.stringify(clientEditInfo))
    let internalReferenceId = e.target.getAttribute("data-internal-reference-id")
    window.location.href = `bankDetails.php?id=${e.target.id}&internal_reference_id=${internalReferenceId}`
  }
  if (e.target.classList.contains('soft-delete')) {
    e.preventDefault()
    console.log('hard-delete')
    data["Id"] = e.target.id
    data["user_status"] = 0
    data["action"] = "soft delete"
    sendRequest("/Project_files/API/modifyClient.php")
  }
  if (e.target.classList.contains('hard-delete')) {
    e.preventDefault()
    data["Id"] = e.target.id
    data["action"] = "delete"
    sendRequest("API/modifyClient.php")
  }
  if (e.target.classList.contains("block")) {
    e.preventDefault()
    console.log(e.target)
    data["Id"] = e.target.id 
    if (e.target.innerHTML === "Unblock") {
      data['block'] = 0
    } else {
      data['block'] = 1
    }
    data["action"] = "block"
    sendRequestBlock(e, "/Project_files/API/modifyClient.php")
  }
  if (e.target.classList.contains('edit')) {
    e.preventDefault()    
    clientEditInfo = modifyClientData.find(client => client.Id == e.target.id)
    localStorage.setItem("data", JSON.stringify(clientEditInfo))
    window.location.href = `addClient.php?id=${e.target.id}`
  }
  data = {}
} : false


console.log('working all');

function block_unblock_click(client_id, condition)
{
  var r = confirm('Are you sure to make change in client status?')
  if(r == true)
  {
    var load_condition = "block_client";
    $.ajax({
      type:'POST',
      url:'./API/client_action.php',
      data:{load_condition, client_id, condition},
      success:function(html){
        $('#print_result').html(html);
        getAllClientData();
      }
    });
  }
}