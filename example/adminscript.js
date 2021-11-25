//first
document.getElementById("inputtag1").style.display = "none";
document.getElementById("savechange1").style.display = "none";
document.getElementById("savechange1").addEventListener('click', function(){
    var textptag = document.getElementById("inputtag1").value;
    document.getElementById("inputtag1").style.display = "none";
    document.getElementById("train_num").textContent = textptag;
    document.getElementById("train_num").style.display = "block";
    document.getElementById("savechange1").style.display = "none";
    document.getElementById("changetag1").style.display = "block";
});
document.getElementById("changetag1").addEventListener('click', function(){
    var textptag = document.getElementById("train_num").textContent;
    document.getElementById("train_num").style.display = "none";
    document.getElementById("inputtag1").value = textptag;
    document.getElementById("inputtag1").style.display = "block";
    document.getElementById("changetag1").style.display = "none";
    document.getElementById("savechange1").style.display = "block";
});
//second
document.getElementById("inputtag2").style.display = "none";
document.getElementById("savechange2").style.display = "none";
document.getElementById("savechange2").addEventListener('click', function(){
    var textptag = document.getElementById("inputtag2").value;
    document.getElementById("inputtag2").style.display = "none";
    document.getElementById("train_name").textContent = textptag;
    document.getElementById("train_name").style.display = "block";
    document.getElementById("savechange2").style.display = "none";
    document.getElementById("changetag2").style.display = "block";
});
document.getElementById("changetag2").addEventListener('click', function(){
    var textptag = document.getElementById("train_name").textContent;
    document.getElementById("train_name").style.display = "none";
    document.getElementById("inputtag2").value = textptag;
    document.getElementById("inputtag2").style.display = "block";
    document.getElementById("changetag2").style.display = "none";
    document.getElementById("savechange2").style.display = "block";
});
//Third
document.getElementById("inputtag3").style.display = "none";
document.getElementById("savechange3").style.display = "none";
document.getElementById("savechange3").addEventListener('click', function(){
    var textptag = document.getElementById("inputtag3").value;
    document.getElementById("inputtag3").style.display = "none";
    document.getElementById("train_src").textContent = textptag;
    document.getElementById("train_src").style.display = "block";
    document.getElementById("savechange3").style.display = "none";
    document.getElementById("changetag3").style.display = "block";
});
document.getElementById("changetag3").addEventListener('click', function(){
    var textptag = document.getElementById("train_src").textContent;
    document.getElementById("train_src").style.display = "none";
    document.getElementById("inputtag3").value = textptag;
    document.getElementById("inputtag3").style.display = "block";
    document.getElementById("changetag3").style.display = "none";
    document.getElementById("savechange3").style.display = "block";
});
//fourth
document.getElementById("inputtag4").style.display = "none";
document.getElementById("savechange4").style.display = "none";
document.getElementById("savechange4").addEventListener('click', function(){
    var textptag = document.getElementById("inputtag4").value;
    document.getElementById("inputtag4").style.display = "none";
    document.getElementById("train_dest").textContent = textptag;
    document.getElementById("train_dest").style.display = "block";
    document.getElementById("savechange4").style.display = "none";
    document.getElementById("changetag4").style.display = "block";
});
document.getElementById("changetag4").addEventListener('click', function(){
    var textptag = document.getElementById("train_dest").textContent;
    document.getElementById("train_dest").style.display = "none";
    document.getElementById("inputtag4").value = textptag;
    document.getElementById("inputtag4").style.display = "block";
    document.getElementById("changetag4").style.display = "none";
    document.getElementById("savechange4").style.display = "block";
});







