
function getPage(url) {
	// Call Google Analytics Event Tracking here because the code is random and there
	// is no better place to  do it.
	if (typeof logUrlEvent == 'function') {
		logUrlEvent(url);
	}

	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
  } else {
		// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 

	xmlhttp.onreadystatechange=function() {
	  if(xmlhttp.readyState < 4) {
		} else if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	   	//alert(xmlhttp.responseText);
			var strA = xmlhttp.responseText.split('STRINGTOBREAKHTML');
			document.getElementById('UpperMainDiv').innerHTML = strA[0];
			document.getElementById('DownMainDiv').innerHTML = strA[1];
		}
  }
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}
