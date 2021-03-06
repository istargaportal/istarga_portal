let documentNames
const documentNameDD = document.querySelector("#document-name")
const multipleSelectDD = document.querySelector(".multiple-select-dd .select")
const searchField = document.querySelector(".search-field")

var selected = [];

const setDocumentNames = () => {
  let options = ""
  multipleSelectDD.innerHTML = ""
  console.log(documentNames)
  let lowercaseDocumentName = searchField.value.toLowerCase()

  documentNames.map((v, i) => {
    let docSearchMatch = v.document_name.toLowerCase().search(lowercaseDocumentName) == 0
    console.log(docSearchMatch)
    docSearchMatch ? options += `<div id="${v.id}" data-index="${i}" class="bg-secondary text-light" ><span>${v.document_name}</span><i data-index="${i}" style="color: white;" class="material-icons remove">${v.active ? "check_box" : "check_box_outline_blank"}</i></div>` : false
  })
  multipleSelectDD.innerHTML += options
}

searchField.onkeyup = () => {
  setDocumentNames()
}

fetch("https://www.bgvhwd.xyz/Project_files/API/assigndocuments.php")
  .then(response => response.json())
  .then(data => {
    documentNames = data
    documentNames.map(function (v) {
      v.active = false;
    });
    console.log('document names', documentNames)
    setDocumentNames()
  })
  .catch((error) => {
    console.error('Error:', error);
  });

let selectedDocuments = document.querySelector(".multiple-select-dd .selected")

selectedDocuments.onmousedown = e => {
  console.log(e.target)
  if (e.target.classList.contains("remove")) {
    documentNames[e.target.getAttribute("data-index")].active = false
  }
  selectedFields()
  setDocumentNames()
}

const selectedFields = () => {
  // console.log(selectedDocuments)
  selectedDocuments.innerHTML = ""

  selected = []
  documentNames.map((v, i) => {
    v.active ? selected.push(v.id) : false
    v.active ? selectedDocuments.innerHTML += `
      <div class="doc"><span class="doc-name">${v.document_name}</span><i data-index="${i}" class="material-icons remove">cancel</i></div>
    ` : false
  })

  if (selectedDocuments.innerHTML === "") {
    return selectedDocuments.innerHTML = "Choose Documents"
  }
}

multipleSelectDD.onmousedown = e => {
  let target = e.target.getAttribute("data-index") || e.target.parentElement.getAttribute("data-index")
  console.log(target)
  documentNames[target].active = !documentNames[target].active
  console.log(documentNames)
  selectedFields()
  setDocumentNames()
}


const assignSubmit = document.querySelector('#ajax button#assignSubmit'),
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
    if (e.keyCode !== 13) {
      e.preventDefault()
      console.log(e.target)
      console.log('submit')
      let run = true
      inputFieldsArray ? inputFieldsArray.map((value) => {
        jsonData[value.name] = value.value
      }) : false

      // for (var option of document.getElementById('document-name').options) {
      //   if (option.selected) {
      //     selected.push(option.value);
      //   } 
      // }
      jsonData["document_names"] = selected
      console.log(selected);

      selectArray ? selectArray.map(value => {
        jsonData[value.name] = value.value
        console.log(value.value)
      }) : false
      if (run === true) {
        console.log(jsonData)
        sendRequest(url)
      }
      jsonData = {}
    }
  }
}

const serviceSubmit = document.querySelector("#ajax")

serviceSubmit.addEventListener("submit", submit("https://www.bgvhwd.xyz/Project_files/API/addService.php"))

console.log('working all')