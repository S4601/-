var droppedFiles = false;
var fileName = '';
var $dropzone = $('.dropzone');

$dropzone.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
	e.preventDefault();
	e.stopPropagation();
})
	.on('dragover dragenter', function() {
	$dropzone.addClass('is-dragover');
})
	.on('dragleave dragend drop', function() {
	$dropzone.removeClass('is-dragover');
})
	.on('drop', function(e) {
	droppedFiles = e.originalEvent.dataTransfer.files;
	
	if(droppedFiles.length == 1) {
		fileName = droppedFiles[0]['name'];
		$('.filename').html(fileName);
		$('.dropzone .upload').hide();
	} else {
		fileName = droppedFiles.length;
		$('.filename').html(fileName);
		$('.dropzone .upload').hide();
	}
	/*
	console.log(droppedFiles);
	fileName = droppedFiles[0]['name'];
	$('.filename').html(fileName);
	$('.dropzone .upload').hide();
	*/
});

$("input:file").change(function (){
	if($(this)[0].files.length == 1) {
		fileName = $(this)[0].files[0].name;
		$('.filename').html(fileName);
		$('.dropzone .upload').hide();
	} else {
		fileName = $(this)[0].files.length;
		$('.filename').html(fileName);
		$('.dropzone .upload').hide();
	}
	/*console.log($(this)[0].files.length);
	fileName = $(this)[0].files[0].name;
	$('.filename').html(fileName);
	$('.dropzone .upload').hide();*/
});

