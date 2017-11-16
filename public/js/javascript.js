




 

// function registration() {
//         location.href = "registration.php";
// }

$(document).ready( function() { 

/* Define menu click toggle handlers */
	$("#bwbutton").on("click", changeCSS());
	
	$("#registration").on("click", function registration() {
         location.href = "registration.php";});
	}

	function changeCSS() {

     var oldlink = document.getElementsByTagName("link").item(0);

     var newlink = document.createElement("link");
     newlink.setAttribute("rel", "stylesheet");
     newlink.setAttribute("type", "text/css");
     newlink.setAttribute("href", cssFile);

     document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
 }
 });