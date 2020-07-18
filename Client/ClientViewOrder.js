console.log('working code')
let searchCriteria

let modifyClientData
let orderStatus
let dateOne

let data = {}
let newData2
let change = false
// live search
let clientCriteria
const service = document.querySelector("#Service")
const getModifyClientData = () => {
  let lowerCaseClientCriteria = searchCriteria.value.toLowerCase()
  let newData
  // change ? null : newData2 = modifyClientData 
  if (clientCriteria == "First_Name_Last_Name") {
    newData = modifyClientData.filter(v => {
      console.log(v)
      let firstName = v["first_Name"].toLowerCase().search(lowerCaseClientCriteria) == 0
      let lastName = v["last_Name"].toLowerCase().search(lowerCaseClientCriteria) == 0
      return firstName || lastName
    })
  } else {
    console.log('key up 2')
    console.log(clientCriteria)
    console.log(modifyClientData[0][clientCriteria])
    newData = modifyClientData.filter(v => {
      let clientCriteriaMatch
      v[clientCriteria] != null ? clientCriteriaMatch = v[clientCriteria].toLowerCase().search(lowerCaseClientCriteria) == 0 : null
      return clientCriteriaMatch
    })
  }

  updateModifyClientData(newData)
  
}

service.addEventListener("change", (e) => {
  clientCriteria = e.target.value
  console.log(clientCriteria)

  if (clientCriteria == "order_creation_date_time" || clientCriteria == "Order_Completion_Date") {
    dateOne = document.querySelector('input#dateofbirth')
    console.log(dateOne)
    return dateOne.addEventListener("change", () => {
      searchCriteria = dateOne 
      return getModifyClientData()
    })
  }

  if (clientCriteria == "Order_Status") {
    orderStatus = document.querySelector('#OrderStatus')
    console.log('order Status')
    return orderStatus.addEventListener("change", () => {
      searchCriteria = orderStatus
      console.log(searchCriteria)
      return getModifyClientData()
    })
  }

  searchCriteria = document.querySelector('#SearchCriteria')
  searchCriteria && searchCriteria.addEventListener('keyup', getModifyClientData)
})

const hiddenInput = document.querySelector("#user_id")


const getAllClientData = () => {
  // fetch("./API/viewclienttable.php", {
  //   method: 'POST',
  //   body: JSON.stringify({"client_id": hiddenInput.value}),
  // })
  // .then(response => response.json())
  // .then(data => {
  //   console.log(data)
  //   modifyClientData = data
  //   updateModifyClientData(modifyClientData)
  //   console.log('Success:', data);
  // })
  // .catch((error) => {
  //   console.error('Error:', error);
  // });

  var load_condition = "load_all_clients";
  $.ajax({
    type:'POST',
    url:'./API/viewclienttable.php',
    data:{load_condition},
    success:function(html){
      $('#table').html(html);
      load_datatable();
    }
  });
}
getAllClientData()

// getModifyClientData(0)

const tbody = document.querySelector("#table-body")

const updateModifyClientData = (d) => {
  console.log('update', d)
  tbody ? tbody.innerHTML = '' : false
  Array.isArray(d) ? d.map((value, i) => {
    tbody ? tbody.innerHTML += `<tr>
    <td class="tablehead1">
      ${i + 1}
    </td>
    <td class="tablehead1">
      ${value["first_Name"]} ${value["last_Name"]} 
    </td>
    <td class="tablehead1">
      ${value["internal_reference_id"]}
    </td>
    <td class="tablehead1">
      ${value["email_id"]}
    </td>
    <td class="tablehead1">
      ${value["order_creation_date_time"]}
    </td>
    <td class="tablehead1">
      ${value["order_completion_date"]}
    </td>
    <td class="tablehead1">
      ${value["Order_Status"] == 0 ? "pending" : value["Order_Status"] == 1 ? "Started" : value["Order_Status"] == 2 ? "Completed" : null}
    </td>
    <td class="text-primary tablehead1">
      <ul style="list-style: none;">
        <li class="nav-item dropdown">
          <a
            class="nav-link"
            href="javascript:;"
            id="navbarDropdownProfile"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <i  class="material-icons icon">person</i>
            <div class="ripple-container"></div
          ></a>
          <div
            class="dropdown-menu dropdown-menu-left"
            aria-labelledby="navbarDropdownProfile" 
          >
            <a
              id="${value.id}"
              class="dropdown-item edit"
              href="./addClient.html"
              >Edit</a
            >
            <a class="dropdown-item delete" href="#" id="${value.id}">Delete</a>
          </div>
        </li>
      </ul>
    </td>
  </tr>` : false

  }) : false
}


const sendRequest = (url) => {
  fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
  })
  .then(response => response.json())
  .then(data => {
    console.log('Success:', data);
  })
  .catch((error) => {
    console.error('Error:', error);
  });
}

tbody ? tbody.onclick = (e) => {
  if (e.target.classList.contains('delete')) {
    e.preventDefault()
    data["id"] = e.target.id
    data["action"] = "delete"
    sendRequest("./API/editOrder.php")
  }
  data = {}
  if (e.target.classList.contains('edit')) {
    e.preventDefault()    
    clientEditInfo = modifyClientData.find(client => client.Id == e.target.id)
    localStorage.setItem("data", JSON.stringify(clientEditInfo))
    window.location.href = `editOrder.php?id=${e.target.id}`
  }
} : false

console.log("working 2")

// fetch("https://www.bgvhwd.xyz/Project_files/API/viewclient.php")
//     .then(res => res.json())
//     .then(data => {
//         console.log("api")
//         data.map((v, i) => {
//             document.querySelector("#client-option-live-search").innerHTML += `
//             <option>link ${i}</option>
//           `
          
//         })
//     })
//     .catch(err => console.log(err))


// async () => await Sleep(1000)
// function fetchOHLC(yUrl){
//   return fetch(yUrl)
//   .then(response => response.json())
//   .then(function(response) {
//           // alert(JSON.stringify(response.query));
//     // console.log(response)
//     console.log("api")
//     // document.body.innerHTML += '<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>'
//     // document.body.innerHTML += '<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>'
//   return response;

//   })
//   .catch(function(error) {
//       console.log(error);
//   });    
// }

// fetchOHLC("https://www.bgvhwd.xyz/Project_files/API/viewclient.php")


  // async function fetchOHLC(yUrl) {
  //   try {
  //     const res = await ( await fetch(yUrl)
  //     .then(res => res.json()) 
  //     .then(data => console.log(data))
  //     )
      
  //   } catch(e) { console.log(e); }
  // }
  
  // (async function () {
  //   const fetchData = await fetchOHLC("https://www.bgvhwd.xyz/Project_files/API/viewclient.php");
  //   // console.log(fetchData)
  // })()

console.log("working all") 

function delete_order(id)
{
  var r = confirm('Are you sure to delete this order!')
  if(r == true)
  {
    $.ajax({
      type:'POST',
      url:'./API/delete_order.php',
      data:{id},
      success:function(html){
        if(html == "success")
        {
          getAllClientData();
        }
        else
        {
          alert('Error occurred!');
        }
      }
    });
  }
}