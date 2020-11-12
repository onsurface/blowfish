<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="main.css">
		<script src="blowfish.js" type="text/javascript"></script>
	</head>
	<body>
	<div class="container">
	<div class="form-data">
	<div class="text flex-basis">
		<div><p><i class="fa fa-unlock-alt" aria-hidden="true"></i>Blowfish</p></div>
	</div>
	<form class="flex-basis" action="" id="form-data" autocomplete="off">
		<div class="form-box">
			<textarea placeholder="Escriba el mensaje que desea encriptar" id="message"></textarea>

		</div>
		<div class="form-box">
			<input type="password" name="password" id="password" placeholder="Escriba la clave publica">
		</div>
		<div id="message-encrypt" class="notificacion"></div>
	<div id="message-decrypt" class="notificacion"></div>

	<div id="correcto" class="correcto"></div>
	<div id="error" class="error"></div>
		<div class="btns">
			<input class="btn bg-red" type="submit" name="encrypt" id="accion" value="Encriptar" onclick="encriptar()">
			<input class="btn bg-green" type="submit" name="decrypt" id="accion" value="Desencriptar" onclick="desencriptar()">
		</div>


	</form>
	
</div>
</div>
	</body>
	</html>	

	<script type="text/javascript">
		const formInfo = document.querySelector("#form-data");
		function encriptar(){
			formInfo.addEventListener("submit", readFormEncript);
		}

				function desencriptar(){
			formInfo.addEventListener("submit", readFormDecrypted);
		}

		function readFormEncript(e){
			e.preventDefault();
			
			document.getElementById("message-decrypt").style.display = "none";
           
			const message = document.querySelector("#message").value;
			const password = document.querySelector("#password").value;
            

			
           
            if (message === "") {
            	document.getElementById("error").style.display = "block";
            	var error = document.getElementById("error");

            	error.innerHTML = "Ingrese su mensaje";
            }else{
             if (password === "") {
            	document.getElementById("error").style.display = "block";
            	var error = document.getElementById("error");

            	error.innerHTML = "Ingrese su contraseña";
            }else{
            	document.getElementById("error").style.display = "none";
            	document.getElementById("message-encrypt").style.display = "block";
            	
            	var blowfishInstance = new Blowfish(password); 
            	var encriptar = blowfishInstance.encrypt(message);
                
            	encriptar = blowfishInstance.base64Encode(encriptar);
            	var messageEncrypt = document.getElementById("message-encrypt");
            	messageEncrypt.innerHTML = encriptar;

            	console.log(message);
            }
			

		}
 }
 		function readFormDecrypted(e){
			e.preventDefault();
			document.getElementById("message-encrypt").style.display = "none";
				
			var message = document.querySelector("#message").value;
			var password = document.querySelector("#password").value;
            var accion = document.querySelector("#accion").value;


			
           
            if (message === "") {
            	document.getElementById("error").style.display = "block";
            	var error = document.getElementById("error");

            	error.innerHTML = "Ingrese su mensaje";
            }else{
             if (password === "") {
            	document.getElementById("error").style.display = "block";
            	var error = document.getElementById("error");

            	error.innerHTML = "Ingrese su contraseña";
            }else{
            	document.getElementById("error").style.display = "none";
            	document.getElementById("message-decrypt").style.display = "block";
            	var blowfishInstance = new Blowfish(password); 
            	
            	message = blowfishInstance.base64Decode(message);

            	var desencriptar = blowfishInstance.decrypt(message);
            	desencriptar = blowfishInstance.trimZeros(desencriptar);
                var messageDecrypt = document.getElementById("message-decrypt");
            	messageDecrypt.innerHTML = desencriptar;
            	
            	console.log(message);
            }
			

		}
 }


	</script>
