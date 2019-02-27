function redact(id,nameId,priceId,idButton) {
    var s = document.getElementById(idButton);
    if (s.value==='修改'){
        s.value='提交';
        document.getElementById(nameId).disabled = false;
        document.getElementById(priceId).disabled = false;
    }else{
        s.value='修改';
        var name = document.getElementById(nameId);
        name.disabled = true;
        var price = document.getElementById(priceId);
        price.disabled = true;
        var form = document.createElement("form");
        form.action = "update.php";
        form.method = "POST";
        var inputN = document.createElement("input");
        inputN.type = "hidden";
        inputN.name = "name";
        inputN.value = name.value;
        var inputP = document.createElement("input");
        inputP.type = "hidden";
        inputP.name = "price";
        inputP.value = price.value;
        var inputID = document.createElement("input");
        inputID.type = "hidden";
        inputID.name = "id";
        inputID.value = id;
        form.appendChild(inputID);
        form.appendChild(inputP);
        form.appendChild(inputN);
        document.body.appendChild(form);
        form.submit();
        // remove form from document
        document.body.removeChild(form);
    }
}