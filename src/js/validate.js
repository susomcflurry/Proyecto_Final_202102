//Nombre de autor:Jesús Canga Galván
//Curso:2 DAW
//Escuela: Escuela Virgen de Guadalupe
//Proyecto fin de ciclo: Proyecto de Sistema de Gestión del Conocimiento
//Año:2021


pwverify=0;
mailverify=0;

function validarcorreo() {
	var usuario;

	usuario=document.getElementById('usu').value;


	var RegExpMail=new RegExp(/^[^@]+@[^@]+\.[A-Za-z]{2,}$/);
	if(RegExpMail.test(usuario))
	{

		mailverify=1;

	}
	else
	{
		mailverify=0;
	}
}
function validarcontrasenia() {

	pw1=document.getElementById('pw1').value;
	pw2=document.getElementById('pw2').value;
	if(pw1==pw2)
	{

		pwverify=1;
	}
	else
	{
		pwverify=0;
	}

	if(pwverify==1 && mailverify==1)
	{
		document.getElementById("regisbtn").removeAttribute("disabled");
	}


}