function showModal(subject,filetypes){
	$("#exampleModalLong").modal();
	$("#exampleModalLongTitle").append(subject);
	$("#filetypes").val(filetypes);
}

function sampleDownload(filetypes){
	var url = "common/samplefiledownload?file_names="+filetypes;
	window.location.href =url
}