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

	$.ajax({
		type: "POST",
		url: "chardetail.php",
		data: {'viewcharid': toView}
	}).done(function() {
		window.location.assign("https://dnd-chargen.herokuapp.com/chardetail.php");
	});

}

function editChar(toEdit) {

	console.log(toEdit);

	$.ajax({
		type: "POST",
		url: "chardetail.php",
		data: {'editcharid': toEdit}
	}).done(function() {
		window.location.assign("https://dnd-chargen.herokuapp.com/chardetail.php");
	});

}

function levelUpChar(toLevelUp) {

	console.log(toLevelUp);

	$.ajax({
		type: "POST",
		url: "chardetail.php",
		data: {'levelupcharid': toLevelUp}
	}).done(function() {
		window.location.assign("https://dnd-chargen.herokuapp.com/chardetail.php");
	});

}
