const country = document.querySelector("#locality-dropdown")
const serviceNames = document.querySelector("#service-dropdown")

// fetch("https://www.bgvhwd.xyz/Project_files/API/country.php")
//   .then(res => res.json())
//   .then(data => {
//     data.map(v => {
//       country.innerHTML += `<option value="${v.id}">${v.country_name}</option>`
//     })
//   })
//   .catch(err => console.log(err))

// fetch("https://www.bgvhwd.xyz/Project_files/API/servicename.php")
// .then(res => res.json())
// .then(data => {
//   data.map(v => {
//     serviceNames.innerHTML += `<option value="${v.id}">${v.serviceNames}</option>`
//   })
// })
// .catch(err => console.log(err))



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

fetch("https://www.bgvhwd.xyz/Project_files/API/servicename.php")
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


  