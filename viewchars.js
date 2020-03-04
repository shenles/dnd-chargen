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
	//document.getElementById('chviewform').submit();
	document.createElement('dummyform').submit.call(document.chviewform);

}

function editChar(toEdit) {

	console.log(toEdit);
	//document.getElementById('chviewform').submit();
	document.createElement('dummyform').submit.call(document.chviewform);

}

function levelUpChar(toLevelUp) {

	console.log(toLevelUp);
	//document.getElementById('chviewform').submit();
	document.createElement('dummyform').submit.call(document.chviewform);

}
