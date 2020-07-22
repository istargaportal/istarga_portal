let data = {}

const currency = document.querySelector('#currency')

fetch('./API/country.php')
  .then(response => response.json())
  .then(data => {
    // clients = data
    // console.log('clients', clients)
    console.log(data)
    data.map(v => {
      // code change
      currency.innerHTML += `<option value="${v.Id}" class="bg-secondary text-light" >${v.currency}</option>`
    })
  });

function load_clients()
{
  var load_condition = "list_all_clients";
  $.ajax({
    type:'POST',
    url:'./API/viewclient.php',
    data:{load_condition},
    success:function(html){
      $('#ClientName').html(html);
    }
  });
}

load_clients();

function delete_assigned_service(id) 
{
  var r = confirm("Are you sure to delete this assigned service?");
  if(r == true)
  {
    var load_condition = "assigned_service";
    var assigned_service_id = id;
    $.ajax({
      type:'POST',
      url:'./API/delete_operation.php',
      data:{load_condition, assigned_service_id},
      success:function(html){
        $('#ClientName').html(html);
        getAllAssignService(`./API/viewassignedservice.php`); 
      }
    });
  }
}

// let clients
// const clientName = document.querySelector('#ClientName')

// fetch('./API/viewclient.php')
//   .then(response => response.json())
//   .then(data => {
//     clients = data
//     // console.log('clients', clients)
//     clients.map(v => {
//       // code change
//       clientName.innerHTML += `<option value="${v.Id}" class="bg-secondary text-light" >${v.Client_Name}</option>`
//     })
//   });

// clientName.onchange = (e) => `fetch`Service(e)


let countries
const countrySelect = document.querySelector('#locality-dropdown')

fetch('./API/country.php')
  .then(response => response.json())
  .then(data => {
    countries = data
    countries.map(v => {
      countrySelect.innerHTML += `<option value="${v.id}" class="bg-secondary text-light" >${v.country_name}</option>`
    })
  });

let serviceType

const fetchService = (e) => {
  data['country_id'] = e.target.value

  fetch("./API/servicetype.php", {
      method: 'POST',
      // body: JSON.stringify({"country_id": '101'}),  
      body: JSON.stringify({
        "country_id": data['country_id']
      }),
    })
    .then(response => response.json())
    .then(data => {
      serviceType = data
      setServiceType()
    })
    .catch((error) => {
      console.error('Error:', error);
    });

}

let serviceName

const fetchServiceName = (e) => {
  var locality_dropdown = $('#locality-dropdown').val();
  data['service_type_id'] = e.target.value;
  data['locality_dropdown'] = locality_dropdown;

  fetch("./API/servicename.php", {
      method: 'POST',
      body: JSON.stringify({
        "service_type_id": data['service_type_id'],
        "locality_dropdown": data['locality_dropdown']
      })
    })
    .then(response => response.json())
    .then(data => {
      serviceName = data
      console.log('service names', serviceName)
      setServiceName()
    })
    .catch((error) => {
      console.error('Error:', error);
    });

}

const serviceTypeSelect = document.querySelector("#select_service_type"),
  serviceNameSelect = document.querySelector("#select_service_name")

const setServiceType = () => {
  console.log('serviceType', serviceType)
  serviceNameSelect.innerHTML = `<option value="" selected="" class="bg-secondary text-light">Choose...</option>`
  serviceTypeSelect.innerHTML = `<option value="" selected="" class="bg-secondary text-light">Choose...</option>`
  serviceType.map(v => {
    serviceTypeSelect.innerHTML += `<option value="${v.id}" class="bg-secondary text-light" >${v.service_type}</option>`
  })
} 

const setServiceName = () => {
  serviceNameSelect.innerHTML = `<option value="" selected="" class="bg-secondary text-light">Choose...</option>`
  serviceName.map(v => {
    serviceNameSelect.innerHTML += `<option value="${v.id}"  class="bg-secondary text-light" >${v.service_name}</option>`
  })
}

countrySelect.onchange = (e) => fetchService(e)


serviceTypeSelect.onchange = (e) => fetchServiceName(e)


