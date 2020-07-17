let dropdown2 = document.getElementById('Client Name');
dropdown2.length = 0;

let defaultOption2 = document.createElement('option');
defaultOption2.text = 'Select Name';
defaultOption2.value = '0';

dropdown2.add(defaultOption2);
dropdown2.selectedIndex = 0;

const Client_Name = 'https://www.bgvhwd.xyz/Project_files/API/viewclient.php';

fetch(Client_Name)
  .then(
    function (response) {
      //console.log("hi");
      if (response.status !== 200) {
        console.warn('Looks like there was a problem. Status Code: ' +
          response.status);
        return;
      }

      // Examine the text in the response
      response.json().then(function (data) {
        let option;

        for (let i = 0; i < data.length; i++) {
          option = document.createElement('option');
          option.text = data[i].Client_Name;
          option.value = data[i].Id;
          dropdown2.add(option);
        }
      });
    }
  )
  .catch(function (err) {
    console.error('Fetch Error -', err);
  });


/* Get Country*/
let dropdown = document.getElementById('locality-dropdown');
dropdown.length = 0;

let defaultOption = document.createElement('option');
defaultOption.text = 'Select Country';
defaultOption.value = '0';

dropdown.add(defaultOption);
dropdown.selectedIndex = 0;

const country = 'https://www.bgvhwd.xyz/Project_files/API/country.php';

fetch(country)
  .then( 
    function (response) {
      //  console.log("hi");
      if (response.status !== 200) {
        console.warn('Looks like there was a problem. Status Code: ' +
          response.status);
        return;
      }

      // Examine the text in the response
      response.json().then(function (data) {
        let option;

        for (let i = 0; i < data.length; i++) {
          option = document.createElement('option');
          option.text = data[i].country_name;
          option.value = data[i].id;
          dropdown.add(option);
        }
      });
    }
  )
  .catch(function (err) {
    console.error('Fetch Error -', err);
  });


let LOB = document.getElementById('LOB');
LOB.length = 0;

let LOBdefault = document.createElement('option');
LOBdefault.text = 'Select LOB';
LOBdefault.value = '0';

LOB.add(LOBdefault);
LOB.selectedIndex = 0;
const lob = "";
fetch(lob)
  .then(function (response) {
    //console.log("hi");
    if (response.status !== 200) {
      console.warn('Looks like there was a problem. Status Code: ' +
        response.status);
      return;
    }

    // Examine the text in the response
    response.json().then(function (data) {
      let option;

      for (let i = 0; i < data.length; i++) {
        option = document.createElement('option');
        option.text = data[i].country_name;
        option.value = data[i].id;
        LOB.add(option);
      }
    });
  })
  .catch(function (err) {
    console.error('Fetch Error -', err);
  });


const serviceType = document.querySelector("#select_service_type")
const setServiceName = () => {
  let options = ``
  serviceName.map(v => {
    options += `<option value="${v.id}"  class="bg-secondary text-light" >${v.service_name}</option>`
  })
  serviceType.innerHTML += options
  // document.querySelector("body").innerHTML += `<script src="assets/js/material-dashboard.js?v=2.1.0"></script>`
  // const serviceNameDD = document.querySelector("select.service-name-dd")
  // serviceNameDD.innerHTML = ``
}

fetch("https://www.bgvhwd.xyz/Project_files/API/servicename.php")
  .then(response => response.json())
  .then(data => {
    serviceName = data
    console.log('service names', serviceName) 
    setServiceName()
  })
  .catch((error) => {
    console.error('Error:', error);
  });

console.log("working all")