console.log("working")
const form = document.querySelector('#ajax'),
  inputFields = document.querySelectorAll('#ajax input:not([type="radio"] )'),
  inputFieldsArray = [...inputFields]

let data = {}


const pageUrl = new URL(window.location.href);
let id = pageUrl.searchParams.get('id')
let internalReferenceId = pageUrl.searchParams.get('internal_reference_id')

// let modal = document.querySelector(".add-service-modal #exampleModal")
// let modalOkBtn = document.querySelector(".add-service-modal #modal-ok-btn")
let modalLabel = document.querySelector(".add-service-modal #exampleModalLabel")
// let modalCloseButton = document.querySelector(".add-service-modal .close")

let modalLaunchButton = document.querySelector(".add-service-modal .launch")

const sendRequest = (url) => {
  fetch(url, {
      method: 'POST',
      body: JSON.stringify(data),
    })
    .then(response => response.text())
    .then(data => {
      if (data.trim() == "Bank Details Added Successfully" || data.trim() == "Deleted Successfully") {
        modalLabel.innerHTML = data
        modalLaunchButton.click()
      } else {
        modalLabel.innerHTML = data
        modalLaunchButton.click()
      }
      getAllBankDetails(`./API/viewbankdetails.php?id=${id}&internal_reference_id=${internalReferenceId}`)

      console.log('Success:', data);
    })
    .catch((error) => {
      console.error('Error:', error);
    });
}

const submit = (url) => {
  return e => {
    e.preventDefault()
    inputFieldsArray ? inputFieldsArray.map((value) => {
      data[value.name] = value.value
    }) : false
    data["id"] = id
    data["internal_reference_id"] = internalReferenceId

    sendRequest(url)
    data = {}
  }
}

form && form.addEventListener('submit', submit('./API/bankdetails.php'))

console.log("working 2")

let allBankDetails

const getAllBankDetails = (url) => {
  fetch(url)
    .then(response => response.json())
    .then(data => {
      console.log(data)
      allBankDetails = data
      setAllBankDetails(allBankDetails)
      inputFieldsArray.map((value) => {
        value.value = ""
      })
      inputFieldsArray[0].focus()
    })
    .catch((error) => {
      console.error('Error:', error);
    });
}
getAllBankDetails(`./API/viewbankdetails.php?id=${id}&internal_reference_id=${internalReferenceId}`)

const tbody = document.querySelector("#table-body")
const setAllBankDetails = (d) => {
  console.log(d)
  tbody ? tbody.innerHTML = '' : false
  d.map((value, i) => {
    // ${i + 1}
    tbody ? tbody.innerHTML += `
    <tr class="edit-table" id=${value.id} data-Sr="${i + 1}">
      <td class="tablehead1">
        ${value.bank_name}
      </td>
      <td class="tablehead1">
        ${value.address_line_1}
      </td>
      <td class="tablehead1">
        ${value.address_line_2}
      </td>
      <td class="tablehead1">
        ${value.account_number}
      </td>
      <td class="tablehead1">
        ${value.ifsc_code}
      </td>
      <td class="tablehead1">
        ${value.swift_code}
      </td>
      <td class="tablehead1">
        ${value.routing_code}
      </td>
      <td class="tablehead1">
        ${value.favour_of}
      </td>
      <td class="text-primary tablehead1" id=${value.id} data-Sr="${i + 1}">
        <button
          type="button"
          class="btn btn-warning btn-xs edit">
          <i class="material-icons icon">edit</i> Edit
        </button>
      </td>
      <td class="text-primary tablehead1" >
        <button
          id=${value.id}
          type="button"
          class="btn btn-danger btn-xs delete"
        >
         <i class="material-icons icon">delete</i> Delete
        </button>
      </td>
    </tr>
    ` : false

  })
}

let deleteModal = document.querySelector(".delete-modal #exampleModal")
let deleteModalOkBtn = document.querySelector(".delete-modal #modal-ok-btn")
let deleteModalModalLabel = document.querySelector(".delete-modal #exampleModalLabel")

let deleteModalLaunchButton = document.querySelector(".delete-modal .launch")
let deleteModalCloseButton = document.querySelector(".delete-modal .close")

tbody ? tbody.onclick = (e) => {
  if (e.target.classList.contains('edit')) {
    // e.preventDefault()
    edit(e)
  }
  if (e.target.classList.contains('delete')) {
    e.preventDefault()
    console.log('delete')
    data["Id"] = e.target.id
    data["action"] = "delete"

    deleteModalLaunchButton.click()

    deleteModalOkBtn.onclick = () => {
      console.log("delete")
      console.log("json data", data)
      deleteModalCloseButton.click()
      sendRequest("./API/modifybankdetail.php")
      data = {}
    }
  }
} : false

console.log("working 2")
let jsonData = {}
const edit = (e) => {
  console.log('dblclick')
  let target = e.target.parentElement.getAttribute("data-sr")
  console.log(target)
  setAllBankDetails(allBankDetails)

  let currentEdit = allBankDetails.filter(v => v.id === e.target.parentElement.id)

  console.log(currentEdit)
  currentEdit.map((value, i) => {
    // ${e.target.parentElement.getAttribute("data-Sr")}
    document.querySelector(`[data-sr='${target}']`).innerHTML = `
      <tr class="edit-table" id=${value.id}>
        <td class="tablehead1">
          <input type="hidden" name="id" value="${value.id}" >
          <input type="text" name="bank_name" value="${value.bank_name}" class="form-control" id="" >
        </td>
        <td class="tablehead1">
          <input type="text" name="address-line-1" value="${value.address_line_1}" class="form-control" id="" >
        </td>
        <td class="tablehead1">
          <input type="text" name="address-line-2" value="${value.address_line_2}" class="form-control" id="" >
        </td>
        <td class="tablehead1">
          <input type="text" name="account-no" value="${value.account_number}" class="form-control" id="" >
        </td>
        <td class="tablehead1">
          <input type="text" name="ifsc-code" value="${value.ifsc_code}" class="form-control" id="" >
        </td>
        <td class="tablehead1">
          <input type="text" name="swift-code" value="${value.swift_code}" class="form-control" id="" >
        </td>
        <td class="tablehead1">
          <input type="text" name="routing-code" value="${value.routing_code}" class="form-control" id="" >
        </td>
        <td class="tablehead1">
          <input type="text" name="favour-of" value="${value.favour_of}" class="form-control" id="" >
        </td>
        <td class="text-primary tablehead1">
          <button type="submit" class="btn btn-success btn-xs edit"> <i class="material-icons icon">note_add</i> Save</button>
        </td>
        <td class="text-primary tablehead1">
          <button id=${value.id} type="button" class="btn btn-danger btn-xs delete"><i class="material-icons icon">delete</i> Delete</button>
        </td>
      </tr>
  `
  })


  const inputFields2 = document.querySelectorAll('.edit-table input:not([type="radio"] )'),
    inputFieldsArray2 = [...inputFields2]


  const editOnchange = (url) => {
    return e => {
      e.preventDefault()
      inputFieldsArray2 ? inputFieldsArray2.map((value) => {
        data[value.name] = value.value
      }) : false
      sendRequest(url);
      data = {}
    }
  }

  let saveButton = document.querySelector(".edit-table button[type='submit']")
  console.log(saveButton)
  saveButton && saveButton.addEventListener('click', editOnchange("API/editBankDetails.php"))
  data = {}
}
tbody ? tbody.addEventListener("dblclick", edit) : null

function formReset() {
  document.getElementById("ajax").reset();
}

console.log("working all")