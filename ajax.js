var xhr = new XMLHttpRequest();
xhr.open('GET','conexion.php');
xhr.onload =function(){
    if(xhr.status==200){
        var json = xhr.responseText;
        console.log(json);
    }else{
        console.log("Existe un error de tipo: " + xhr.status)
    }
} 
xhr.send();
    