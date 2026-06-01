//VALIDA LOGIN
function logon(campo){
	if (campo.login.value == ""){ 
		alert("Informe seu login!");
		campo.login.focus();
		return (false); 
	}
	
	if (campo.senha.value == ""){ 
		alert("Informe sua senha!");
		campo.senha.focus();
		return (false); 
	}
}

