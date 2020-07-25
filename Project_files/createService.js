var edit_country = $('#edit_country').val() || 0;
var edit_service_type_id = $('#edit_service_type_id').val() || 0;
var edit_currency = $('#edit_currency').val() || 0;

  let tableData = [
  {
    id: 1,
    random_data: "random data",
    country_name: "India",
    add_documents: ["7th", "8th", "-50"],
    currency: "INR",
    price: "500",
    service: "7th marksheet",
    service_type: "education verification"
  },
  {
    id: 2,
    random_data: "random data",
    country_name: "USA",
    add_documents: ["High school"],
    currency: "USD",
    price: "20",
    service: "High school degree",
    service_type: "education verification"
  }
]

let tbody = document.querySelector("#table")  
let tbodyDownload = document.querySelector("#downloadable-table tbody")

const popuTable = () => {
  tbody.innerHTML = ""
  tbodyDownload.innerHTML = ``
  tableData.map((v, i) => {
    tbody.innerHTML += `
      <tr>
        <td>
          ${i + 1}
        </td>
        <td>
          ${v.country_name}
        </td>
        <td>
          ${v.service}
        </td>
        <td>
          ${v.service_type}
        </td>
        <td>
          ${v.price}
        </td>
        <td>
          ${v.currency}
        </td>
        <td>
          ${v.add_documents.join(", ")}
        </td>
        <td>
          Edit
        </td>
        <td>
          Delete
        </td>
      </tr>
    `

    tbodyDownload.innerHTML += `
      <tr>
        <td>
          ${v.country_name}
        </td>
        <td>
          ${v.service}
        </td>
        <td>
          ${v.service_type}
        </td>
        <td>
          ${v.price}
        </td>
        <td>
          ${v.currency}
        </td>
        <td>
          ${v.add_documents.join(", ")}
        </td>
      </tr>
    `

  })

}

popuTable()

var wb = XLSX.utils.table_to_book(document.getElementById('downloadable-table'), {sheet:"all services"});
var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});

var wb = XLSX.utils.table_to_book(document.getElementById('format-table'), {sheet:"all services"});
var format = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});

function s2ab(s) {
  var buf = new ArrayBuffer(s.length);
  var view = new Uint8Array(buf);
  for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
  return buf;
}
$("#download-excel").click(function(){
  saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'all-services.xlsx');
});

$("#download-format").click(() => {
  saveAs(new Blob([s2ab(format)],{type:"application/octet-stream"}), 'format.xlsx');
})

const inputExcel = document.querySelector("#input-excel")
$("#upload-btn").mousedown(() => {
  inputExcel.click()
})

let uploadCompare = []

tableData.map((v, i) => {
  uploadCompare[i] = {
    add_documents: v.add_documents.sort(),
    country_name: v.country_name,
    currency: v.currency,
    price: v.price,
    service: v.service,
    service_type: v.service_type
  }
  // uploadCompare[i].v = 
})


let notify

let newServices = []

let countrySelect = document.querySelector("#locality-dropdown")

const country = './API/country.php';
fetch(country).then(
  function (response)
  {
    if (response.status !== 200)
    {
      console.warn('Looks like there was a problem. Status Code: ' +
        response.status);
      return;
    }
    response.json().then(function (data) {
      let option;
      var selected_idx = 0;
      for (let i = 0; i < data.length; i++) {
        option = document.createElement('option');
        option.text = data[i].country_name;
        option.value = data[i].id;
        dropdown.add(option);
        if(data[i].id == edit_country)
        {
          selected_idx = i;
        }
      }
      dropdown.selectedIndex = selected_idx;
      setDDData(1)
    });
  }
  )
.catch(function (err) {
  console.error('Fetch Error -', err);
});

const country = './API/country.php';
let currency = document.getElementById('currency');
currency.lenght = 0;
let currencytype = document.createElement('option');
if(edit_currency == 0)
{
  currencytype.text = 'Select Currency';
  currencytype.value = "";
  currency.add(currencytype);
  currency.selectedIndex = 0;
}
fetch(country)
.then(
  function (response) {
    if (response.status !== 200) {
      console.warn('Looks like there was a problem. Status Code: ' +
        response.status);
      return;
    }

    response.json().then(function (data) {
      let option;
      var selected_idx = 0;
      for (let i = 0; i < data.length; i++) {
        option = document.createElement('option');
        option.text = data[i].currency;
        option.value = data[i].id;
        currency.add(option);
        if(data[i].id == edit_currency)
        {
          selected_idx = i;
        }
      }
      currency.selectedIndex = selected_idx;

      setDDData(1)
    });
  }
  )
.catch(function (err) {
  console.error('Fetch Error -', err);
});

