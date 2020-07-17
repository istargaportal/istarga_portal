const totalCases = document.querySelector("#total-cases p")
const totalCasesUpdated = document.querySelector("#total-cases .stats")
const totalResolved = document.querySelector("#total-resolved p")
const totalResolvedUpdated = document.querySelector("#total-resolved .stats")
const totalInProgress = document.querySelector("#total-in-progress p")
const totalInProgressUpdated = document.querySelector("#total-in-progress .stats")

let dashboardData 

const hiddenInput = document.querySelector("#client_id")

function timeSince(date) {

  var seconds = Math.floor((new Date() - date) / 1000);

  var interval = Math.floor(seconds / 31536000);

  if (interval > 1) {
    return interval + " years";
  }
  interval = Math.floor(seconds / 2592000);
  if (interval > 1) {
    return interval + " months";
  }
  interval = Math.floor(seconds / 86400);
  if (interval > 1) {
    return interval + " days";
  }
  interval = Math.floor(seconds / 3600);
  if (interval > 1) {
    return interval + " hours";
  }
  interval = Math.floor(seconds / 60);
  if (interval > 1) {
    return interval + " minutes";
  }
  return Math.floor(seconds) + " seconds";
}
var aDay = "Updated on 2020-06-19 17:09:00";
console.log(timeSince(new Date(aDay)))
// console.log(timeSince(new Date(Date.now()-aDay*2)));

fetch("https://www.bgvhwd.xyz/Client/API/dashboard.php", {
  method: 'POST',
  body: JSON.stringify({"client_id": hiddenInput.value}),
})
.then(response => response.json())
.then(data => {
  console.log(data)
  dashboardData = data
  updateDashboard()
  console.log('Success:', data);
})
.catch((error) => {
  console.error('Error:', error);
});


// fetch("https://www.bgvhwd.xyz/Client/API/dashboard.php")
//   .then(response => response.json())
//   .then(data => {
//     dashboardData = data
//     // updateDashboard()
//     console.log('Success:', data);
//   })
//   .catch((error) => {
//     console.error('Error:', error);
//   });

console.log('working all')

const updateDashboard = () => {
  totalCases.innerHTML = dashboardData.totalcases
  console.log(dashboardData.totalcasestime)
  totalCasesUpdated.innerHTML = `<i class="material-icons"style="color:#1A2035;">access_time</i> updated ${timeSince(new Date(dashboardData.totalcasestime))} ago`
  totalResolved.innerHTML = dashboardData.completedcases
  totalResolvedUpdated.innerHTML = `<i class="material-icons"style="color:#1A2035;">access_time</i> updated ${timeSince(new Date(dashboardData.completedcasestime))} ago`
  totalInProgress.innerHTML = dashboardData.pendingcases
  totalInProgressUpdated.innerHTML = `<i class="material-icons"style="color:#1A2035;">access_time</i> campaign sent ${timeSince(new Date(dashboardData.pendingcasestime))} ago`


  // console.log(new Date())
  // console.log(Math.floor(new Date() - new Date("Updated on 2020-06-18 17:36:48")) / 1000 )
  // console.log(moment(("19-06-2020").fromNow()))
  
}
// completedcases: 5
// completedcasestime: "Updated on 2020-06-18 17:36:48"
// pendingcases: 13
// pendingcasestime: "Updated on 2020-06-18 17:30:39"
// totalcases: 18
// totalcasestime: "Updated on 2020-06-18 17:36:48"


// console.log(hiddenInput.value)

// const sendHiddenId = (url) => {
//   fetch(url, {
//     method: 'POST',
//     body: JSON.stringify({"user": hiddenInput.value}),
//   })
//   .then(response => response.json())
//   .then(data => {
//     console.log('Success:', data);
//   })
//   .catch((error) => {
//     console.error('Error:', error);
//   });
// }
// sendHiddenId("https://www.bgvhwd.xyz/Client/API/dashboard.php")