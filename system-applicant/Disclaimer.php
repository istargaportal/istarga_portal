<?php
session_start();
require_once "../config/config.php";

$order_id = $_SESSION['order_id'];
$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(!isset($_SESSION['order_id']))
{
  echo '
  <script>
  window.location.href = "index.php";
  </script>
  ';
}
else
{
  $order_id = $_SESSION['order_id'];
}
$check = "SELECT first_name, last_name FROM order_master WHERE order_id = '$order_id' ";
$resul = mysqli_query($db,$check); 
if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
{
  $full_name = $row['first_name'].' '.$row['last_name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Disclaimer</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <style>
    body p{
      padding: 0;
      margin: 0;
      border: 0;
      font-size: 13px !important;
      letter-spacing: .5px;
    }
    body, html{
      background: #ccc;
    }
    .border{
      background: #fff;
      border: 3px dashed black !important;
      width: 96%;
      height: 100%;
      margin: 2%;
    }


    .heading{
      font-size: 25px !important;
      display: flex;
      justify-content: center;

    }
    .discription{
      display: flex;
      justify-content: center;
    }
    .content{
      padding: 25px;
      font-size: 14px;
    }
    .heading{
      margin-top: 2%;
      font-size: 20px;
    }
    .content{
      margin-top: 2%;
    }
    #btn1, #btn2{
      width: 15%;
      height: 50px;
      padding: 10px;
      letter-spacing: 1px;
    }
    #btn1{
      background-color: #47A34B;
      color: white;
      border: 2px solid #47A34B;
      box-shadow: 3px 2px #47A34B;
    }
    #btn2{
      background-color: rgba(128, 128, 128, 0.514);
      color: white;
      border: 2px solid rgba(128, 128, 128, 0.514);
      box-shadow: 3px 2px #D4D5D8;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="border">
      <div class="heading">
      </p> Consumer Report or Investigative Consumer Report<p>
      </div>
      <div class="discription">
        <p>DISCLOSURE AND AUTHORIZATION/CONSENT – INTERNATIONAL</p>
      </div>
      <div class="content">
        <p style="font-size: 15px !important;">Please read this consent form carefully before signing it....</p>
        <p style="margin-top: 3%;"> I confirm that all the 
          information I have provided to (“The Employer”) at any stage of the job application process, whether it is information provided in the form of documentation or verbally, is true and complete to the best of my knowledge and belief. I also confirm that I have answered all questions put to me by or on behalf of The Employer fully and 
          accurately.
        </p>
          <p  style="margin-top: 2%;">I understand that any offer of employment is conditional upon satisfactory references and the background verification of all information I have provided, in accordance with the relevant laws and regulations.
          </p>

          <p style="margin-top: 2%;">I understand that 
            this form provides consent for the necessary background verification process to be 
            undertaken, and I hereby consent to the production of a [Consumer Report or 
            Investigative Consumer Report]1 (“Consumer Report”) to be prepared about me as 
            part of my application for employment [and/or continued employment].
          </p>   

          <p style="margin-top: 2%;">[I 
            understand that my background investigation will be based on information that I 
            provided in my Employment Application including Curriculum Vitae/Resume, 
            Disclosure/Authorization, and potentially the areas of information outlined below.] 
            My personal data will not be shared with any person, organization, or company 
            other than those entities acting as an authorized agent of Istarga and for the 
            specific purpose of verifying the information I provided unless such disclosure is 
            required by law or I specifically authorize its disclosure in other circumstances.
          </p>
          <p style="margin-top: 2%;">I 
            authorize The Employer (or any third party vendor appointed by them) to procure a 
            Consumer Report which includes information from multiple sources across the 
            globe. I understand that the Consumer Report will be prepared by Istarga Solutions 
            Pvt Ltd Pvt. Ltd. (“Istarga ”). I authorize Istarga , and its agents, to retrieve the 
            necessary information and prepare a Consumer Report. I understand and authorize 
            that some or all of my information may be transmitted electronically and, when 
            required, may be transferred across international borders. 
          </p>

          <p  style="margin-top: 2%;">I understand that Istarga 
            may transmit my personal information to its agents and information sources as 
            necessary throughout the course of business and that host country and receiving 
            country privacy laws will be observed if information is transferred across 
            international borders. I may request a list of designated agents by contacting 
            Istarga (Applicant service team by calling at +1 888-852-1781, or writing to them at
            applicant.service@Istarga .com). Istarga holds all personal and private information it
            obtains securely and confidentially. I agree that The Employer may disclose any or 
            all information provided by me as part of the application process to Istarga.

          </p>
          <p  style="margin-top: 2%;">If my 
            personal history, or information which I have provided to the prospective employer 
            requires background verifications to be carried out in countries other than the one 
            in which I currently reside, I consent to my personal data being sent and processed 
            in those relevant countries for the purpose of the background verification to be 
            carried out and for the results of that verification to be sent to the country in which 
            Istarga is compiling the report for The Employer and for the report to be sent to the 
            Employer.
          </p>
          <p  style="margin-top: 2%;">I acknowledge and consent to a criminal background check in countries 
            where I have lived or worked for any period of time. I acknowledge that this 
            information is sensitive personal data. I expressly consent to the processing of that 
            data in the same way as the other personal data covered by this form. I authorize 
            Istarga to disclose the Consumer Report to The Employer and acknowledge that a 
            copy of the form may be kept on my personnel file. The verification process may 
            include some or all of the following checks: 
            
            Academic qualifications; 
            
            Address 
            check; 
            
            CV check; 
            
            Directorships check; 
            
            Eligibility to work in country in question;
            
            Employment/unemployment/education review; 
            
            Financial/Credit check; 
            DISCLOSURE AND AUTHORIZATION/CONSENT -INTERNATIONAL Ver. 5.0 938170136 
            
            Social media search (from open source materials unless agreed otherwise); 
            
            Sanction list; 
            
            Criminal record check; 
            
            Open Media Check 
            
            Global Database check
            
            Civil check 
            
            [List any others]. 
          </p>
          <p  style="margin-top: 2%;">I understand that some or all of the personal 
            information necessary for the purpose of completing a background report on me in 
            connection with my employment or application for employment (or contract for 
            services) with The Employer is currently stored in the European Union, and that this 
            information may be requested by entities located in a country that is not considered
            to provide an adequate level of protection for personal data from the European 
            Union (including United States). I hereby authorize The Employer and any individual,
            entity, agency, authority or court holding my personal information within the 
            European Union to transfer my personal information to Istarga Solutions Pvt Ltd 
            and/or to their affiliates, employees, and third party service providers who require 
            access to this information for the purpose of creating a background report or 
            investigative report, but for no other purpose.
          </p>
          <p  style="margin-top: 2%;">I authorize educational institutions, 
            employers, government agencies, credit reporting agencies, companies, 
            corporations, and law enforcement agencies at the international, federal, 
            state/provincial or county level to provide any and all information concerning my 
            background. If my prior employers and/or references are contacted, the Consumer 
            Report may include information obtained through personal interviews regarding my 
            character and general reputation. I understand that the personal information 
            described above is being collected, used and disclosed only for the purposes of 
            assessing my suitability for employment with the above-named company.
          </p>
          <p  style="margin-top: 2%;">I may 
            request a copy of any report that is prepared regarding me. I may also request the 
            nature and substance of all information about me contained in the files of the 
            consumer-reporting agency. I understand I have the right to inspect those files with 
            reasonable notice during regular business hours and I may be accompanied by one 
            other person. I understand that I have the right to dispute any information 
            contained in the consumer report, if I believe it is false, inaccurate or misleading by 
            notifying [the employer]. The consumer-reporting agency is required to provide 
            someone to explain the contents of my file. This consent is effective from the date 
            specified on this form until the date my employment application is accepted or 
            denied by the above-named Employer, or until I withdraw my authorization in 
            writing by notice to The Employer. 
          </p>
          <p  style="margin-top: 2%;">I acknowledge and agree that a photocopy of this
            authorization may be accepted with the same authority as the original. I confirm 
            that this consent is explicit, is on the basis that I have been fully informed about the
            background verification process and that I give my consent freely for the purposes 
            set out in this document. 
          </p>
          <p  style="margin-top: 3%;">I authorize Istarga Solutions Pvt Ltd., to prepare and 
            procure a [Consumer Report]/ [Investigative Consumer Report] on
          </p>
          <div class="row justify-content-between" style="margin-top: 3%;">
            <div class="col-md-6">
              <h6 style="margin-top: 5%; font-size: 20px;">Name : <?php echo @$full_name; ?></h6>
            </div>
            <div class="col-md-3" style="margin-right: 3%;">
              <input id="date" type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
            </div>
          </div>
          <p style="margin-top: 2%;">[Note - This Disclosure Authorization is valid for obtaining of Consumer Report or Investigative Report 
          by Organization at any aftr receipt of the Authorization  and throught Candidate's, employment, if applicable ]</p>

        </div>
        <div class="row justify-content-center" style="margin-bottom: 2%; margin-top: 2%; text-align: center;">
          <button onclick="accept_terms()" style="margin-right: 1%;" class="btn btn-primary"><i class="fa fa-check"></i> I ACCEPT</button>
          <button onclick="dont_accept()" class="btn btn-danger"><i class="fa fa-remove"></i> I DO NOT ACCEPT</button>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function accept_terms()
      {
        var date = $('#date').val();
        if(date == "")
        {
          alert("Please select date!");
          $('#date').focus();
        }
        else
          {
          // var r = confirm('Are you sure to confirm the terms?')
          // if(r == true)
          // {
          $.ajax({
            type:'POST',
            url:'./API/Disclaimer.php',
            data:{date},
            success:function(html){
              if(html == 'success')
              {
                window.location.href = 'My-Application.php'
              }
              else
              {
                alert('Error occurred!')
              }
            }
          });
          // }
        }
      }

      function dont_accept()
      {
        alert('You have to accept terms and conditions to continue!');
      } 
    </script>
  </body>
  </html>