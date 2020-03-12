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
	document.getElementById("chardetaildisplayid").innerHTML = toView;
	window.location.href = "./chardetail.php";

}

function editChar(toEdit) {

	console.log(toEdit);

}

function levelUpChar(toLevelUp) {

	console.log(toLevelUp);

}
