$(document).on('change', '.check1', function() {
	// alert("hello");
	 let arr =[];
	let checkboxes = $(this).attr("value");
	// console.log(checkboxes);
	arr.push(checkboxes);
	 display_todo(arr);
	 var str2 = "";
	 arr.forEach((element, index) => {
	 str2 += "<li><input type='checkbox'   class='check1' value=" + element + "><label>" + element + "</label><button class='edit' onclick='edit1(" + index + ")' id=" + element + ">Edit</button></td><td><button class='delete' onclick='delete1(" + index + ")' id=" + element + ">Delete</button></li>";
	});
	document.getElementById("completed-tasks").innerHTML = str2;

});
