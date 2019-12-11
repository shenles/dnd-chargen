function deleteChar(toDelete) {

	console.log(toDelete);

	$.ajax({
		type: "POST",
		url: "viewchars.php",
		data: {'delcharid': toDelete}
	}).done(function() {
		alert("completed");
	});
}