function echeck(str) {
	var at="@";
	var dot=".";
	var lat=str.indexOf(at);
	var lstr=str.length;
	var ldot=str.indexOf(dot);
	var pattern=/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|me|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
	if (str.indexOf(at)==-1){
		alert("Please enter your Email like (john@abc.com)");
		return false;
	}
	if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		alert("Please enter your Email like (john@abc.com)");
		return false;
	}
	if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		alert("Please enter your Email like (john@abc.com)");
		return false;
	}
	if (str.indexOf(at,(lat+1))!=-1){
		alert("Please enter your Email like (john@abc.com)");
		return false;
	}
	if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		alert("Please enter your Email like (john@abc.com)");
		return false;
	}
	if (str.indexOf(dot,(lat+2))==-1){
		alert("Please enter your Email like (john@abc.com)");
		return false;
	}
	if (str.indexOf(" ")!=-1){
		alert("Please enter your Email like (john@abc.com)");
		return false;
	}
	if(!pattern.test(str)){         
		alert("Please enter your Email like (john@abc.com)");
		return false;   
    }
	return true;				
}



function validate()
{
	
	if(document.frmregister.name.value=="" || document.frmregister.name.value==null)
	{
		alert("Please enter your Name like (John George)");
		document.frmregister.name.focus();
		return false;
	}

	if(document.frmregister.nick_name.value=="" || document.frmregister.nick_name.value==null)
	{
		alert("Please enter your Nick Name like (Jonny)");
		document.frmregister.nick_name.focus();
		return false;
	}

if(document.frmregister.email.value=="" || document.frmregister.email.value==null)
	{
		alert("Please enter your Email like (john@abc.com)");
		document.frmregister.email.focus();
		return false;
	}
	if (echeck(document.frmregister.email.value)==false){
		document.frmregister.email.focus();
		return false;
	}

	if(document.frmregister.password.value=="" || document.frmregister.password.value==null)
	{
		alert("Please enter your Password");
		document.frmregister.password.focus();
		return false;
	}

	return true;
}