//first
document.getElementById("inputtag5").style.display = "none";
document.getElementById("savechange5").style.display = "none";
document.getElementById("savechange5").addEventListener('click', function(){
    var textptag = document.getElementById("inputtag5").value;
    document.getElementById("inputtag5").style.display = "none";
    document.getElementById("train_price").textContent = textptag;
    document.getElementById("train_price").style.display = "block";
    document.getElementById("savechange5").style.display = "none";
    document.getElementById("changetag5").style.display = "block";
});
document.getElementById("changetag5").addEventListener('click', function(){
    var textptag = document.getElementById("train_price").textContent;
    document.getElementById("train_price").style.display = "none";
    document.getElementById("inputtag5").value = textptag;
    document.getElementById("inputtag5").style.display = "block";
    document.getElementById("changetag5").style.display = "none";
    document.getElementById("savechange5").style.display = "block";
});
//second
document.getElementById("inputtag6").style.display = "none";
document.getElementById("savechange6").style.display = "none";
document.getElementById("savechange6").addEventListener('click', function(){
    var textptag = document.getElementById("inputtag6").value.split("T");
    var div1 = textptag[0].split("-");
    var num1 = div1[1]+"/"+div1[2]+"/"+div1[0];
    console.log(div1+" "+num1);
    document.getElementById("inputtag6").style.display = "none";
    document.getElementById("train_departdate").textContent = num1+" "+textptag[1];
    document.getElementById("train_departdate").style.display = "block";
    document.getElementById("savechange6").style.display = "none";
    document.getElementById("changetag6").style.display = "block";
});
document.getElementById("changetag6").addEventListener('click', function(){
    var textptag = document.getElementById("train_departdate").textContent.split(" ");
    var div1 = textptag[0].split("/");
    var num1 = div1[2]+"-"+div1[0]+"-"+div1[1];
    document.getElementById("train_departdate").style.display = "none";
    document.getElementById("inputtag6").value = num1+"T"+textptag[1];
    document.getElementById("inputtag6").style.display = "block";
    document.getElementById("changetag6").style.display = "none";
    document.getElementById("savechange6").style.display = "block";
});
//Third
document.getElementById("inputtag7").style.display = "none";
document.getElementById("savechange7").style.display = "none";
document.getElementById("savechange7").addEventListener('click', function(){
    var textptag = document.getElementById("inputtag7").value.split("T");
    var div1 = textptag[0].split("-");
    var num1 = div1[1]+"/"+div1[2]+"/"+div1[0]; 
    document.getElementById("inputtag7").style.display = "none";
    document.getElementById("train_arrivaldate").textContent =num1+" "+textptag[1];
    document.getElementById("train_arrivaldate").style.display = "block";
    document.getElementById("savechange7").style.display = "none";
    document.getElementById("changetag7").style.display = "block";
});
document.getElementById("changetag7").addEventListener('click', function(){
    var textptag = document.getElementById("train_arrivaldate").textContent.split(" ");
    var div1 = textptag[0].split("/");
    var num1 = div1[2]+"-"+div1[0]+"-"+div1[1];
    document.getElementById("train_arrivaldate").style.display = "none";
    document.getElementById("inputtag7").value = num1+"T"+textptag[1];
    document.getElementById("inputtag7").style.display = "block";
    document.getElementById("changetag7").style.display = "none";
    document.getElementById("savechange7").style.display = "block";
});
//fourth
document.getElementById("inputtag8").style.display = "none";
document.getElementById("savechange8").style.display = "none";
document.getElementById("savechange8").addEventListener('click', function(){
    var textptag = document.getElementById("inputtag8").value;
    document.getElementById("inputtag8").style.display = "none";
    document.getElementById("train_runson").textContent = textptag;
    document.getElementById("train_runson").style.display = "block";
    document.getElementById("savechange8").style.display = "none";
    document.getElementById("changetag8").style.display = "block";
});
document.getElementById("changetag8").addEventListener('click', function(){
    var textptag = document.getElementById("train_runson").textContent;
    document.getElementById("train_runson").style.display = "none";
    document.getElementById("inputtag8").value = textptag;
    document.getElementById("inputtag8").style.display = "block";
    document.getElementById("changetag8").style.display = "none";
    document.getElementById("savechange8").style.display = "block";
});