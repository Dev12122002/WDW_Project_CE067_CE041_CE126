var access_type;
$('#access1').on('click',function(){

	 access_type =  $("input[name='access_type']:checked").val();
    if (access_type === undefined) {
	   alert('Error : Please choose a proper visibility mode');
    }
    else { 
	 $.ajax({
		 url: 'uploadpdf.php',
		 type: 'POST',
		 data: {
			 'access_flag': 1,
			 'access_type': access_type,
		 },
		 success: function(response){
			 if(response == 'invalid'){
				 alert('Error: Something went wrong...');
			 }
			 
		 }
	 });
    }

});

$('#access2').on('click',function(){

    access_type =  $("input[name='access_type']:checked").val();
    if (access_type === undefined) {
	   alert('Error : Please choose a proper visibility mode');
    }
    else { 
	 $.ajax({
		 url: 'uploadpdf.php',
		 type: 'POST',
		 data: {
			 'access_flag': 1,
			 'access_type': access_type,
		 },
		 success: function(response){
			 if(response == 'invalid'){
				 alert('Error: Something went wrong...');
			 }

		 }
	 });
    }

});


document.querySelector('#upload-button').addEventListener('click', function() {
	// user has not chosen any file
	

	if(access_type === undefined){
		alert('Error : Please choose a proper visibility mode');
		return;
	}

	if(document.querySelector('#file-input').files.length == 0) {
		alert('Error : No file selected');
		return;
	}

	// first file that was chosen
	let file = document.querySelector('#file-input').files[0];

	// allowed types
	let allowed_mime_types = [ 'application/pdf' ];
	
	// allowed max size in MB
	let allowed_size_mb = 100;
	
	// validate file type
	if(allowed_mime_types.indexOf(file.type) == -1) {
		alert('Error : Incorrect file type');
		return;
	}

	// validate file size
	if(file.size > allowed_size_mb*1024*1024) {
		alert('Error : Exceeded size');
		return;
	}

	// validation is successful
	alert('You have chosen the file ' + file.name);

	// upload file now
	let data = new FormData();

// file selected by the user
// in case of multiple files append each of them
data.append('file', document.querySelector('#file-input').files[0]);
data.append('text', access_type);

let request = new XMLHttpRequest();
request.open('POST', 'uploadpdf.php'); 

// upload progress event
request.upload.addEventListener('progress', function(e) {
	let percent_complete = (e.loaded / e.total)*100;
	
	// percentage of upload completed
	console.log(percent_complete);
});

// AJAX request finished event
request.addEventListener('load', function(e) {
	// HTTP status message
	console.log(request.status);
    //request.send(data);
	// request.response will hold the response from the server
	console.log(request.response);
	if(request.response == 'save'){
		alert("PDF uploaded Successfully !!");
	}
	else{
		alert("Something went wrong... Please try again...");
	}
	window.location.replace("http://localhost/book_store_login/project/home.php");
});

// send POST request to server side script
request.send(data);
});


    //var x = document.getElementById("myRadio").checked;
	//console.log(x);
    
	

