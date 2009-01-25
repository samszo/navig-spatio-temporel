// ajax.js JSON
// �crit par Bernhard Rieder

function AjaxRequest(url,fonction_sortie) {
  
 	this.url = encodeURI(url);								// encode tous les caractères speciaux
 	this.fonction_sortie = fonction_sortie;
	
	var ajaxRequest = this;
	
    if (window.XMLHttpRequest) {										   
       
	    this.req = new XMLHttpRequest();										// pour XMLHttpRequest natif (Gecko, Safari, Opera)
		
		try {																					
	    	netscape.security.PrivilegeManager.enablePrivilege("UniversalBrowserRead");		// Pour ouvrir la sécurité de Mozilla
	   	} catch (e) {}
		
		this.req.onreadystatechange = function () { ajaxRequest.processReqChange(); }
        
		this.req.open("GET", this.url, true);
		this.req.setRequestHeader("If-Modified-Since", "Sat, 1 Jan 2000 00:00:00 GMT");
        this.req.send(null);
		
		try {
	    	console.log("request: "+url);
	   	} catch (e) {}
    
	} else if (window.ActiveXObject) {
		
	    this.req = new ActiveXObject("Microsoft.XMLHTTP");						 // pour IE/Windows ActiveX
	    
        if (this.req) {
            this.req.onreadystatechange = this.req.onreadystatechange = function () { ajaxRequest.processReqChange(); }
            this.req.open("GET", this.url, true);
			this.req.setRequestHeader("If-Modified-Since", "Sat, 1 Jan 2000 00:00:00 GMT");
            this.req.send();
		}
		
    } else {
		
		alert("Votre navigateur ne connait pas l'objet XMLHttpRequest.");
	
	}
	
}

AjaxRequest.prototype.processReqChange = function() {

	try {
	   	console.log("state:"+this.req.readyState);
	} catch (e) {}
	
	if (this.req.readyState == 4) {				// quand le fichier est chargé

		if (this.req.status == 200) {			// detécter problèmes de format

			try {
    			netscape.security.PrivilegeManager.enablePrivilege("UniversalBrowserRead");
   			} catch (e) {}
		
			try {
	   			console.log(this.req.responseText);
			} catch (e) {}
		
			var _json = eval("(" + this.req.responseText + ")");
		
			eval(this.fonction_sortie+"(_json)");

		} else {
			
			alert("Il y avait un probleme avec le XML: " + this.req.statusText);
			
		}		
	}
}