const validateNewServices = () => {
  console.log(countries)
  newServices = [
    {
      country_name: "india"
    }
  ]
  console.log(newServices)
  newServices.forEach(v => {
    countries.forEach((v2, i) => {
      // console.log(v2.country_name.toLowerCase() == "india")
      if(v2.country_name.toLowerCase() == v.country_name) {
        console.log("found", v.country_name, v2.id)
        return
      } 

      if(i == countries.length - 1) {
        console.log("not found")
      }
    })
  })
}

const compareWithExistingData = () => {
  newRows.map(v => {
    for (let i = 0; i < uploadCompare.length; i++) {
      if (JSON.stringify(v).toLocaleLowerCase() == JSON.stringify(uploadCompare[i]).toLocaleLowerCase()) {
        return
        console.log("running ", i)
      } else if (i == uploadCompare.length - 1) {
        newServices.push(v)
      }

    }
    // console.log("running2 ", v)
  })
  console.log(newServices)
  // validateNewServices()
  newServices = []
}

// extractData from table, table to json
var newRows = [];
const extractData = () => {
  // notify.update('title', "extracting data")
  // Loop through grabbing everything
  var $headers = $("#upload-excel-table th");
  var $rows = $("#upload-excel-table tr").each(function(index) {
    $cells = $(this).find("td");
    newRows[index] = {};
    $cells.each(function(cellIndex) {
      try {
        newRows[index][$($headers[cellIndex]).html().trim()] = $(this).html().trim();
      } catch(err) {
        if (err.name == "TypeError") {
          $.notify({
            // options
            icon: 'error',
            message: "Wrong format! Extra columns are not allowed!"
          },{
            // settings
            type: 'danger'
          })
          console.log("Wrong format! Extra columns are not allowed!")
          console.log(err)
        } else {
          console.log("Unexpected error")
          console.log(err)
        }
        throw err
      }
    });    
  });
  
  newRows.shift()
  newRows.shift()
  
  let ordered = {}
  let allOrdered = []
  newRows.forEach((v, i) => {
    ordered = {}
    Object.keys(newRows[i]).sort().forEach(function(key) {
      // console.log(key)
      ordered[key] = newRows[i][key];
    });
    allOrdered.push(ordered)
  })

  newRows = allOrdered

  newRows.forEach(v => {
    v.add_documents = v.add_documents.split(",").map(v2 => v2.trim()).sort()
  })
  compareWithExistingData()
}


$('#input-excel').change(function(e){
  let file = document.querySelector("#input-excel").value.split(".")
  if (file[file.length - 1].toLowerCase() != "xlsx") {
    $.notify({
      // options
      icon: 'error',
      message: `Only 'xlsx' is accepted. You uploaded ${file[file.length - 1]}`
    },{
      // settings
      type: 'danger'
    })
    return
  }
  // notify = $.notify({
  //   // options
  //   icon: 'error',
  //   message: ``
  // },{
  //   // settings
  //   type: 'info'
  // });
  // notify.update('title', "uploading xlsx")
  // notify.update('message', '...');
  var reader = new FileReader();
  reader.readAsArrayBuffer(e.target.files[0]);
  reader.onload = function(e) {
          var data = new Uint8Array(reader.result);
          var wb = XLSX.read(data,{type:'array'});
          // console.log(wb)
          var htmlstr = XLSX.write(wb,{sheet:"all services", type:'binary',bookType:'html'});
          var elem = document.querySelector('#upload-excel-table tbody');
          elem.parentNode.removeChild(elem);
          $('#upload-excel-table')[0].innerHTML += htmlstr;

          extractData()

  }
});

// document search
let documentNames
const documentNameDD = document.querySelector("#document-name")
const multipleSelectDD = document.querySelector(".multiple-select-dd .select")
const searchField = document.querySelector(".search-field")

var selected = [];

const setDocumentNames = () => {
  let options = ""
  multipleSelectDD.innerHTML = ""
  let lowercaseDocumentName = searchField.value.toLowerCase()

  documentNames.map((v, i) => {
    let docSearchMatch = v.document_name.toLowerCase().search(lowercaseDocumentName) == 0
    docSearchMatch ? options += `<div id="${v.id}" data-index="${i}" class="bg-secondary text-light" ><span>${v.document_name}</span><i data-index="${i}" style="color: white;" class="material-icons remove">${v.active ? "check_box" : "check_box_outline_blank"}</i></div>` : false
  })
  multipleSelectDD.innerHTML += options
}

searchField.onkeyup = () => {
  setDocumentNames()
}

fetch("./API/assigndocuments.php")
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
  if (e.target.classList.contains("remove")) {
    documentNames[e.target.getAttribute("data-index")].active = false
  }
  selectedFields()
  setDocumentNames()
}

const selectedFields = () => {
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
  documentNames[target].active = !documentNames[target].active
  selectedFields()
  setDocumentNames()
}



