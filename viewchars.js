function deleteChar() {

	var btnVal = $(this).id;

	$.ajax({
		type: "POST",
		url: "deletechar.php",
		data: {'charid': btnVal}
	}).done(function() {
		alert("completed");
	});
}