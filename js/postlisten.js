function postcoderedirect_ajax() {
	let postcode = document.forms["redirect"]["redirector"].value;//get user input
	if ( postcode === "") { 
	document.getElementById("postredirectshow").innerHTML = (postlisten_vars.pruse);
	return ;}
	let response = postlisten_vars.prwait;
	postcode = document.forms["redirect"]["redirector"].value;//get user input
	let check = response.search("user input"); //look for user input
	if (check >= 0) {
	postcode = postcode.toUpperCase(); //uppercase user input
	response = response.substring(0, check) + postcode + response.substring(check + 10);//constuct final message
	document.getElementById("postredirectshow").innerHTML = (response);} // display final message	
	else {document.getElementById("postredirectshow").innerHTML = (response);}
	var data = {
	'action'   : 'redirect_ajax_call', // the name of the PHP function we are calling!
	'usercode' : document.forms["redirect"]["redirector"].value}; //value to send to function
	jQuery.post(postlisten_vars.ajaxurl, data, function(response) { // send data and respond
	switch(response) {// act on the final response
	case "1":
	response = postlisten_vars.prwrong;
	check = response.search("user input"); //look for user input
	if (check >= 0) {
	postcode = postcode.toUpperCase(); //uppercase user input
	response = response.substring(0, check) + postcode + response.substring(check + 10);}//constuct final message
	document.getElementById("postredirectshow").innerHTML = (response); // display final message
	break;
	case "2":
	response = postlisten_vars.prneg;
	let url = (response).substring(0, 4);// simple check for url
	let result = /http/.test(url);
	if (result == true) {// if response is a url
	window.location.href = (response);// redirect to the final url
	break;}
	check = response.search("user input"); //look for user input
	if (check >= 0) {
	postcode = postcode.toUpperCase();
	response = response.substring(0, check) + postcode + response.substring(check + 10);}
	document.getElementById("postredirectshow").innerHTML = (response); // display final message
	break;
	default:
	window.location.href = (response);}});} // display final message	