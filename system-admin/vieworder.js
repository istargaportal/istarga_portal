let searchCriteria

let modifyClientData
let orderStatus
let dateOne
let globalClientId

let data = {}

// live search
let clientCriteria
const service = document.querySelector("#Service")
const getModifyClientData = () => {
  let lowerCaseClientCriteria = searchCriteria.value.toLowerCase()
  let newData
  if (clientCriteria == "First_Name_Last_Name") {
    newData = modifyClientData.filter(v => {
      let firstName = v["first_Name"].toLowerCase().search(lowerCaseClientCriteria) == 0
      let lastName = v["last_Name"].toLowerCase().search(lowerCaseClientCriteria) == 0
      return firstName || lastName
    })
  } else {
    newData = modifyClientData.filter(v => {
      let clientCriteriaMatch
      v[clientCriteria] != null ? clientCriteriaMatch = v[clientCriteria].toLowerCase().search(lowerCaseClientCriteria) == 0 : null
      return clientCriteriaMatch
    })
  }
  updateModifyClientData(newData)
}

service.addEventListener("change", (e) => {
  clientCriteria = e.target.value
  
  if (clientCriteria == "order_creation_date_time" || clientCriteria == "Order_Completion_Date") {
    dateOne = document.querySelector('input#dateofbirth')
    console.log(dateOne)
    return dateOne.addEventListener("change", () => {
      searchCriteria = dateOne
      return getModifyClientData()
    })
  }

  if (clientCriteria == "Order_Status") {
    orderStatus = document.querySelector('#OrderStatus')
    return orderStatus.addEventListener("change", () => {
      searchCriteria = orderStatus
      return getModifyClientData()
    })
  }

  searchCriteria = document.querySelector('#SearchCriteria')
  searchCriteria && searchCriteria.addEventListener('keyup', getModifyClientData)
})

const getAllClientData = () => {
  const pageUrl = new URL(window.location.href);
  let id = pageUrl.searchParams.get('id');
  var load_condition = "load_all_clients";
  var client_id = $('#client_id').val() || 0;
  var default_client_id = $('#default_client_id').val() || 0;

  $.ajax({
    type:'POST',
    url:'./API/viewclienttable.php',
    data:{load_condition, client_id, default_client_id},
    success:function(html){
      $('#data_table').html(html);
      load_datatable();
    }
  });
  // if (id) {
  //   fetch("./API/viewclienttable.php", {
  //       method: 'POST',
  //       body: JSON.stringify({
  //         "client_id": id
  //       }),
  //     })
  //     .then(response => response.json())
  //     .then(data => {
  //       console.log(data)
  //       modifyClientData = data
  //       updateModifyClientData(modifyClientData)
  //       console.log('Success:', data);
  //     })
  //     .catch((error) => {
  //       console.error('Error:', error);
  //     });
  // } else {
  //   fetch("./API/viewclienttable.php")
  //     .then(response => response.json())
  //     .then(data => {
  //       console.log(data)
  //       modifyClientData = data
  //       updateModifyClientData(modifyClientData)
  //       console.log('Success:', data);
  //     })
  //     .catch((error) => {
  //       console.error('Error:', error);
  //     });
  // }
}
getAllClientData()

function load_all_clients()
{
  var default_client_id = $('#default_client_id').val() || 0;
  var load_condition = "all_client_list";
  $.ajax({
    type:'POST',
    url:'./API/viewclienttable.php',
    data:{load_condition, default_client_id},
    success:function(html){
      $('#client_id').html(html);
    }
  });
}
load_all_clients();

// getModifyClientData(0)

const tbody = document.querySelector("#table-body")

