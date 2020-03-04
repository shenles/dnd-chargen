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
	//document.getElementById('viewcharid').submit();
	var myform = document.getElementById('viewcharid');
	var submitForm = Object.getPrototypeOf(myform).submit;
	submitForm.call(myform);

}

function editChar(toEdit) {

	console.log(toEdit);
	//document.getElementById('viewcharid').submit();
	var myform2 = document.getElementById('viewcharid');
	var submitForm = Object.getPrototypeOf(myform2).submit;
	submitForm.call(myform2);

}

function levelUpChar(toLevelUp) {

	console.log(toLevelUp);
	//document.getElementById('viewcharid').submit();
	var myform3 = document.getElementById('viewcharid');
	var submitForm = Object.getPrototypeOf(myform3).submit;
	submitForm.call(myform3);

}
