console.log('working')

const inputFields = document.querySelectorAll('#ajax input:not([type="radio"] )'),
  inputFieldsArray = [...inputFields],
  inputRadios = document.querySelectorAll('#ajax input[type="radio"]'),
  inputRadiosArray = [...inputRadios],
  inputCheckbox = document.querySelectorAll('#ajax input[type="checkbox"]'),
  inputCheckboxArray = [...inputCheckbox],
  select = document.querySelectorAll('#ajax select'),
  selectArray = [...select],
  inputCurrency = document.querySelector('#ajax select[name="currency"]'),
  textarea = document.querySelector("#ajax textarea")


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
    textarea ? data["textarea"] = textarea.value : false
    sendRequest(url)

    data = {}
  }
}


const emailTriggerForm = document.querySelector("#ajax")
emailTriggerForm && emailTriggerForm.addEventListener('submit', submit('https://www.bgvhwd.xyz/Project_files/API/settings.php'))