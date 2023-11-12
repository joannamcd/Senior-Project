function handleFormSubmit(event) {
    event.preventDefault();
    
    const data = new FormData(event.target);
    
    const formJSON = Object.fromEntries(data.entries());
    
    //const results = document.querySelector('.results pre');
    //results.innerText = JSON.stringify(formJSON, null, 2);
    //console.log(JSON.stringify(formJSON, null, 2));
    //const newUserData = JSON.stringify(formJSON, null, 2);
   // console.log(newUserData);
   

  var myTextPath = formJSON.title;
  myTextPath = myTextPath.replace(/ /g, "_");

 


	console.log(formJSON.title + ", " + formJSON.username + ", " + formJSON.veri + ", " + myTextPath + ", " + formJSON.atype + ", " + formJSON.texts + ", " + formJSON.myFile);
	
	//var dump = formJSON.artist + ", " + formJSON.albumName + ", " + formJSON.genre + ", " + formJSON.date + ", " + formJSON.condition1 + ", " + formJSON.condition2 + ", " + formJSON.number + ", " + formJSON.meeting;
	
	const order  = {"article_title": formJSON.title,
					"author_username": formJSON.username,
					"author_verification": formJSON.veri,
					"article_text_path": myTextPath,
					"article_type": formJSON.atype,
          "article_texts": formJSON.texts,
          "article_img": formJSON.myFile
					}
	
	console.log(order);
	const sendData = JSON.stringify(order, null, 2);
	console.log(sendData);
	sendOrder(sendData);
  
  }
  
  const form = document.querySelector('.order-form');
  form.addEventListener('submit', handleFormSubmit);
  

    // function previewImage() {
    //     var file = document.getElementById("myfile").files
    //     if (file.length > 0) {
    //         var fileReader = new FileReader()
 
    //         fileReader.onload = function (event) {
    //             document.getElementById("preview").setAttribute("src", event.target.result)
    //         }
 
    //         fileReader.readAsDataURL(file[0])
	// 		var fileName = document.getElementById('myfile').value;

    //     }
		
		// var fu1 = document.getElementById("myfile");
		// finalFileName = "/" + fu1.value.split(/(\\|\/)/g).pop();
		//alert("You selected " + finalFileName );

		
    // }

  //var orderResponse = "";
  //var pickup_address = "";
  //var destination_address = "";
  // var destCoord = "";
  // var pickupCoord = "";
  // var timeToDest = "";
  // var timeToPickup = "";
  // var vehicleCoord = "";
  // var vehicleID = "";

  function previewImage(){
    document.getElementById("preview").src = document.getElementById("myFile").value;
  }

  function sendOrder(newUserData) {
    const url = "http://165.22.183.12/createdArticle";
    var info = newUserData;
  
    const params = {
      headers: {
        "content-type": "application/json; charset=UTF-8",
      },
      body: info,
      method: "POST",
    };
  
    fetch(url, params)
      .then((data) => {
        return data.json();
      })
      .then((result) => {
        //console.log(result);
        orderResponse = result.data;
        console.log(orderResponse);
        // test1 = result.data.destCoord;


    window.location.href = "http://165.22.183.12/pagesPrev.html";

      })
      .catch((error) => console.log(error));
  
  }  
  
  
  
  
//   function clearUser(){
// 	localStorage.clear();
// }


// function redirect(){
// 	if(localStorage.getItem("username") === null)
// 	{
		
// 		window.location.href = "http://146.190.113.162/homepage.html";
// 	}
// 	else
// 	{
// 		window.location.href = "http://146.190.113.162/welcomePage.html";
// 	}
// }




//function loginCheck()
//{
//  if (localStorage.getItem("username") === null) {
//    alert("You need to login!")
//    window.location.href = "";
//  }
//}