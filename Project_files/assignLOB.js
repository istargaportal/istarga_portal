console.log('working') 

let data = {}

let clientName
const clientNameDD = document.querySelector("#clientName")

const setClientNames = () => {
  clientName.map(v => {
    clientNameDD.innerHTML += `<option value="${v.Id}"  class="bg-secondary text-light" >${v.Client_Name}</option>`
  })
}

fetch("https://www.bgvhwd.xyz/Project_files/API/viewclient.php")
  .then(response => response.json())
  .then(data => {
    clientName = data
    console.log('client names', clientName) 
    setClientNames()
  })
  .catch((error) => {
    console.error('Error:', error);
  });

  let lob
  const lobDD = document.querySelector("#lob")
  
  const setLobNames = () => {
    lob.map(v => {
      lobDD.innerHTML += `<option value="${v.id}"  class="bg-secondary text-light" >${v.lob_type}</option>`
    })
  }
  
  fetch("https://www.bgvhwd.xyz/Project_files/API/lob_type.php")
    .then(response => response.json())
    .then(data => {
      lob = data
      console.log('lob', lob) 
      setLobNames()
    })
    .catch((error) => {
      console.error('Error:', error);
    });
  
  


const form = document.querySelector('#ajax'),
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

const sendRequest = (url) => {
  fetch(url, {
      method: 'POST',
      body: JSON.stringify(jsonData),
    })
    .then(response => response.text())
    .then(data => {
      if (data.trim() == "Service Assigned Successfully") {
        alert(data)
        getAllAssignService(`https://www.bgvhwd.xyz/Project_files/API/viewassignedservice.php`)
      } else {
        alert(data)
      }
      console.log('Success:', data);
    })
    .catch((error) => {
      console.error('Error:', error);
    });
}

const submit = (url) => {
  return e => {
    console.log(e.keyCode)
    if(e.keyCode !== 13) {
      e.preventDefault()
      console.log(e.target)
      console.log('submit')
      let run = true

        var selected = [];
        var selected2 = []
        for (var option of document.getElementById('clientName').options) {
          if (option.selected) {
            selected.push(option.value);
          }
        }
        jsonData["client"] = selected

        for (var option of document.getElementById('lob').options) {
          if (option.selected) {
            selected2.push(option.value);
          }
        }
        jsonData["lob"] = selected2

        console.log(selected);

      if (run === true) {
        console.log(jsonData)
        sendRequest(url)
      }
      jsonData = {}
    }
  }
}

const assigndocumentsSubmit = document.querySelector("#ajax button[type='submit']")

form.addEventListener("submit", submit("https://www.bgvhwd.xyz/Project_files/API/assignLOB.php"))

console.log('working all')