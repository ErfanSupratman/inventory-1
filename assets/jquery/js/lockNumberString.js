function numbersonly(myfield, e, dec){
	var key;
	var keychar;

	if (window.event)
	   key = window.event.keyCode;
	else if (e)
	   key = e.which;
	else
	   return true;
	keychar = String.fromCharCode(key);

	// control keys
	if ((key==null) || (key==0) || (key==8) || 
		(key==9) || (key==13) || (key==27) )
	   return true;

	// numbers
	else if ((("0123456789-").indexOf(keychar) > -1))
	   return true;

	// decimal point jump
	else if (dec && (keychar == "."))
	   {
	   myfield.form.elements[dec].focus();
	   return false;
	   }
	else
	   return false;
}

function phonenumbersonly(myfield, e, dec){
var key;
var keychar;

if (window.event)
   key = window.event.keyCode;
else if (e)
   key = e.which;
else
   return true;
keychar = String.fromCharCode(key);

// control keys
if ((key==null) || (key==0) || (key==8) || 
    (key==9) || (key==13) || (key==27) )
   return true;

// numbers
else if ((("0123456789").indexOf(keychar) > -1))
   return true;

// decimal point jump
else if (dec && (keychar == ","))
   {
   myfield.form.elements[dec].focus();
   return false;
   }
else
   return false;
}



function noNumbers(e){
	var keynum;
	var keychar;
	var numcheck;
	
		if(window.event){
		  keynum = e.keyCode;	  
		  }else if(e.which){
		  keynum = e.which;
		}
		
		keychar = String.fromCharCode(keynum);
		numcheck = /\d/;
		return !numcheck.test(keychar);
}

//lock Enter Key
function handleKeyEnter (field, event) {
	var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
	if (keyCode == 13) {
		var i;
		for (i = 0; i < field.form.elements.length; i++)
			if (field == field.form.elements[i])
				break;
		i = (i + 1) % field.form.elements.length;
		field.form.elements[i].focus();
		return false;
	} else
	return true;
}   

function alphanumeric(myfield, e){
	var key;
	var keychar;

	if (window.event){
	   key = window.event.keyCode;
	}else if (e){
	   key = e.which;
	}else{
	   return true;
	}
	keychar = String.fromCharCode(key);

	// control keys
	if ((key==null) || (key==0) || (key==8) || 
		(key==9) || (key==13) || (key==27) ){
	   return true;
	}

	// numbers
	else if ((("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz").indexOf(keychar) > -1)){
	   return true;
	}
	else {
	   return false;
	}
}
