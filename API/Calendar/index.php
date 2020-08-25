<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
  <!-- <script src="https://use.fontawesome.com/b2904fea37.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style type="text/css">
    <?php include 'calendar.css'; ?>
  </style>
</head>
<body>
  <?php
  $month = @$_GET['month']; $year = @$_GET['year'];

  if($month == ""){ $month = date('m'); }
  if($year == ""){ $year = date('Y'); }
  global $user_id;
  $user_id = $_GET['user_id'];
  include("calendar_en.php");
  ?>

</body>
</html>