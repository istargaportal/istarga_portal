let eye = document.querySelector(".eye")
let passwordInput = document.querySelector("[name='Password']")
eye.onclick = () => {
  if (passwordInput.type == "text") {
    passwordInput.type = "password"
    eye.innerHTML = "<i class='fas fa-eye'></i>"
  } else { 
    passwordInput.type = "text"
    eye.innerHTML = "<i class='fas fa-eye-slash'></i>"
  }
}

const addClientSubmit = document.querySelector('#ajax button'),
inputFields = document.querySelectorAll('#ajax input:not([type="radio"] )'),
inputFieldsArray = [...inputFields],
inputRadios = document.querySelectorAll('#ajax input[type="radio"]'),
inputRadiosArray = [...inputRadios],
inputCheckbox = document.querySelectorAll('#ajax input[type="checkbox"]'),
inputCheckboxArray = [...inputCheckbox], 
select = document.querySelectorAll('#ajax select'),
selectArray = [...select],
inputCurrency = document.querySelector('#ajax select[name="currency"]')

/* Get Country*/
let dropdown = document.getElementById('locality-dropdown');
dropdown.length = 0;

let defaultOption = document.createElement('option');

var edit_country = $('#edit_country').val() || 0;
if(edit_country == 0)
{
  defaultOption.text = 'Select Country';
  defaultOption.value = '0';
  dropdown.add(defaultOption);
  dropdown.selectedIndex = 0;
}

const country = './API/country.php';
fetch(country).then(
function (response) {
  if (response.status !== 200) {
    console.warn('Looks like there was a problem. Status Code: ' +
      response.status);
    return;
  }
      // Examine the text in the response
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

//Get Currency
let currency = document.getElementById('currency');
currency.lenght = 0;
let currencytype = document.createElement('option');
var edit_currency = $('#edit_currency').val() || 0;
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

      // Examine the text in the response
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


//get service type
let servicetype = document.getElementById('select_state');
servicetype.length = 0;

let defaultservicetype = document.createElement('option');
defaultservicetype.text = 'Select State';
defaultservicetype.value = "0";

servicetype.add(defaultservicetype);
servicetype.selectedIndex = 0;

function getservice(x) {
  var edit_state = $('#edit_state').val() || 0;
  const id = {
    country_id: x,
  };
  fetch('./API/state.php', {
    method: 'post',
    body: JSON.stringify(id),
    headers: {
      'Content-type': 'application/json'
    }
  }).then(function (response) {
    return response.text();
  }).then(function (text) {

    let stat = JSON.parse(text);
    var wrap = document.getElementById('select_state')
    while (wrap.firstChild) wrap.removeChild(wrap.firstChild)
      let option;
    var selected_idx = 0;

    for (let i = 0; i < stat.length; i++) {
      option = document.createElement('option');
      option.text = stat[i].service_type;
      option.value = stat[i].id;
      servicetype.add(option);
      if(stat[i].id == edit_state)
      {
        selected_idx = i;
      }
    }
    servicetype.selectedIndex = selected_idx;

  }).catch(function (error) {
    console.error(error);
  })

}

let servicename = document.getElementById('select_city');
servicename.length = 0;

let defaultservicename = document.createElement('option');
defaultservicename.text = 'Select City';
defaultservicename.value = '0';

servicename.add(defaultservicename);
servicename.selectedIndex = 0;

function getservicename(x) {
  var edit_city = $('#edit_city').val() || 0;
  const id = {
    service_type_id: x,
  };
  fetch('./API/cities.php', {
    method: 'post',
    body: JSON.stringify(id),
    headers: {
      'Content-type': 'application/json'
    }
  }).then(function (response) {
    return response.text();
  }).then(function (text) {
    // console.log(text);

    let stat = JSON.parse(text);
    var wrap = document.getElementById('select_city')
    while (wrap.firstChild) wrap.removeChild(wrap.firstChild)
      let option;
    var selected_idx = 0;
    for (let i = 0; i < stat.length; i++) {
      option = document.createElement('option');
      option.text = stat[i].service_name;
      option.value = stat[i].id;
      servicename.add(option);
      if(stat[i].id == edit_city)
      {
        selected_idx = i;
      }
    }
    servicename.selectedIndex = selected_idx;

  }).catch(function (error) {
    console.error(error); 
  })

}

let data = {}

let modal = document.getElementById("exampleModal")
let modalOkBtn = document.getElementById("modal-ok-btn") 
let modalCloseButton = document.querySelector(".close")

let modalLaunchButton = document.querySelector(".launch")

const sendRequest = (url) => {
  fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
  })
  .then(response => response.text())
  .then(data => {
    $('#modal_loading').css('display', 'block');
    if (url === "./API/addClient.php" && data.trim() == 'inserted' || data.trim() == 'updated')
    {
      if(data.trim() == 'inserted')
      {
        $('#modal_loading').css('display', 'none');
        $('#exampleModalLabel').html('Client added successfully');
      }
      if(data.trim() == 'updated')
      {
        $('#modal_loading').css('display', 'none');
        $('#exampleModalLabel').html('Client updated successfully');
      }
        //modal show up
        // modal.setAttribute("aria-hidden", "false")
        // modal.style.display = "block"
        // modal.classList.add("show");
        // modalOkBtn.onclick = () => {
        //   window.location.href = "modifyClient.php"  
        // }
        modalLaunchButton.click()
        window.onclick = () => window.location.href = "modifyClient.php"  
      }
      if(data.trim() == 'error')
      {
        alert('Error occurred');
        $('#modal_loading').css('display', 'none');
      }
    })
  .catch((error) => {
    console.error('Error:', error);
  });
}


