function incrementValue()
{
    //var name=document.getElementById('name').value;
    //var stock=parseInt(document.getElementById('stock').value, 10);
    //document.getElementById("demo").innerHTML = "In increment func";
    var photoid= parseInt(document.getElementById('photoid').value, 10);
    document.getElementById("demo").innerHTML = "Got Photo id";
    var incDec="number"+"_"+photoid;
    document.getElementById("demo").innerHTML = incDec;
    //document.getElementById("demo").innerHTML = "IncDec Created";
    var value = parseInt(document.getElementById(incDec).value, 10);
    value = isNaN(value) ? 0 : value;
    if(value<10)
    {
        value++;
        document.getElementById(incDec).value = value;
    }
}
function decrementValue()
{
    //var id=parseInt(document.getElementById('photoid').value, 10);
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    if(value>1)
    {
        value--;
        document.getElementById('number').value = value;
    }
}

function checkBoxClick()
{
    var checkBox = document.getElementById("myCheck");
    var button = document.getElementById("button");
    if (checkBox.checked == true)
    {
        button.hidden = "";
    }
    else
    {
        button.hidden = "hidden";
    }
}