// let data = {}

const createSubmit = document.querySelector('#ajax'),
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
        getAllAssignService(`./API/viewassignedservice.php`)
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
      let run = true
      inputFieldsArray ? inputFieldsArray.map((value) => {
        jsonData[value.name] = value.value
      }) : false

      // for (var option of document.getElementById('document-name').options) {
      //   if (option.selected) {
      //     selected.push(option.value);
      //   } 
      // }
      console.log(selected)
      jsonData["document_names"] = selected

      selectArray ? selectArray.map(value => {
        jsonData[value.name] = value.value
      }) : false
      if (run === true) {
        sendRequest(url)
      }
      jsonData = {}
    }
  }
}

createSubmit.addEventListener("submit", submit("./API/createservice.php"))



        //var e = document.getElementById("ClientName");
        //var strUser = e.options[e.selectedIndex].value;
        //var e1 = document.getElementById("locality-dropdown");
        //var Country = e1.options[e1.selectedIndex].value;
        var e2 = document.getElementById("select_service_type");
        var ser = e2.options[e2.selectedIndex].value;
        var dob2 = document.getElementById("Service Name");
        var dob = dob2.value;
        //var opt2 = document.getElementById("SLA");
        //var optt = opt2.value;
        //var e3 = document.getElementById("select_service_name");
        //var opt = e3.options[e3.selectedIndex].value;
 //Add        

function TestIT2(){
    ser = e2.options[e2.selectedIndex].value; 
    dob = dob2.value;
        console.log("test it function 1");
        $.post("./API/createService.php",
    {
      Action : "Add",
      ServiceT: ser,
      servicename: dob      
    },
    function(data,status){
     //   $("#table").html(data);
   // document.getElementById("table").innerHTML = data;
    console.log("a"+data);
     //alert("Data: " + data + "\nStatus: " + status);
    });
   // T2();
   T3();
    }
/*function editRow(){
var db1 = $("#getv").val(); //$('#upd1').attr('onclick', 'editUpdate(1,'+db1+')');
editUpdate(1,db1);
}*/
    
function T3(){
    ser = e2.options[e2.selectedIndex].value;
    dob = dob2.value;

         $.post("./API/createService.php",
    {
       Action : "Display",
      ServiceT: ser,
      servicename: dob   
    },
    function(data,status){
        $("#table").html(data);
    document.getElementById("table").innerHTML = data;
    console.log("r"+data);
    //alert("Data: " + data + "\nStatus: " + status);
    });
}
function d1(id){
   
        $.post("./API/AddDocument.php",
    {
       service: id   
    },
    function(data,status){
     //   $("#table").html(data);
    //document.getElementById("table").innerHTML = data;
    console.log(" status :"+data);
    //T3();
    });  
}
function deleteRow(id){
        ser = e2.options[e2.selectedIndex].value;
    dob = dob2.value;
    var answer = window.confirm("Are you sure you want to delete this service?")
if (answer) {
        $.post("./API/createService.php",
    {
      Action: "delete",
      service: id,
      ServiceT: ser,
      servicename: dob      
    },
    function(data,status){
     //   $("#table").html(data);
    //document.getElementById("table").innerHTML = data;
    console.log("delete status :"+data);
    T3();
    });
}
else {
    T3();
}

     
}
function editUpdate(id,dbid){
var dat = [];
$('#tr'+id+' td').each(function(){
      var id = $(this).attr("id");
      console.log("id  :"+id);
      if (typeof id === 'undefined') {console.log(" undefined :"+id);}else{
           if(id=='cn'){dat[0]=$(this).html();} else if(id=='co'){dat[1]=$(this).html();}
           else if(id=='countryl'){//dat[2]=$(this).html();
             dat[2]= $("#locality-dropdown").val();
            }else if(id=='sn'){dat[3]=$(this).html();}
           else if(id=='sla'){dat[4]=$(this).html();}           
         }
    
});
  console.log("dat  :"+dat);
console.log("Select Edit :"+"#tr"+id+" td");
 var answer = window.confirm("Are you sure you want to save this data?")
if (answer) {
         $.post("./API/createService.php",
    {
      Action: "edit",
      id: dbid,
      Client: dat[0],
      Country: dat[1], 
      ServiceT: dat[2],
      ServiceN: dat[3],
      Price: dat[4]       
    },
    function(data,status){
     //   $("#table").html(data);
    //document.getElementById("table").innerHTML = data;
    console.log("update status :"+data);
    //T3();
    });
}
else {
    T3();
}
/*
$('#tr'+id+' td').each(function(){
    $(this)
       // .attr("col", $(this).index() + 1),
       // .attr("row", $(this).parent().index() + 1);
       . removeAttr("contenteditable");
});
*/
}