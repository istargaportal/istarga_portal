console.log("working")

let checkboxes = document.querySelectorAll("#ajax input[type='checkbox']"),
  checkboxArray = [...checkboxes],
  select = document.querySelectorAll('#ajax select'),
  selectArray = [...select],
  selectOne = document.querySelector('#ajax select')
  // selectArray = [...select]

let data = {}

const sendRequest = (url) => {
  fetch(url, {
      method: 'POST',
      body: JSON.stringify(data),
    })
    .then(response => response.text())
    .then(data => {
      console.log('Success:', data);
    })
    .catch((error) => {
      console.error('Error:', error);
    });
}

let optionLength = document.querySelectorAll("#ajax select option").length

const submit = (url) => {
  return e => {
    e.preventDefault()
    console.log('hello')
    console.log(optionLength)

    for(let i = 1; i < optionLength + 1; i++) {
      if (selectOne.value == "op" + i) {
        let checkboxes = document.querySelectorAll("#ajax #div" + i + " input[type='checkbox']"),
          checkboxArray = [...checkboxes]
          checkboxArray ? checkboxArray.map((value) => {
            let checked = 0
            console.log(value.checked)
            if (value.checked === true) {
              checked = 1
            }
            data[value.name] = checked
          }) : false

          selectArray ? selectArray.map(value => {
            data[value.name] = value.value
          }) : false

          console.log(data)
          sendRequest(url)
          data = {}
      }
    }
    
    // inputCurrency ? data["currency"] = inputCurrency.value : false
    // textarea ? data["textarea"] = textarea.value : false

  }
}


const mandatoryFieldsManagerForm = document.querySelector("#ajax")
mandatoryFieldsManagerForm && mandatoryFieldsManagerForm.addEventListener('change', submit('https://www.bgvhwd.xyz/Project_files/API/settings.php'))

console.log("working all")