




// function changeCSS(cssFile, cssLinkIndex) {

//     var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);

//     var newlink = document.createElement("link");
//     newlink.setAttribute("rel", "stylesheet");
//     newlink.setAttribute("type", "text/css");
//     newlink.setAttribute("href", cssFile);

//     document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
// }

// function registration() {
//         location.href = "registration.php";
// }

$(document).ready( function() { 

/* Define menu click toggle handlers */
	$("#bwbutton").click(function()
	{
		var oldlink = document.getElementsByTagName("link").item(0);

    var newlink = document.createElement("link");
    newlink.setAttribute("rel", "stylesheet");
    newlink.setAttribute("type", "text/css");
    newlink.setAttribute("href", 'css/bw.css');

    document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
	});

	$("#registration").click(function()
	{location.href = "registration.php";
	}
		);
	}

 });