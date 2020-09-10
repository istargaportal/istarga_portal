
let Dtable = document.querySelector("#downloadable-table tbody")
fetch("./API/viewStandardMacro.php")
  .then(res => res.json())
  .then(data => {
    data.map(v => {
      Dtable.innerHTML += `
      <tr>
        <td>
          ${v.Comment}
        </td>
       </tr>
    `
    })
    
  })
  .then(v => xlxsInit())
  .catch(err => console.log(err))

const xlxsInit = () => {
  var wb = XLSX.utils.table_to_book(document.getElementById('downloadable-table'), {sheet:"all services"});
  var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});

  function s2ab(s) {
    var buf = new ArrayBuffer(s.length);
    var view = new Uint8Array(buf);
    for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
    return buf;
  }
  $("#download-excel").click(function(){
    saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'all-services.xlsx');
  });
}

// let servicetype = document.getElementById('Service Type');
// servicetype.length = 0;

// let defaultservicetype = document.createElement('option');
// defaultservicetype.text = 'Select Service Type';
// defaultservicetype.value = "";

// servicetype.add(defaultservicetype);
// servicetype.selectedIndex = 0;

// const service = "./API/servicetypelist.php";
// fetch(service).then(function(response) {
//   //console.log(response);
//   return response.text();
// }).then(function(text) {
//   //console.log(text);

//   let stat = JSON.parse(text);
//   let option;

//   for (let i = 0; i < stat.length; i++) {
//     option = document.createElement('option');
//     option.text = stat[i].name;
//     option.value = stat[i].Id;
//     servicetype.add(option);
//   }

// }).catch(function(error) {
//   console.error(error);
// })


const onSave = (id, action, j) => {
    ln = document.getElementById(id + "aln").value;
    ln = ln.trim();
    if(ln == "")
    {
      alert('Please enter Comments!');
      $("#"+ id + "aln").focus();
      return;
    }
    
    obj = { "id": id, "action": action, "comment": ln };

    fetch('./API/modifyStandardMacro.php', {
      method: 'post',
      body: JSON.stringify(obj)
    }).then(function (res) {
      popuTable();
    }).catch(err => {
      return err;
    })
  }
  
  const onEdit = (id, action, j) => {
    let elem2 = document.getElementById(id + "ln");
    let edit = document.getElementById(id + "c");
     //x.setSelectionRange(x.value.length, x.value.length, "forward");
    let x2 = document.createElement("textarea");
    // x2.setAttribute("type", "text");
    x2.value = elem2.textContent;
    x2.setAttribute("id", id + "aln");
    x2.setAttribute("class", "custom-select");
    elem2.innerHTML = "";
    elem2.appendChild(x2);
    // x1.focus()
    edit.innerHTML = "";
  
    //elem.appendChild(br);
    let btn2 = document.createElement('button');
    btn2.type = "button";
    btn2.className = "btn btn-success btn-xs";
    btn2.innerHTML = "<i class='material-icons icon'>note_add</i> SAVE";
    btn2.onclick = (() => { 
      // confirm('Are you sure you want to Save it?') ?
      onSave(id, action, j) ; });
    edit.appendChild(btn2);
  }
  const onDelete = (id, action) => {
    //gp = document.getElementById(id + "gp" + j).innerText;
    //console.log(gp);
    obj = { "id": id, "action": action };
    //console.log(obj.id);
    fetch('./API/modifyStandardMacro.php', {
      method: 'post',
      body: JSON.stringify(obj)
    }).then(function (res) {
  
      //console.log(res);
      popuTable();
    }).catch(err => {
      //console.log(err);
      return err;
    })
  }
  const popuTable = () => {
    document.getElementById("table").innerHTML = "";
    let table = document.getElementById('table');
    //let cell = document.createElement('td');
    fetch('./API/viewStandardMacro.php').then(res => {
      //console.log(res.text());
      return res.text();
    }).then(text => {
      //console.table(text);
      let stat = JSON.parse(text);
      for (let i = 0, j = stat.length; i < stat.length; i++, j--) {
        var row = table.insertRow(0);
        //var cell0 = row.insertCell(0);
        // var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(0);
        var cell3 = row.insertCell(1);
        var cell5 = row.insertCell(1);
        var cell6 = row.insertCell(2);
        //cell0.innerHTML = j;
        cell2.innerHTML = '<div class="tablehead1 form_left">'+stat[i].Comment+'</div>';
        cell2.setAttribute("id", stat[i].id + "ln");
        //cell4.setAttribute("id", stat[i].id + "gp"+j);
        var btn1 = document.createElement('button');
        btn1.type = "button";
        btn1.className = "btn btn-warning btn-xs";
        btn1.innerHTML = "<i class='material-icons icon'>edit</i> EDIT";
        btn1.onclick = (() => { onEdit(stat[i].id, "edit",j) });
        cell5.appendChild(btn1);
        cell5.setAttribute("id", stat[i].id + "c");
        cell5.setAttribute("class","noExport");
        cell6.setAttribute("class","noExport");

        var btn = document.createElement('button');
        btn.type = "button";
        btn.className = "btn btn-danger btn-xs";
        btn.innerHTML = "<i class='material-icons icon'>delete</i> DELETE";
        btn.onclick = (() => { confirm('Are you sure you want to delete it?') ? onDelete(stat[i].id, "delete") : ''; });
        cell6.appendChild(btn);
      }
    });
  }