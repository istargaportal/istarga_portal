let dropdown = document.getElementById('locality-dropdown');
dropdown.length = 0;

let defaultOption = document.createElement('option');
defaultOption.text = 'Choose State/Province';

dropdown.add(defaultOption);
dropdown.selectedIndex = 0;

const url = 'API/country.php';

fetch(url)  
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
    
    	for (let i = 0; i < data.length; i++) {
          option = document.createElement('option');
      	  option.text = data[i].country_name;
      	  option.value = data[i].id;
      	  dropdown.add(option);
    	}    
      });  
    }  
  )  
  .catch(function(err) {  
    console.error('Fetch Error -', err);  
  });

  let package = document.getElementById('package-dropdown');
  package.length = 0;

let defaultpackage = document.createElement('option');
defaultpackage.text = 'Choose Package';

package.add(defaultpackage);
package.selectedIndex = 0;



function getpackage(x){
    const id={
        country_id:x,
    };
    fetch('API/states.php',{
        method:'post',
        body:JSON.stringify(id),
        headers:{
            'Content-type':'application/json'
        }
    }).then(function(response){
        return response.text();
    }).then(function(text){
      //  console.log(text);
        
        let stat=JSON.parse(text);
        var wrap = document.getElementById('package-dropdown')
        while(wrap.firstChild) wrap.removeChild(wrap.firstChild)
        let option;
    
    	for (let i = 0; i < stat.length; i++) {
          option = document.createElement('option');
      	  option.text = stat[i].name;
      	  option.value = stat[i].id;
      	  package.add(option);
        }
           
    }).catch(function(error){
        console.error(error);
    })
    
}
  // kdjkf
  

const inpfile=document.getElementById('file');
const btn=document.getElementById('postform');


btn.addEventListener('submit',function(e){
    e.preventDefault();
    const formdata=new FormData(this);
    
    for(const file of inpfile.files){
        
        formdata.append("myfiles[]",file);
    } 
    for(const [key,value] of formdata){
        console.log(`key:${key}`);
       console.log(`value:${value}`);
    }
    fetch('xyz.php',{
        method:'post',
        body:formdata
    }).catch(console.error);
    
});