const updateModifyClientData = (d) => {
  console.log('update', d)
  tbody ? tbody.innerHTML = '' : false
  d.map((value, i) => {
    tbody ? tbody.innerHTML += `<tr>
    <td class="tablehead1" style="text-align: center;">
    ${i + 1}
    </td>
    <td class="tablehead1" style="text-align: center;">
    ${value["first_Name"]} ${value["last_Name"]} 
    </td>
    <td class="tablehead1" style="text-align: center;">
    ${value["internal_reference_id"]}
    </td>
    <td class="tablehead1" style="text-align: center;">
    ${value["email_id"]}
    </td>
    <td class="tablehead1 assign-to" data-sr="${i}" id="assign-to" style="text-align: center;">
    assign to
    </td>
    <td class="tablehead1">
    ${value["order_creation_date_time"]}
    </td>
    <td class="tablehead1" style="text-align: center;">
    ${value["order_completion_date"]}
    </td>
    <td class="tablehead1" style="text-align: center;">
    ${value["Order_Status"] == 0 ? "pending" : value["Order_Status"] == 1 ? "Started" : value["Order_Status"] == 2 ? "Completed" : null}
    </td>
    <td class="text-primary tablehead1" style="text-align: center;">
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
    <i  class="material-icons icon">person</i>
    <div class="ripple-container"></div
    ></a>
    <div
    class="dropdown-menu dropdown-menu-left"
    aria-labelledby="navbarDropdownProfile" 
    >
    <a
    id="${value.id}"
    class="dropdown-item edit"
    href="./addClient.html"
    data-sr-submit="${i}"
    >Edit</a
    >
    <a class="dropdown-item delete" href="#" id="${value.id}">Delete</a>
    </div>
    </li>
    </ul>
    </td>
    </tr>` : false

  })
}


const sendRequest = (url) => {
  fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
  })
  .then(response => response.json())
  .then(data => {
    getAllClientData()
    console.log('Success:', data);
  })
  .catch((error) => {
    console.error('Error:', error);
  });
}

tbody ? tbody.onclick = (e) => {
  if (e.target.classList.contains('delete')) {
    e.preventDefault()
    data["id"] = e.target.id
    data["action"] = "delete"
    sendRequest("./API/editOrder.php")
  }
  data = {}
} : false

console.log("working 2")

const assignTo = document.querySelector(".assign-to")

let options = ""
const assignToDropDown = () => {
  fetch("https://www.bgvhwd.xyz/Project_files/API/viewOF.php")
  .then(res => res.json())
  .then(data => {
    data.map(v => {
      options += `<option value="${v.Id}" class='bg-secondary text-light'>${v.fullname}</option>`
    })
  })
  .catch(err => console.log(err))
}
assignToDropDown()
tbody ? tbody.ondblclick = (e) => {
  e.target.classList.contains("assign-to") ? assignToDropDown2(e) : null
} : false

const assignToDropDown2 = (e) => {
  let target = e.target.getAttribute("data-sr")
  updateModifyClientData(modifyClientData)

  let element = document.querySelector(`#table-body [data-sr="${target}"]`)
  console.log(element)
  element.innerHTML = `
  <select style="margin-top:5%" id="assign-to" class="browser-default custom-select" name="currency" class="form-control" required>
  ${options}
  </select>
  `
  document.querySelector(`#table-body select`).value = element.value
  document.querySelector(`#table-body [data-sr-submit="${target}"]`).innerHTML = "Assign"

  const inputFields2 = document.querySelectorAll('.edit-table input:not([type="radio"] )'),
  inputFieldsArray2 = [...inputFields2],
  select2 = document.querySelectorAll('.edit-table select'),
  selectArray2 = [...select2]


  const editOnchange = (url) => {
    return e => {
      e.preventDefault()
      data["assign_to"] = document.querySelector(`#table-body select`).value
      data["client_id"] = e.target.id

      sendRequest(url)

      data = {}
    }
  }
  let assignButton = document.querySelector(`#table-body [data-sr-submit="${target}"]`)
  assignButton.addEventListener('click', editOnchange("https://www.bgvhwd.xyz/Project_files/API/viewOF.php"))

  data = {}
}

function view_order_details(order_id)
{
  $.ajax({
    type:'POST',
    url:'../API/View-Client-Order.php',
    data:{order_id},
    success:function(html){
      $('#print_result').html(html);
    }
  });
}