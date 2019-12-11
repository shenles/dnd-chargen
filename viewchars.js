function deleteChar() {

	var btnVal = $(this).id;
	console.log(btnVal);

	$.ajax({
		type: "POST",
		url: "deletechar.php",
		data: {'charid': btnVal}
	}).done(function() {
		alert("completed");
	});
}