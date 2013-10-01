/*---------------------------------------------------------------------------------------------          
  Autor : Cristian Camilo Moreno         
  Fecha Creación : 10/01/2013          
  Propósito : Generar una libreria de validaciones de campos con expresiones regulares       
  Entradas : Ninguna 
  Fecha modificación     
  Cambio realizado :  
 -----------------------------------------------------------------------------------------------*/    
/*
Recuerde colocaer la siguiente linea en el head de su html
<script type="text/javascript" src="RegExpresion.js"></script>
*/

function ValidateAlphaNumeric(NameObj,LabelError)
{
	var str = document.getElementById(NameObj).value;
	var myTextField = document.getElementById (NameObj) ;
	var strCadena = myTextField.value;
	var strpatron = /^[a-zA-Z0-9 _-]*$/;
	var newVal ="";
	var Error ="";
	var LabelVisible ="none";
	if(strCadena.search(strpatron))
	{
		Error="Solo se permiten letras o números.";
		LabelVisible="";
		for(i=0;i < str.length;i++)
		{	for(j=0;j < str.length;j++)
			{	
				Caracter = str.substring(j,j+1);
				if(!Caracter.search(strpatron) > 0)
				{
					//alert("NO");
				}
				else
				{
					newVal= str.replace(Caracter,"");
				}
			}
			str=newVal;
		}
		document.getElementById(NameObj).value = newVal;
		
	}
	LabelError.innerHTML=Error;	
	LabelError.style.display=LabelVisible;
	
}
function ValidateNumeric(NameObj)
{

	var str = document.getElementById(NameObj).value;
	var myTextField = document.getElementById (NameObj) ;
	var strCadena = myTextField.value;
	var strpatron = /^[0-9]*$/;
	var newVal ="";
	var Error ="";
	var LabelVisible ="none";
	if(strCadena.search(strpatron))
	{
		Error="Solo se permiten números.";
		LabelVisible="";
		for(i=0;i < str.length;i++)
		{	for(j=0;j < str.length;j++)
			{	
				Caracter = str.substring(j,j+1);
				if(!Caracter.search(strpatron) > 0)
				{
					//alert("NO");
				}
				else
				{
					newVal= str.replace(Caracter,"");
				}
			}
			str=newVal;
		}
		document.getElementById(NameObj).value = newVal;
		
	}
	LabelError.innerHTML=Error;	
	LabelError.style.display=LabelVisible;
}
function ValidateApha(NameObj)
{

	var str = document.getElementById(NameObj).value;
	var myTextField = document.getElementById (NameObj) ;
	var strCadena = myTextField.value;
	var strpatron = /^[a-zA-Z _-]*$/;
	var newVal ="";
	var Error ="";
	var LabelVisible ="none";
	if(strCadena.search(strpatron))
	{
		Error="Solo se permiten letras.";
		LabelVisible="";
		for(i=0;i < str.length;i++)
		{	for(j=0;j < str.length;j++)
			{	
				Caracter = str.substring(j,j+1);
				if(!Caracter.search(strpatron) > 0)
				{
					//alert("NO");
				}
				else
				{
					newVal= str.replace(Caracter,"");
				}
			}
			str=newVal;
		}
		document.getElementById(NameObj).value = newVal;
		
	}
	LabelError.innerHTML=Error;	
	LabelError.style.display=LabelVisible;

}
function ValidateEmail(NameObj)
{
	var str = document.getElementById(NameObj).value;
	var myTextField = document.getElementById (NameObj) ;
	var strCadena = myTextField.value;
	var strpatron = /^([a-z]+[a-z1-9._-]*)@{1}([a-z1-9\.]{2,})\.([a-z]{2,3})$/;
	var newVal ="";
	var Error ="";
	var LabelVisible ="none";
	if(strCadena.search(strpatron))
	{
		Error="No es un mail valido.";
		LabelVisible="";
		for(i=0;i < str.length;i++)
		{	for(j=0;j < str.length;j++)
			{	
				Caracter = str.substring(j,j+1);
				if(!Caracter.search(strpatron) > 0)
				{
					//alert("NO");
				}
				else
				{
					newVal= str.replace(Caracter,"");
				}
			}
			str=newVal;
		}
		document.getElementById(NameObj).value = newVal;
		
	}
	LabelError.innerHTML=Error;	
	LabelError.style.display=LabelVisible;
}