Dropzone.options.box = {
	maxFilesize: 2,
	maxFiles: 5,
	acceptedFiles: ".jpg, .png",
	autoProcessQueue: true,

	init: function() {
		var submitButton = document.querySelector("#submit")
			myDropzone = this; 

		submitButton.addEventListener("click", function() {
			myDropzone.processQueue();
		});
	}
}