const assignSubmit = document.querySelector('#ajax'),
  inputFields = document.querySelectorAll('#ajax input:not([type="radio"] )'),
  inputFieldsArray = [...inputFields],
  inputRadios = document.querySelectorAll('#ajax input[type="radio"]'),
  inputRadiosArray = [...inputRadios],
  inputCheckbox = document.querySelectorAll('#ajax input[type="checkbox"]'),
  inputCheckboxArray = [...inputCheckbox],
  select = document.querySelectorAll('#ajax select'),
  selectArray = [...select],
  inputCurrency = document.querySelector('#ajax select[name="currency"]')

let jsonData = {}

 
let modal = document.querySelector(".add-service-modal #exampleModal")
let modalOkBtn = document.querySelector(".add-service-modal #modal-ok-btn")
let modalLabel = document.querySelector(".add-service-modal #exampleModalLabel")
let modalCloseButton = document.querySelector(".add-service-modal .close")

let modalLaunchButton = document.querySelector(".add-service-modal .launch")

const sendRequest = (url) => {
  fetch(url, {
      method: 'POST',
      body: JSON.stringify(jsonData),
      headers: {
        'Content-type': 'application/json'
      }
    })
    .then(response => response.text())
    .then(data => {
      if (data.trim() == "Service Assigned Successfully") {
        modalLaunchButton.click()
        modalOkBtn.onclick = () => {
          modalCloseButton.click()
        }
        getAllAssignService(`./API/viewassignedservice.php`)
      } else {
        modalLabel.innerHTML = data
        modalLaunchButton.click()
        modalOkBtn.onclick = () => {
          modalCloseButton.click()
        }
      }
      console.log('Success:', data);
    })
    .catch((error) => {
      console.error('Error:', error);
    });
}

// const submit = (url) => {
//   return e => {
//     e.preventDefault()
//     console.log('submit')
//     let run = true
//     inputFieldsArray ? inputFieldsArray.map((value) => {
//       if (run === true) {
//         if (value.value.trim().length == 0) {
//           console.log(value)
//           alert('all fields are required')
//           run = false
//         }
//         jsonData[value.name] = value.value
//       }
//     }) : false
//     inputRadiosArray ? inputRadiosArray.map((value) => {
//       let checked = 0

//       if (value.checked === true) {
//         checked = 1
//       }
//       jsonData[value.name] = checked
//     }) : false
//     inputCheckboxArray ? inputCheckboxArray.map((value) => {
//       let checked = 0

//       if (value.checked === true) {
//         checked = 1
//       }
//       jsonData[value.name] = checked
//     }) : false
//     selectArray ? selectArray.map(value => {
//       jsonData[value.name] = value.value
//     }) : false
//     inputCurrency ? data["currency"] = inputCurrency.value : false
//     if (run === true) {
//       console.log(jsonData)
//       sendRequest(url)
//     }
//     jsonData = {}
//   }
// }

const submit = (url) => {
  return e => {
    console.log(e.keyCode)
    if(e.keyCode !== 13) {
      e.preventDefault()
      console.log(e.target)
      console.log('submit')
      let run = true
      inputFieldsArray ? inputFieldsArray.map((value) => {
          jsonData[value.name] = value.value
      }) : false
      selectArray ? selectArray.map(value => {
        jsonData[value.name] = value.value
      }) : false
      if (run === true) {
        console.log(jsonData)
        sendRequest(url)
      }
      jsonData = {}
    }
  }
}




// [{"id":"0","client_id":"10","country_id":"101","Service_type_id":null,"service_id":"68","Service_type_name":null,"service_name":"Class 12th","client_name":"Wipro Technologies ","country_name":"India","price":"1000","SLA":"nmhg"}]
let allAssignService

const tbody = document.querySelector("#table")

function getAllAssignService(urls)
{
  var load_condition = "load_all_services";
  $.ajax({
    type:'POST',
    url:urls,
    data:{load_condition},
    success:function(html){
      $('#table').html(html);
      load_datatable();
    }
  });
  // fetch(url)
  //   .then(response => response.json())
  //   .then(data => {
  //     allAssignService = data
  //     if (data != 0) {

  //     }
  //     setAllAssignService(allAssignService)
  //     inputFieldsArray.map((value) => {
  //       value.value = ""
  //     })

  //     // inputFieldsArray[0].focus()
  //   })
  //   .catch((error) => {
  //     console.log('Error:', error);
  //   });
}
getAllAssignService(`./API/viewassignedservice.php`);