const submit = (url) => {
  return e => {
    e.preventDefault()
    inputFieldsArray ? inputFieldsArray.map((value) => {
      if (value.value.trim().length == 0) {
        console.log(value)
          // alert('all fields are required')
        }
        data[value.name] = value.value

      }) : false
    inputRadiosArray ? inputRadiosArray.map((value) => {
      let checked = 0

      if (value.checked === true) {
        checked = 1
      }
      data[value.name] = checked
    }) : false
    inputCheckboxArray ? inputCheckboxArray.map((value) => {
      let checked = 0

      if (value.checked === true) {
        checked = 1
      }
      data[value.name] = checked
    }) : false
    selectArray ? selectArray.map(value => {
      data[value.name] = value.value
    }) : false
    inputCurrency ? data["currency"] = inputCurrency.value : false
    sendRequest(url)
    
    data = {}
  }
}

const addClientForm = document.querySelector("#ajax")
// addClientSubmit && addClientSubmit.addEventListener('click', submit('API/addClient.php'))
addClientForm && addClientForm.addEventListener('submit', submit('./API/addClient.php'))


const getElement = (elementSelector) => {
  return document.querySelector(`[name='${elementSelector}']`)
}

// when add user go to addClient through edit

// if () {

// }

if (window.location.pathname === "/Project_files/addClient.php") {
  var url = new URL(window.location.href);
  let id = url.searchParams.get('id')
  clientEditInfo = JSON.parse(localStorage.getItem("data"))

  if (id) {

    const id = {
      country_id: clientEditInfo["country"],
    };
    fetch('./API/state.php', {
      method: 'post',
      body: JSON.stringify(id)
    }).then(function (response) {
      return response.text();
    }).then(function (text) {
      //	console.log(text);

      let stat = JSON.parse(text);
      var wrap = document.getElementById('select_state')
      while (wrap.firstChild) wrap.removeChild(wrap.firstChild)
        let option;

      for (let i = 0; i < stat.length; i++) {
        option = document.createElement('option');
        option.text = stat[i].service_type;
        option.value = stat[i].id;
        servicetype.add(option);
      }
      getElement("select_state").value = clientEditInfo["State"]

    }).catch(function (error) {
      console.error(error);
    })

    const id2 = {
      service_type_id: clientEditInfo["State"],
    };
    fetch('./API/cities.php', {
      method: 'post',
      body: JSON.stringify(id2)
    }).then(function (response) {
      return response.text();
    }).then(function (text) {
      // console.log(text);

      let stat = JSON.parse(text);
      var wrap = document.getElementById('select_city')
      while (wrap.firstChild) wrap.removeChild(wrap.firstChild)
        let option;

      for (let i = 0; i < stat.length; i++) {
        option = document.createElement('option');
        option.text = stat[i].service_name;
        option.value = stat[i].id;
        servicename.add(option);
      }
      
      getElement("select_city").value = clientEditInfo["city"]
    }).catch(function (error) {
      console.error(error); 
    })
    // getservicename()
  }
}


const setDDData = (ddData) => {
  if (window.location.pathname === "/Project_files/addClient.php") {
    console.log("setDDData", ddData)
    console.log("ok")
    var url = new URL(window.location.href);
    let id = url.searchParams.get('id')
    if (id) {
      clientEditInfo = JSON.parse(localStorage.getItem("data"))
      
      // automatic fill up input fields

      if(ddData === 1) {
        getElement("locality-dropdown").value = clientEditInfo["country"]
          // console.log(getElement("locality-dropdown").value, )
          // console.log(object)
          getElement("currency").value = clientEditInfo["Currency"]
          // console.log(object)
          return
        }
        console.log("not returned")
        getElement("Client Name").value = clientEditInfo["Client_Name"]
        getElement("Client Code").value = clientEditInfo["Client_Code"]
        getElement("Client SPOC").value = clientEditInfo["Client_SPOC"]
        getElement("Zip Code").value = clientEditInfo["Zip_Code"]
        getElement("Applicant Response Time").value = clientEditInfo["App_Response_Time"]
        getElement("Invoice Address Details").value = clientEditInfo["Inv_Address"]
        getElement("Invoice Bank Detail").value = clientEditInfo["Inv_Bank"]
        getElement("Invoice Code").value = clientEditInfo["Inv_Code"]
        getElement("Invoice Bank Detail").value = clientEditInfo["Inv_Bank"]
        getElement("Email ID").value = clientEditInfo["email"]
        getElement("Invoice Bank Detail").value = clientEditInfo["Inv_Bank"]
      // getElement("Invoice Bank Detail").value = clientEditInfo["Inv_Bank"]
      getElement("dateofbirth").value = clientEditInfo["DOB"]
      

      // inputFieldsArray.map((inputField) => {
      //   inputField.value = clientEditInfo[inputField.name]
      // })
      // inputRadiosArray.map((inputRadio) => {
      //   inputRadio.checked = (clientEditInfo[inputRadio.name] == 1) ? true : false
      // })
      // inputCurrency.value = clientEditInfo[inputCurrency.name]
      addClientSubmit.innerHTML = "Update"
      data[id] = id
    }
  }
}
setDDData(0)

// const addBankDetails = document.querySelector('#ajax')
// addBankDetails && addBankDetails.addEventListener('submit', submit("API/addBankDetails.php"))

// const submitBankDetails = (e) => {
//   e.preventDefault()

//   let run = true
//   inputFieldsArray.map((value) => {
//     if (run === true) {
//       if (value.value.trim().length == 0) {
//         alert('all fields are required')
//         run = false
//       }
//       // data.push({
//       //   [value.name]: value.value
//       // })
//       data[value.name] = value.value
//     }
//   })
//   if (run === true) {
//     sendRequest('APi/addBankDetails.php')
//   }

//   data = {}
// }