$('#deletechar').click(function() {

	var btnValue = $(this).val();
	var btnType = $(this).name;

	$.ajax({
		type: "POST",
		url: "deletechar.php",
		data: {charid: btnValue, charaction: btnType}
	}).done(function() {
		alert("completed");
	});
});