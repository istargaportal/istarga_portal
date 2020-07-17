function sendJSON(){ 
	// Declaring variables 

 let Client_Name=document.querySelector('#Client_Name');	
 let Client_Code=document.querySelector('#Client_Code');	 
 let Client_SPOC=document.querySelector('#Client_SPOC');	 
 let Country=document.querySelector('#Country');
 let State=document.querySelector('#State');
 let City=document.querySelector('#City');
 let Zip_Code=document.querySelector('#Zip_Code');
 let Contact_Number=document.querySelector('#Contact_Number');	 
 let Email=document.querySelector('#Email'); 
 let App_Response_Time=document.querySelector('#App_Response_Time'); 
 let Inv_Address=document.querySelector('#Inv_Address');
 let Inv_Bank=document.querySelector('#Inv_Bank');
 let Inv_Due_Days=document.querySelector('#Inv_Due_Days');
 let Inv_Code=document.querySelector('#Inv_Code');
 let Is_GSTIN=document.querySelector('#Is_GSTIN');
 let Is_Package=document.querySelector('#Is_Package');
 let Is_Cancelled_Report=document.querySelector('#Is_Cancelled_Report');
 let Is_SEZ=document.querySelector('#Is_SEZ');
 let Contact_Applicant=document.querySelector('#Contact_Applicant');
 let Is_Bulk_Upload=document.querySelector('#Is_Bulk_Upload');
 let Is_Prin_Merge=document.querySelector('#Is_Prin_Merge');
 let Is_LOB_Mapping=document.querySelector('#Is_LOB_Mapping');
 let Contact_Aggregator=document.querySelector('#Contact_Aggregator');
 let Email_ID=document.querySelector('#Email_ID');
 let Applicant_Check_List=document.querySelector('#Applicant_Check_List');
 let Internal_Reference_ID=document.querySelector('#Internal_Reference_ID');
 let Currency=document.querySelector('#Currency');	 
 let Live_DateDate=document.querySelector('#Live_DateDate');	


     var ispack = Is_Package.checked ? 1 : 0;
     var Cancelled = Is_Cancelled_Report.checked ? 1 : 0;
     var SEZ = Is_SEZ.checked ? 1 : 0;
     var Applicant = Contact_Applicant.checked ? 1 : 0;
     var Bulk_Upload = Is_Bulk_Upload.checked ? 1 : 0;
     var Merge = Is_Prin_Merge.checked ? 1 : 0;
     var Mapping = Is_LOB_Mapping.checked ? 1 : 0;
     var Aggregator = Contact_Aggregator.checked ? 1 : 0;
     var ID = Email_ID.checked ? 1 : 0;
     var Check_List = Applicant_Check_List.checked ? 1 : 0;
     var Reference_ID = Internal_Reference_ID.checked ? 1 : 0;

	// Create XHR object
	let xhr = new XMLHttpRequest(); 
	 

	
	xhr.open("POST",'API/addClient.php', true); 

	
	xhr.setRequestHeader("Content-Type", "application/json"); 
    
        xhr.onreadystatechange = function () { 
				if (xhr.readyState === 4 && xhr.status === 200) { 
                    var result  = document.getElementById('cb');
					// Print received data from server 
					result.innerHTML = this.responseText; 

				} 
			}; 
 
var data = JSON.stringify({ "Client_Name": Client_Name.value, "Client_Code": Client_Code.value,
"Client_SPOC": Client_SPOC.value, "Country": Country.value,  "State": State.value, "City": City.value,  
"Zip_Code": Zip_Code.value,"Contact_Number": Contact_Number.value, "Email": Email.value,  "App_Response_Time": App_Response_Time.value,
"Inv_Address": Inv_Address.value, "Inv_Bank": Inv_Bank.value,  "Inv_Due_Days": Inv_Due_Days.value, "Inv_Code": Inv_Code.value,  
"Is_GSTIN": Is_GSTIN.value, "Is_Package": ispack,  "Is_Cancelled_Report": Cancelled, "Is_SEZ": SEZ,  
"Contact_Applicant": Applicant, "Is_Bulk_Upload":Bulk_Upload,  "Is_Prin_Merge": Merge,
"Is_LOB_Mapping": Mapping, "Contact_Aggregator": Aggregator,  "Email_ID": ID, 
"Applicant_Check_List": Check_List, "Internal_Reference_ID": Reference_ID,  "Currency": Currency.value, "Live_DateDate": Live_DateDate.value, 
     }); 

//           console.log(data);

			// Sending data with the request 
			xhr.send(data); 
//			 console.log(data);

		} 

    