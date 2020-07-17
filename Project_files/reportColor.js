
console.log('working')

let data = {}

let clients
const clientName = document.querySelector('#ClientName')

fetch('https://www.bgvhwd.xyz/Project_files/API/viewclient.php')
.then(response => response.json())
.then(data => {
  clients = data
  // console.log('clients', clients)
    clients.map(v => {
      // code change
      clientName.innerHTML += `<option value="${v.Id}" class="bg-secondary text-light" >${v.Client_Name}</option>`
    })
  });
