
<body>

<label>NIF</label>

<input name="NIF"               id="NIF" />

<br />

<label>Pass</label>

<input name="contrasenia" id="contrasenia" />

<br />

<a href="#" onclick="enviar()">Validar</a>

</body>



<script>

function enviar() {

       var xmlhttp = new XMLHttpRequest();

       xmlhttp.onreadystatechange = function() {

              if ((xmlhttp.status == 200) && (xmlhttp.readyState == 4))

                     alert(xmlhttp.responseText);

       }

       xmlhttp.open("POST", "EJER2.PHP");

       xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

       xmlhttp.send("NIF=" + NIF.value + "&pass=" + contrasenia.value);

}

</script>
