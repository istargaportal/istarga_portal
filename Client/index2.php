<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<?php
$string= "This file is to be transferred";
?>
<form id="postform">
<p>Name:<input type="text" name="name" id="name"></p><br>
<p>Name2:<input type="text" name="name2" id="name2"></p><br>
<input type="file" multiple name="file" id="file" onchange="javascript:updateList()" />

<p>Selected files:</p>

<div id="fileList"></div>
<!--<button id="btn">Upload File</button><br>-->
<div id="output">

</div>

<select id="locality-dropdown" name="country" onchange="getpackage(this.value)">

</select><br>
<select id="package-dropdown" name="package">

</select><br>
<a href="docs/book1.xlsx"  download>Click here to download</a>
<input type="submit" value="submit">
</form>
</body>
<script src="index2.js"></script>
 <script>
     updateList = function() {
    var input = document.getElementById('file');

}

 </script>  
</html>