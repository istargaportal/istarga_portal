var edit_country = $('#edit_country').val() || 0;
var edit_service_type_id = $('#edit_service_type_id').val() || 0;
var edit_service_id = $('#edit_service_id').val() || 0;
var edit_client_id = $('#edit_client_id').val() || 0;
var edit_currency = $('#edit_currency').val() || 0;

let dropdown = document.getElementById('locality-dropdown');
dropdown.length = 0;

let defaultOption = document.createElement('option');

if(edit_country == 0)
{
  defaultOption.text = 'Select Country';
  defaultOption.value = '0';
  dropdown.add(defaultOption);
  dropdown.selectedIndex = 0;
}

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

function load_service_type()
{
  var load_condition = "load_service_type";
  $.ajax({
    type:'POST',
    url:'./API/servicetype.php',
    data:{load_condition, edit_service_type_id},
    success:function(html){
      $('#select_service_type').html(html);
    }
  });
}

load_service_type();

function load_service_name()
{
  var select_service_type = $('#select_service_type').val();
  var locality_dropdown = $('#locality-dropdown').val();
  var load_condition = "load_service_name";
  $.ajax({
    type:'POST',
    url:'./API/servicename.php',
    data:{load_condition, select_service_type, locality_dropdown, edit_service_type_id, edit_country, edit_service_id},
    success:function(html){
      $('#select_service_name').html(html);
    }
  });
}
load_service_name();

function load_clients()
{
  var client_select = 1;
  var load_condition = "list_all_clients";
  $.ajax({
    type:'POST',
    url:'./API/viewclient.php',
    data:{load_condition, edit_client_id, client_select},
    success:function(html){
      $('#client_id_div').html(html);
      $('.chosen-select').chosen();
    }
  });
}

load_clients();


let currency = document.getElementById('currency');
currency.lenght = 0;
let currencytype = document.createElement('option');
if(edit_currency == 0)
{
  currencytype.text = 'Select Currency';
  currencytype.value = "0";
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



function delete_assigned_service(id) 
{
  var r = confirm("Are you sure to delete this assigned service?");
  if(r == true)
  {
    var load_condition = "assigned_service";
    var assigned_service_id = id;
    $.ajax({
      type:'POST',
      url:'./API/delete_operation.php',
      data:{load_condition, assigned_service_id},
      success:function(html){
        if(html == "success")
        {
          alert('Assigned service deleted!');
          getAllAssignService(`./API/viewassignedservice.php`); 
        }
        else
        {
          alert('Error occurred!');
        }
      }
    });
  }
}

function getAllAssignService(urls)
{
  var load_condition = "load_all_services";
  $.ajax({
    type:'POST',
    url:urls,
    data:{load_condition},
    success:function(html){
      $('#table').html(html);
      load_datatable();
    }
  });
}
getAllAssignService(`./API/viewassignedservice.php`);
