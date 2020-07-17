$("form").submit(function (event) {
  var formdata = $("form").serializeArray();
  var data = {};
  $(formdata).each(function (index, obj) {
    data[obj.name] = obj.value;
  });
  console.log(data);
  event.preventDefault();
});
$.ajax({
  type: "POST",
  data: JSON,
  url: "../API/insert.php",
  success: function (data) {
    alert(data);
  },
});
