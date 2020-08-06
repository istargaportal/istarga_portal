function formReset() {
  document.getElementById("ajax").reset();
  $('select').prop('selectedIndex', 0);
}

const addModifyUserSubmit = document.querySelector('#ajax button[type="submit"]'),
  inputFields = document.querySelectorAll('#ajax input:not([type="radio"] )'),
  inputFieldsArray = [...inputFields],
  select = document.querySelectorAll('#ajax select'),
  selectArray = [...select]


let data = {}

const sendRequest = (url) => {
  //console.log(data);
  //console.log(url);
  fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
  })
    .then(response => {
      //console.log("done");
      console.log(response.text());
      alert("User Created");
      popuTable();
      formReset();
    })
    .catch((error) => {
      alert("Some error occured, check your internet connection!");
      console.error('Error:', error);
    });
}

function validateEmail(email) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase())
}

const submit = (url) => {
  return e => {
    e.preventDefault()
    let run = true
    inputFieldsArray ? inputFieldsArray.map((value) => {
      if (run === true) {
        if (value.value.trim().length == 0) {
          alert('all fields are required')
          run = false
        }
        data[value.name] = value.value
      }
    }) : false
    selectArray ? selectArray.map(value => {
      //console.log(value.value);
      if (run === true) {
        if (value.value == "null" || value.value == undefined || value.value == null) {
          alert('all fields are required')
          run = false
        } else {
          data[value.name] = value.value
        }
      }
    }) : false

    if (run === true) {
      let passwordEmail = document.querySelector("#passwordMailTo").value
      if (!validateEmail(passwordEmail)) {
        alert("Please enter a valid email")
        run = false
      }
    }

    if (run === true) {
      //console.log("in")
      sendRequest("./API/addUser.php");
    }
    data = {}
  }
}

addModifyUserSubmit && addModifyUserSubmit.addEventListener('click', submit('API/addUser.php'))


//console.log('add modify user working all') 

// Table





