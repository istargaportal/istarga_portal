const onSave = (id, action, j) => {
    fn = document.getElementById(id + "afn").value;
    ln = document.getElementById(id + "aln").value;
    em = document.getElementById(id + "aem").value;
    gp = document.getElementById(id + "gp" + j).innerText;
    //console.log(gp);
    obj = { "id": id, "action": action, "first_name": fn, "last_name": ln, "email": em, "group": gp };
    //console.log(obj.id);
    fetch('./API/modifyUser.php', {
      method: 'post',
      body: JSON.stringify(obj)
    }).then(function (res) {
      //alert("Edited successfully")
      //console.log(res.text());
      popuTable();
    }).catch(err => {
      //console.log(err);
      return err;
    })
  }
  
  const onEdit = (id, action, j) => {
    //console.log(id);
    let elem1 = document.getElementById(id + "fn");
    let elem2 = document.getElementById(id + "ln");
    let elem3 = document.getElementById(id + "em");
    //let elem4 = document.getElementById(id + "gp");
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
    elem2.appendChild(x2).focus();
    //x2.setSelectionRange(x2.value.length, x2.value.length, "forward");
    let x3 = document.createElement("INPUT");
    x3.setAttribute("type", "email");
    x3.setAttribute("value", elem3.textContent);
    x3.setAttribute("id", id + "aem");
    x3.setAttribute("class", "form-control focus");
    x3.style.maxWidth = "80%";
    elem3.innerHTML = "";
    elem3.appendChild(x3).focus();
    //x3.setSelectionRange(x3.value.length, x3.value.length, "forward");
    // let x4 = document.createElement("INPUT");
    // x4.setAttribute("type", "email");
    // x4.setAttribute("value", elem4.textContent);
    // x4.setAttribute("id", id + "agp");
    // x4.setAttribute("class", "form-control focus");
    // x4.style.maxWidth = "80%";
    // elem4.innerHTML = "";
    // elem4.appendChild(x4).focus();
    //x4.setSelectionRange(x4.value.length, x4.value.length, "forward");
    edit.innerHTML = "";
  
    //elem.appendChild(br);
    let btn2 = document.createElement('input');
    btn2.type = "button";
    btn2.className = "btn btn-primary btn-sm";
    btn2.value = "SAVE";
    btn2.onclick = (() => { confirm('Are you sure you want to Save it?') ? onSave(id, action, j) : popuTable() });
    edit.appendChild(btn2);
    // let btn3= document.createElement('input');
    //     btn3.type = "button";
    //     btn3.className = "btn btn-primary btn-sm";
    //     btn3.value = "CANCEL";
    //     btn3.onclick = (() => {popuTable()});
    //     elem.appendChild(btn3);
  }
  const onDelete = (id, action, j) => {
    gp = document.getElementById(id + "gp" + j).innerText;
    //console.log(gp);
    obj = { "id": id, "action": action, "group":gp };
    //console.log(obj.id);
    fetch('./API/modifyUser.php', {
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
    fetch('./API/viewUser.php').then(res => {
      //console.log(res.text());
      return res.text();
    }).then(text => {
      //console.table(text);
      let stat = JSON.parse(text);
      for (let i = 0, j = stat.length; i < stat.length; i++, j--) {
        var row = table.insertRow(0);
        var cell0 = row.insertCell(0);
        var cell1 = row.insertCell(1);
        var cell2 = row.insertCell(2);
        var cell3 = row.insertCell(3);
        var cell4 = row.insertCell(4);
        var cell5 = row.insertCell(5);
        var cell6 = row.insertCell(6);
        cell0.innerHTML = j;
        cell1.innerHTML = stat[i].first_name;
        cell1.setAttribute("id", stat[i].id + "fn");
        cell2.innerHTML = stat[i].last_name;
        cell2.setAttribute("id", stat[i].id + "ln");
        cell3.innerHTML = stat[i].email;
        cell3.setAttribute("id", stat[i].id + "em");
        cell4.innerHTML = stat[i].group
        cell4.setAttribute("id", stat[i].id + "gp"+j);
        var btn1 = document.createElement('input');
        btn1.type = "button";
        btn1.className = "btn btn-primary btn-sm";
        btn1.value = "EDIT";
        btn1.onclick = (() => { onEdit(stat[i].id, "edit",j) });
        cell5.appendChild(btn1);
        cell5.setAttribute("id", stat[i].id + "c");
        var btn = document.createElement('input');
        btn.type = "button";
        btn.className = "btn btn-primary btn-sm";
        btn.value = "DELETE";
        btn.onclick = (() => { confirm('Are you sure you want to delete it?') ? onDelete(stat[i].id, "delete", j) : ''; });
        cell6.appendChild(btn);
      }
    });
  }