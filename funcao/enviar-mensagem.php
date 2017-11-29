<?php
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$mensagem = $_POST["mensagem"];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(
		array(	"secret"=>"6LdX2ToUAAAAAFjJk8NMFgTeN-WtAL5clpXo3J7a",
				"response"=>$_POST["g-recaptcha-response"],
				"remoteip"=>$_SERVER["REMOTE_ADDR"]
	)));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$recaptcha = json_decode(curl_exec($ch), true);
	curl_close($ch);
	if($recaptcha["success"]){
		echo "Nome: " . $nome;
		echo "<br>Email: " . $email;
		echo "<br>Mensagem: " . $mensagem;
	}
	else{
		header("Location: ../index.html");
	}

?>