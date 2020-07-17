<?php
session_start();
  require_once "../config/config.php";
 // $con = mysqli_connect("localhost","root","","bgv");
  //change
   $get_connection=new connectdb;
   $db=$get_connection->connect();

   if (mysqli_connect_errno($db)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   $userid=$_SESSION['uname'];
  
   $sql = "SELECT * FROM `client` WHERE email='$userid'";
   
   $result = mysqli_query($db,$sql);
    
   while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	   
   echo '<div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating"
                            >Organisation Name</label
                          >
                          <input
                            name="Company"
                            id="Company"
                            type="text"
                            class="form-control bg-transparent  text-light"';
                            
                           echo "value='".$row['Company']."'readonly";
                       echo '/>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input
                            name="UserName"
                            id="UserName"
                            type="text"
                            class="form-control bg-transparent  text-light"';
                            echo "value='".$row['email_id']."'readonly";
                       echo '/>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"
                            >Contact Email Id</label
                          >
                          <input
                            name="EmailID"
                            id="EmailID"
                            type="email"
                           class="form-control bg-transparent  text-light"';
                            echo "value='".$row['email_id']."'readonly";
                       echo '/>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fist Name</label>
                          <input
                            name="First Name"
                            id="First Name"
                            type="text"
                            class="form-control bg-transparent  text-light"';
                            echo "value='".$row['first_name']."'readonly";
                       echo '/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input
                            name="Last name"
                            id="Last name"
                            type="text"
                           class="form-control bg-transparent  text-light"';
                            echo "value='".$row['last_name']."'readonly";
                       echo '/>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input
                            name="Address"
                            id="Address"
                            type="text"
                            class="form-control bg-transparent  text-light"';
                            echo "value='".$row['Address']."'readonly";
                       echo '/>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input
                            name="City"
                            id="City"
                            type="text"
                            class="form-control bg-transparent  text-light"';
                            echo "value='".$row['city']."'readonly";
                       echo '/>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country</label>
                          <input
                            name="Country"
                            id="Country"
                            type="text"
                            class="form-control bg-transparent  text-light"';
                            echo "value='".$row['country']."'readonly";
                       echo '/>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"
                            >Postal Code</label
                          >
                          <input
                            name="Postal Code"
                            id="Postal Code"
                            type="text"
                            class="form-control bg-transparent  text-light"';
                            echo "value='".$row['postal_code']."'readonly";
                       echo '/>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>About Me</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> </label>
                            <textarea
                              name="About Me"
                              id="About Me"
                              class="form-control bg-transparent  text-light"';
                            echo "value='".$row['about_me']."'readonly/>";
                      echo($row['about_me']);
                        echo '</textarea>
                          </div>
                        </div>
                      </div>
                    </div>';
   
   
   }


?>
