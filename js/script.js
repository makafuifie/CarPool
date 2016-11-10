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
		}

		document.getElementById("sendSMS").onclick=getContacts();  

	};
	function onPhotoDataSuccess(imageData) {

		var smallImage = document.getElementById('smallImage');

		smallImage.style.display = 'block';

		smallImage.src = "data:image/jpeg;base64," + imageData;

	}

	function onFail(message) {

		alert('Failed because: ' + message);

	}

	function getContacts(){
		var options      = new ContactFindOptions();
		//options.filter   = "Bob";
		options.multiple = true;
		options.desiredFields = [navigator.contacts.fieldType.id];
		options.hasPhoneNumber = true;
		var fields       = [navigator.contacts.fieldType.displayName, navigator.contacts.fieldType.name];
		navigator.contacts.find(fields, onContactsSuccess, onContactsError, options);
	}
	function onContactsSuccess(contacts) {
		alert('Found ' + contacts.length + ' contacts.');
	}

	function onContactsError(contactError) {
		alert('onError!');
	}

})();


(function(){
	document.addEventListener('deviceready', onDeviceReady.bind(this), false);
	function onDeviceReady(){

		navigator.geolocation.getCurrentPosition(onSuccess, onError, { timeout: 30000 });
		



		function onSuccess(position) {
			//console.log('success');
			// var lat=position.coords.latitude;
			// var lang=position.coords.longitude;

			var lat = localStorage.getItem("lat");
			var long = localStorage.getItem("long");

			var myLatlng = new google.maps.LatLng(lat, lang);
			var mapOptions = {zoom: 16, center:myLatlng, mapTypeId: google.maps.MapTypeId.ROADMAP}
			var map = new google.maps.Map(document.getElementById('map'), mapOptions);
			var marker = new google.maps.Marker({position: myLatlng, map: map});
		}

		function onError(error){
			alert('code: '+error.code+'\n'+
				'message: '+error.message + '\n');
		}


	};
	google.maps.event.addDomListener(window, 'load', onSuccess);
})();



$(document).ready(function() {
    $('a[href="#navbar-more-show"], .navbar-more-overlay').on('click', function(event) {
		event.preventDefault();
		$('body').toggleClass('navbar-more-show');
		if ($('body').hasClass('navbar-more-show'))	{
			$('a[href="#navbar-more-show"]').closest('li').addClass('active');
		}else{
			$('a[href="#navbar-more-show"]').closest('li').removeClass('active');
		}
		return false;
	});
});