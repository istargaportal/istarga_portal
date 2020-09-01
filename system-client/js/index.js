
document.getElementById('postform').addEventListener('submit',postname);
let modalLabel2 = document.querySelector(".new-modal #exampleModalLabel")
let modalLaunchButton2 = document.querySelector(".new-modal .launch")

function postname(e){
    e.preventDefault();

    var name=document.getElementById('username').value;
	var pwd=document.getElementById('pwd').value;
	
//	const data=JSON.stringify({username:name,password:pwd});
	
//	console.log(data);
   const xhr=new XMLHttpRequest();
   
   xhr.open("POST",'./API/login.php', true); 

	
	xhr.setRequestHeader("Content-Type", "application/json"); 

	
	xhr.onload = function () { 
		
		if (xhr.status === 200) { 

		
			if(this.responseText==1)
			{
					window.location.href="home.php";
			} 
			else if(this.responseText==0)
			{
				alert("Wrong Details");
				modalLabel2.innerHTML = "Wrong Details"
				modalLaunchButton2.click()
			}
		
			
			
		} 
		
	}; 

	
	
	var data = JSON.stringify({"name": name, "pwd": pwd}); 

	
	xhr.send(data); 
		

		

}

