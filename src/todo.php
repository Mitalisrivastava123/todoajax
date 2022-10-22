<?php
session_start();
if (!isset($_SESSION['todo'])) {
	$_SESSION['todo'] = [];
}
?>
<html>

<head>
    <title>TODO List</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>TODO LIST</h2>
        <h3>Add Item</h3>
        <p>
            <input id="new-task" type="text"   name="name"><button type="submit" onclick='add(id)'   name="submit">Add</button>
       <button type="submit"  onclick='update(id)'>update</button>
        </p>

        <h3>Todo</h3>
        <ul id="incomplete-tasks">
            <li><input type="checkbox"><label>Pay Bills</label><input type="text"><button class="edit">Edit</button><button class="delete">Delete</button></li>
            <li><input type="checkbox"><label>Go Shopping</label><input type="text" value="Go Shopping"><button class="edit">Edit</button><button class="delete">Delete</button></li>
        </ul>

        <h3>Completed</h3>
        <ul id="completed-tasks">
            <li><input type="checkbox" checked><label>See the Doctor</label><input type="text"><button class="edit">Edit</button><button class="delete">Delete</button></li>
        </ul>
    </div>
    <script>
        function add(x) {
         var name = $("#new-task").val();
            var y = name;
            $.ajax({
                url: "todo1.php",
                type: 'POST',
                data: "x=" + y,
                dataType: "json",
            }).done(function(res) {
                console.log(res);
               display_todo(res);
            })
        }

        function delete1(id) {
            // alert("hello");
            console.log(id);
            var name = $("#new-task").val();
            var y =id ;
            $.ajax({
                url: "deletetodo.php",
                type: 'POST',
                data: "x=" + y,
                dataType: "json",
            }).done(function(res) {
                console.log(res);
               display_todo(res);
            })
 
    }
    function edit1(id) {
            // alert("hello");
            console.log(id);
            var name = $("#new-task").val();
            var y =id ;
            $.ajax({
                url: "edittodo.php",
                type: 'POST',
                data: "x=" + y,
                dataType: "text",
            }).done(function(res) {
            
            $("#new-task").val(res);
            // console.log(res);
            })
 
    }

    function update(id) {
            // alert("hello");
            console.log(id);
            var name = $("#new-task").val();
            var y =id ;
            $.ajax({
                url: "updatetodo.php",
                type: 'POST',
                data: "x=" + y,
                dataType: "json",
            }).done(function(res) {
            
            $("#new-task").val(res);
            })
    }

        function display_todo(res) {
			// alert("hello");
			var str1 = "";

			if (res == []) {
				str1 = "";
			} else {
				res.forEach((element,index) => {
					str1 += "<tr><td><li><input type='checkbox'  onchange='function1(this)'></td><td>" + element + "</td><td><button onclick='edit1(" + index + ")'  id = " + element + ">Edit</button></td><td><button onclick='delete1(" + index + ")'  id = " + element + ">Delete</button></td></td></tr>";
				});
			}
			// $("#table3").html(empty1);
			$("#incomplete-tasks").html(str1);
		}


    </script>
</body>

</html>