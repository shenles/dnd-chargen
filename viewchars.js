function deleteChar(toDelete) {

	console.log(toDelete);

	$.ajax({
		type: "POST",
		url: "deletechar.php",
		data: {'delcharid': toDelete}
	}).done(function() {
		window.location.reload(true);
	});
}

function viewChar(toView) {

	console.log(toView);
	document.getElementById('viewcharid').requestSubmit();

}

function editChar(toEdit) {

	console.log(toEdit);
	document.getElementById('viewcharid').requestSubmit();

}

function levelUpChar(toLevelUp) {

	console.log(toLevelUp);
	document.getElementById('viewcharid').requestSubmit();

}