// const setAllAssignService = (d) => {
//   tbody ? tbody.innerHTML = '' : false
//   d.map((value, i) => {
//     tbody ? tbody.innerHTML += `
//     <tr class="edit-table" id=${value.id} data-Sr="${i + 1}" >
//       <td>
//         ${i + 1}
//       </td>
//       <td class="tablehead1">
//         ${value.client_name}
//       </td>
//       <td class="tablehead1">
//         ${value.country_name}
//       </td>
//       <td class="tablehead1">
//         ${value.Service_type_name}
//       </td>
//       <td class="tablehead1">
//         ${value.service_name}
//       </td>
//       <td>
//         ${value.price}
//       </td>
//       <td>
//         ${value.SLA}
//       </td>
//       <td class="text-primary tablehead1">
//         <button
//           type="button"
//           class="btn btn-primary btn-sm"
//         >
//           Edit
//         </button>
//       </td>
//       <td class="text-primary tablehead1">
//         <button
//           id=${value.id}
//           type="button"
//           class="btn btn-primary btn-sm delete"
//         >
//           Delete
//         </button>
//       </td>
//     </tr>
//     ` : false

//   })
// }

// let deleteModal = document.querySelector(".delete-modal #exampleModal")
// let deleteModalOkBtn = document.querySelector(".delete-modal #modal-ok-btn")
// let deleteModalModalLabel = document.querySelector(".delete-modal #exampleModalLabel")

// let deleteModalLaunchButton = document.querySelector(".delete-modal .launch")
// let deleteModalCloseButton = document.querySelector(".delete-modal .close")

// tbody ? tbody.onclick = (e) => {
//   if (e.target.classList.contains('delete')) {
//     e.preventDefault()
//     jsonData["Id"] = e.target.id
//     jsonData["action"] = "delete"
//     deleteModalLaunchButton.click()
    
//     deleteModalOkBtn.onclick = () => {
//       console.log("delete")
//       console.log("json data", jsonData)
//       deleteModalCloseButton.click()
//       sendRequest("./API/assignService.php")
//       jsonData = {}
//     }

//     // if (r == true) {
//     // }
//   }
// } : false

// let serviceType2 = ''

// fetch("./API/servicetype.php", {
//     method: 'POST',
//     body: JSON.stringify({
//       "country_id": "101"
//     }),
//   })
//   .then(response => response.json())
//   .then(data => {
//     // serviceType2 = `<select name="serviceType">
//     //   ${data.map(v => `<option value="${v.id}">${v.service_type}</option>`)}

//     // </select>`
//     for (let i = 0; i < data.length; i++) {
//       serviceType2 += `<option value="${data[i].id}">${data[i].service_type}</option>`
//     }

//     serviceType2 = `<select style="margin-top:5%" class="browser-default custom-select" id="select_service_type" name="select_service_type" >${serviceType2}</select>`


//   })
//   .catch((error) => {
//     console.error('Error:', error);
//   });


// tbody ? tbody.ondblclick = (e) => {
  
//   let target = e.target.parentElement.getAttribute("data-sr") 
//   // console.log(e.target)
//   setAllAssignService(allAssignService)

//   let currentEdit = allAssignService.filter(v => v.id === e.target.parentElement.id)

//   let countrySelect2 = countrySelect
//   let serviceTypeSelect2 = serviceType2 
//   let clientNameSelect = clientName

//   // console.log(serviceTypeSelect2)
//   let editTableClientName
//   let editTableLocalityDropdown
//   let editTableServiceTypeName
//   let editTableServiceName
//   let editTablePrice
//   let editTableSLA

