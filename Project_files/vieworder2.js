console.log('working code')
let searchCriteria

let modifyClientData
let orderStatus
let dateOne
let globalClientId

let data = {}

// live search
let clientCriteria
let newData
const service = document.querySelector("#Service")
const getModifyClientData = () => {
  let lowerCaseClientCriteria = searchCriteria.value.toLowerCase()
  if (clientCriteria == "First_Name_Last_Name") {
    newData = modifyClientData.filter(v => {
      console.log(v)
      let firstName = v["first_Name"].toLowerCase().search(lowerCaseClientCriteria) == 0
      let lastName = v["last_Name"].toLowerCase().search(lowerCaseClientCriteria) == 0
      return firstName || lastName
    })
  } else {
    console.log('key up 2')
    console.log(clientCriteria)
    console.log(modifyClientData[0][clientCriteria])
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
  console.log(clientCriteria)

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
    console.log('order Status')
    return orderStatus.addEventListener("change", () => {
      searchCriteria = orderStatus
      console.log(searchCriteria)
      return getModifyClientData()
    })
  }

  searchCriteria = document.querySelector('#SearchCriteria')
  searchCriteria && searchCriteria.addEventListener('keyup', getModifyClientData)
})

const getClientData = (id) => {
  fetch("https://www.bgvhwd.xyz/Client/API/viewclienttable.php", {
      method: 'POST',
      body: JSON.stringify({
        "client_id": id
      }),
    })
    .then(response => response.json())
    .then(data => {
      console.log(data)
      modifyClientData = data
      updateModifyClientData(modifyClientData)
      console.log('Success:', data);
    })
    .catch((error) => {
      console.error('Error:', error);
    });
}

const getAllClientData = () => {
  fetch("https://www.bgvhwd.xyz/Client/API/viewclienttable.php")
  .then(response => response.json())
  .then(data => {
    console.log(data)
    modifyClientData = data
    updateModifyClientData(modifyClientData)
    console.log('Success:', data);
  })
  .catch((error) => {
    console.error('Error:', error);
  });
}

getAllClientData()


// getModifyClientData(0)

const tbody = document.querySelector("#table-body")

const updateModifyClientData = (d) => {
  console.log('update', d)
  tbody ? tbody.innerHTML = '' : false
  d.map((value, i) => {
    tbody ? tbody.innerHTML += `<tr>
    <td class="tablehead1" data-client-id="${value.id}" id="client-id-hidden">
      ${i + 1}
    </td>
    <td class="tablehead1">
      ${value["client_name"]} 
    </td>
    <td class="tablehead1">
      ${value["first_Name"]} ${value["last_Name"]} 
    </td>
    <td class="tablehead1">
      ${value["internal_reference_id"]}
    </td>
    <td class="tablehead1">
      ${value["email_id"]}
    </td>
    <td class="tablehead1 assign-to" data-sr="${i}" id="assign-to">
      assign to
    </td>
    <td class="tablehead1">
      ${value["order_creation_date_time"]}
    </td>
    <td class="tablehead1">
      ${value["order_completion_date"]}
    </td>
    <td class="tablehead1">
      ${value["Order_Status"] == 0 ? "pending" : value["Order_Status"] == 1 ? "Started" : value["Order_Status"] == 2 ? "Completed" : null}
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
  // assignToDropDown()
}

 
const sendRequest = (url) => {
  fetch(url, {
      method: 'POST',
      body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {

      globalClientId ? getClientData(globalClientId) : getAllClientData()

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
    sendRequest("https://www.bgvhwd.xyz/client/API/editOrder.php")
  }
  data = {}
} : false


const clientName = document.querySelector("#clientName")
const clientSelect = document.querySelector(".search-client .client-select")

let allClientNames

fetch("https://www.bgvhwd.xyz/Project_files/API/viewclient.php")
  .then(res => res.json())
  .then(data => {
    console.log(data)
    data.map(v => {
      // clientName.innerHTML += `<option value="${v.Id}" selected="" class=" bg-secondary text-light">${v.Client_Name}</option>`
      clientSelect.innerHTML += `<div id="${v.Id}" selected="" class=" bg-secondary text-light">${v.Client_Name}</div>`
    })
    allClientNames = data
  })
  .catch(err => console.log(err))

const clientNameDD = (e) => {
  // change = true
  // updateModifyClientData(newData2)
  console.log(e.target.value)
  globalClientId = e.target.id
  getClientData(e.target.id)
}

//client name search

let clientNameDDInput = document.querySelector(".search-client input")
let clientNameDDSelect = document.querySelector(".search-client select")
let clientNameSearch = document.querySelector(".search-client .search")

clientNameDDSelect.onclick = () => {
  // clientNameDDInput.classList.add("active")
  // clientNameDDInput
}

clientNameSearch.onmousedown = e => {
  console.log(e.target.tagName)
  clientNameDDInput.value = (e.target.tagName == "INPUT" ? e.target.value : e.target.textContent)
  e.target.tagName != "INPUT" ? clientNameDD(e) : false
}
clientNameDDInput.onfocus = () => {
  clientNameSearch.classList.add("active")
}
clientNameDDInput.onblur = () => {
  clientNameSearch.classList.remove("active")
}
clientNameDDInput.onkeyup = () => {
  let lowerCaseClientName = clientNameDDInput.value.toLowerCase()
  console.log(lowerCaseClientName)
  let newData2
  newData2 = allClientNames.filter(v => {
    let clientNameMatch = v['Client_Name'].toLowerCase().search(lowerCaseClientName) == 0 
    return clientNameMatch
  })
  clientSelect.innerHTML = ``
  newData2.map(v => {
    // clientName.innerHTML += `<option value="${v.Id}" selected="" class=" bg-secondary text-light">${v.Client_Name}</option>`
    clientSelect.innerHTML += `<div id="${v.Id}" selected="" class=" bg-secondary text-light">${v.Client_Name}</div>`
  })
  
}

// clientName.addEventListener("change", clientNameDD)


const assignTo = document.querySelector(".assign-to")

let options = ""
const assignToDropDown = () => {
  fetch("https://www.bgvhwd.xyz/Project_files/API/viewOF.php")
    .then(res => res.json())
    .then(data => {
      console.log(data)
      data.map(v => {
        options += `<option value="${v.Id}" class='bg-secondary text-light'>${v.fullname}</option>`
      })
      console.log(options)
      // assignTo.innerHTML = options
    })
    .catch(err => console.log(err))
}
assignToDropDown()
tbody ? tbody.ondblclick = (e) => {
  e.target.classList.contains("assign-to") ? assignToDropDown2(e) : null
} : false

const assignToDropDown2 = (e) => {
  console.log("assign 2")
  let target = e.target.getAttribute("data-sr")
  console.log(modifyClientData)
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

  // })


  const inputFields2 = document.querySelectorAll('.edit-table input:not([type="radio"] )'),
    inputFieldsArray2 = [...inputFields2],
    select2 = document.querySelectorAll('.edit-table select'),
    selectArray2 = [...select2]


  const editOnchange = (url) => {
    return e => {
      e.preventDefault()
      data["assign_to"] = document.querySelector(`#table-body select`).value
      console.log(e.target.id)
      data["client_id"] = e.target.id

      console.log(data)
      sendRequest(url)

      data = {}
    }
  }
  console.log(target)
  let assignButton = document.querySelector(`#table-body [data-sr-submit="${target}"]`)
  console.log(assignButton)
  assignButton.addEventListener('click', editOnchange("https://www.bgvhwd.xyz/Project_files/API/viewOF.php"))

  data = {}
}



console.log("working all")