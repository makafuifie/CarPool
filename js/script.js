(function() {

	document.addEventListener('deviceready', onDeviceReady.bind(this), false);
	var pictureSource;
	var destinationType;
	function onDeviceReady() {
		pictureSource = navigator.camera.PictureSourceType;
		destinationType = navigator.camera.DestinationType;
		console.log("yah");

		document.getElementById("capturePhoto").onclick = function() {
			 console.log("yah");
			navigator.camera.getPicture(onPhotoDataSuccess, onFail, {
				quality : 50,

				destinationType : destinationType.DATA_URL
			});
		};

		// document.getElementById("sendSMS").onclick=getContacts();  

	};
	function onPhotoDataSuccess(imageData) {

		var smallImage = document.getElementById('smallImage');

		smallImage.style.display = 'block';

		smallImage.src = "data:image/jpeg;base64," + imageData;

	}

	function onFail(message) {

		alert('Failed because: ' + message);

	}

	// function getContacts(){
	// 	var options      = new ContactFindOptions();
	// 	//options.filter   = "Bob";
	// 	options.multiple = true;
	// 	options.desiredFields = [navigator.contacts.fieldType.id];
	// 	options.hasPhoneNumber = true;
	// 	var fields       = [navigator.contacts.fieldType.displayName, navigator.contacts.fieldType.name];
	// 	navigator.contacts.find(fields, onContactsSuccess, onContactsError, options);
	// }
	// function onContactsSuccess(contacts) {
	// 	alert('Found ' + contacts.length + ' contacts.');
	// }

	// function onContactsError(contactError) {
	// 	alert('onError!');
	// }

})();


(function(){
	document.addEventListener('deviceready', onDeviceReady.bind(this), false);
	function onDeviceReady(){

		

	};
	
})();



