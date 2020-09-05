
let Dtable = document.querySelector("#downloadable-table tbody")
fetch("https://www.bgvhwd.xyz/Project_files/API/viewStandardMacro.php")
  .then(res => res.json())
  .then(data => {
    console.log(data)
    data.map(v => {
      console.log("hello")
      Dtable.innerHTML += `
      <tr>
        <td>
          ${v.Scenario}
        </td>
        <td>
          ${v.Comment}
        </td>
        <td>
          ${v.service_name}
        </td>
        <td>
          ${v.macro_name}
        </td>
      </tr>
    `
    console.log(Dtable)
    
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

let servicetype = document.getElementById('Service Type');
servicetype.length = 0;

let defaultservicetype = document.createElement('option');
defaultservicetype.text = 'Select Service Type';
defaultservicetype.value = "";

servicetype.add(defaultservicetype);
servicetype.selectedIndex = 0;

const service = "./API/servicetypelist.php";
fetch(service).then(function(response) {
  //console.log(response);
  return response.text();
}).then(function(text) {
  //console.log(text);

  let stat = JSON.parse(text);
  let option;

  for (let i = 0; i < stat.length; i++) {
    option = document.createElement('option');
    option.text = stat[i].name;
    option.value = stat[i].Id;
    servicetype.add(option);
  }

}).catch(function(error) {
  console.error(error);
})

let macrotype = document.getElementById('Macro Type');
macrotype.length = 0;

let defaultmacrotype = document.createElement('option');
defaultmacrotype.text = 'Select Macro Type';
defaultmacrotype.value = "";

macrotype.add(defaultmacrotype);
macrotype.selectedIndex = 0;

const macro = "./API/viewMacroType.php";
fetch(macro).then(function(response) {
  //console.log(response);
  return response.text();
}).then(function(text) {
  //console.log(text);

  let stat = JSON.parse(text);
  let option;

  for (let i = 0; i < stat.length; i++) {
    option = document.createElement('option');
    option.text = stat[i].name;
    option.value = stat[i].id;
    macrotype.add(option);
  }

}).catch(function(error) {
  console.error(error);
})

const onSave = (id, action, j) => {
    fn = document.getElementById(id + "afn").value;
    ln = document.getElementById(id + "aln").value;
    fn = fn.trim();
    ln = ln.trim();
    if(fn == "")
    {
      alert('Please enter Scenario!');
      $("#"+ id + "afn").focus();
      return;
    }
    if(ln == "")
    {
      alert('Please enter Comments!');
      $("#"+ id + "aln").focus();
      return;
    }
    
    obj = { "id": id, "action": action, "scenario": fn, "comment": ln };

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
    //console.log(id);
    let elem1 = document.getElementById(id + "fn");
    let elem2 = document.getElementById(id + "ln");
    let edit = document.getElementById(id + "c");
    let x = document.createElement("INPUT");
    x.setAttribute("type", "text");
    x.setAttribute("value", elem1.textContent);
    x.setAttribute("id", id + "afn");
    x.setAttribute("class", "form-control focus");
    x.style.maxWidth = "80%";
    elem1.innerHTML = "";
    elem1.appendChild(x).focus();
    //x.setSelectionRange(x.value.length, x.value.length, "forward");
    let x2 = document.createElement("INPUT");
    x2.setAttribute("type", "text");
    x2.setAttribute("value", elem2.textContent);
    x2.setAttribute("id", id + "aln");
    x2.setAttribute("class", "form-control focus");
    x2.style.maxWidth = "80%";
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
      onSave(id, action, j) ; popuTable() });
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
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        //cell0.innerHTML = j;
        cell1.innerHTML = '<div class="tablehead1 form_left">'+stat[i].Scenario+'</div>';
        cell1.setAttribute("id", stat[i].id + "fn");
        cell2.innerHTML = '<div class="tablehead1 form_left">'+stat[i].Comment+'</div>';
        cell2.setAttribute("id", stat[i].id + "ln");
        cell3.innerHTML = '<div class="tablehead1">'+stat[i].service_name+'</div>';
        //cell3.setAttribute("id", stat[i].id + "em");
        cell4.innerHTML = '<div class="tablehead1">'+stat[i].macro_name+'</div>';
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