var e1 = document.getElementById("locality-dropdown");
var Country = e1.options[e1.selectedIndex].value;
var e = document.getElementById("select_service_type1");
var ser = e.options[e.selectedIndex].value;
var e3 = document.getElementById("select_service_name");
var opt = e3.options[e3.selectedIndex].value;

function T33() { 
  ser = e.options[e.selectedIndex].value;
  Country = e1.options[e1.selectedIndex].value;
  opt = e3.options[e3.selectedIndex].value;
  $.post(
    "./API/updateservice.php",
    {
      Action: "Display",
      Country: Country,
      ServiceT: ser,
      servicename: opt,
    },
    function (data, status) {
      $("#table1").html(data);
      document.getElementById("table1").innerHTML = data;
      console.log("r" + data);
      //alert("Data: " + data + "\nStatus: " + status);
    }
  );
}
function editUpdate1(id, dbid) {
  var dat = [];
  $("#tr" + id + " td").each(function () {
    var id = $(this).attr("id");
    console.log("id  :" + id);
    if (typeof id === "undefined") {
      console.log(" undefined :" + id);
    } else {
      if (id == "cn") {
        dat[0] = $(this).html();
      } else if (id == "co") {
        dat[1] = $(this).html();
      } else if (id == "countryl") {
        //dat[2]=$(this).html();
        dat[2] = $("#locality-dropdown").val();
      } else if (id == "sn") {
        dat[3] = $(this).html();
      } else if (id == "sla") {
        dat[4] = $(this).html();
      }
    }
  });
  console.log("dat  :" + dat);
  console.log("Select Edit :" + "#tr" + id + " td");
  var answer = window.confirm("Are you sure you want to delete this service?");
  if (answer) {
    $.post(
      "./API/updateservice.php",
      {
        Action: "edit",
        id: dbid,
        Client: dat[0],
        Country: dat[1],
        ServiceT: dat[2],
        ServiceN: dat[3],
        Price: dat[4],
      },
      function (data, status) {
        //   $("#table").html(data);
        //document.getElementById("table").innerHTML = data;
        //console.log("update status :"+data);
        T33();
      }
    );
  } else {
    T33();
  }
}
function deleteRow(id) {
  ser = e2.options[e2.selectedIndex].value;
  dob = dob2.value;
  var answer = window.confirm("Are you sure you want to delete this service?");
  if (answer) {
    $.post(
      "./API/createService.php",
      {
        Action: "delete",
        service: id,
        ServiceT: ser,
        servicename: dob,
      },
      function (data, status) {
        //   $("#table").html(data);
        //document.getElementById("table").innerHTML = data;
        T33();
        // console.log("delete status :"+data);
      }
    );
  } else {
    T33();
  }
}