//   currentEdit.map(value => {
//     document.querySelector(`[data-sr='${target}']`).innerHTML = `
//       <tr class="edit-table" id=${value.id}>
//         <td class="tablehead1">
//           ${e.target.parentElement.getAttribute("data-Sr")}
//         </td>
//         <td class="tablehead1">
//           ${clientNameSelect.outerHTML}
//         </td>
//         <td class="tablehead1">
//           ${countrySelect2.outerHTML}
//         </td>
//         <td class="tablehead1">
//           ${serviceTypeSelect2}
//         </td>
//         <td class="tablehead1">
//           <input type="text" class="form-control" id="service-name" name="service-name" />
//         </td>
//         <td class="tablehead1">
//           <input type="number" class="form-control" id="price" name="price" />
//         </td>
//         <td class="tablehead1">
//           <input type="text" class="form-control" id="SLA" name="SLA" />
//         </td>
//         <td class="text-primary tablehead1">
//           <button
//             type="submit"
//             class="btn btn-primary btn-sm"
//           >
//             Save
//           </button>
//         </td>
//         <td class="text-primary tablehead1">
//           <button
//             id=${value.id}
//             type="button"
//             class="btn btn-primary btn-sm delete"
//           >
//             Delete
//           </button>
//         </td>
//       </tr>
//   `

//     editTableClientName = document.querySelector(".edit-table #ClientName")
//     editTableLocalityDropdown = document.querySelector(".edit-table #locality-dropdown")
//     editTableServiceTypeName = document.querySelector(".edit-table #select_service_type")
//     editTableServiceName = document.querySelector(".edit-table #service-name")
//     editTablePrice = document.querySelector(".edit-table #price")
//     editTableSLA = document.querySelector(".edit-table #SLA")


//     const inputFields = document.querySelectorAll('#edit-table input:not([type="radio"] )'),
//       inputFieldsArray = [...inputFields],
//       select = document.querySelectorAll('#edit-table select'),
//       selectArray = [...select]


//     editTableClientName.value = value.client_id
//     editTableLocalityDropdown.value = "101"
//     editTableServiceTypeName.value = value.Service_type_id
//     editTableServiceName.value = value.service_name
//     editTablePrice.value = value.price
//     editTableSLA.value = value.SLA

//     console.log(e.target.parentElement)


//   })


//   const inputFields2 = document.querySelectorAll('.edit-table input:not([type="radio"] )'),
//     inputFieldsArray2 = [...inputFields2],
//     select2 = document.querySelectorAll('.edit-table select'),
//     selectArray2 = [...select2]


//   const editOnchange = (url) => {
//     return e => {
//       e.preventDefault()
//       let run = true
//       inputFieldsArray2 ? inputFieldsArray2.map((value) => {
//         if (run === true) {          
//           if (value.value.trim().length == 0) {
//             console.log(value)
//             alert('all fields are required')
//             run = false
//           }
//           jsonData[value.name] = value.value
//         }
//       }) : false
//       selectArray2 ? selectArray2.map(value => {
//         jsonData[value.name] = value.value
//       }) : false
//       if (run === true) {
//         console.log(jsonData)
//         sendRequest(url)
//       }
//       jsonData = {}
//     }
//   }

//   editTableClientName.addEventListener('change', editOnchange("./API/assignService.php"))
//   editTableLocalityDropdown.addEventListener('change', editOnchange("./API/assignService.php"))
//   editTableServiceTypeName.addEventListener('change', editOnchange("./API/assignService.php"))
//   let saveButton = document.querySelector(".edit-table button[type='submit']")
//   saveButton.addEventListener('click', editOnchange("./API/assignService.php"))

//   const editOneEnter = (url) => {
//     return e => {
//       e.preventDefault();
//       console.log(e.keyCode)
//       if (e.keyCode === 13) {
//         console.log('enter')
//         editOnchange(url)
//       }
//     }
//   }
  
//   // editTableServiceName.addEventListener('keyup', editOneEnter("API/assignService.php"))
//   // editTablePrice.addEventListener('keyup', editOneEnter("API/assignService.php"))
//   // editTableSLA.addEventListener('keyup', editOneEnter("API/assignService.php"))

//   data = {}
// } : false


// assignSubmit && assignSubmit.addEventListener('submit', submit('./API/assignService.php'))
