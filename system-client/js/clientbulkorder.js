let service = document.getElementById('Service');
service.length = 0;
 
 let defaultservice = document.createElement('option');
 defaultservice.text = 'Choose Service';
 defaultservice.value='0';

 service.add(defaultservice);
 service.selectedIndex = 0;
 
 fetch('./API/servicename.php')
 .then(  
    function(response) {  
      if (response.status !== 200) {  
        console.warn('Looks like there was a problem. Status Code: ' + 
          response.status);  
        return;  
      }

      // Examine the text in the response  
      response.json().then(function(data) {  
        let option;
    
    	for (let j = 0; j < data.length; j++) {
          option = document.createElement('option');
      	  option.text = data[j].service_name;
      	  option.value = data[j].id;
      	  service.add(option);
    	}    
      });  
    }  
  )
  .catch(function(err) {  
	console.error('Fetch Error -', err);  
  });

const inpfile=document.getElementById('file'); 	
   let form = document.getElementById('ajax')
   

   form.addEventListener('submit',function(e){
    e.preventDefault();
    const formdata=new FormData(this);
    
    for(const file of inpfile.files){
        formdata.append("myfiles[]",file);
    } 
    
    fetch('API/clientbulkorder.php',{
        method:'post',
        body:formdata
	})
	.then(function(response){
		return response.text();
	}).then(function(text){
	//	console.log(text);
	if(text=="1")
	{
		alert("Successfully Submitted");
		location.reload()	
	//	window.location.href="Dashboard.php";
	}
	else
	{
		console.log("laad chat liye");
	}
	})
	.catch(console.error);

});


 

