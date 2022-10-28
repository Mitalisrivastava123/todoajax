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
<!-- todo start -->
    <div class="container">
        <h2>TODO LIST</h2>
        <h3>Add Item</h3>
        <p>
            <input id="new-task" type="text" name="name"><button type="submit" onclick='add(id)' id="add" name="submit">Add</button>

        </p>
        <div id="m2"></div>

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
        // ajax call
        function add(x) {
            var name = $("#new-task").val();
            var y = name;
            $.ajax({
                url: "todo1.php",
                type: 'POST',
                data: "x=" + y,
                dataType: "json",
            }).done(function(res) {
                // console.log(res);
                display_todo(res);
            })
        }

        function delete1(id) {
            // alert("hello");
            // console.log(id);
            var name = $("#new-task").val();
            var y = id;
            $.ajax({
                url: "deletetodo.php",
                type: 'POST',
                data: "x=" + y,
                dataType: "json",
            }).done(function(res) {
                // console.log(res);
                display_todo(res);
            })

        }

        function edit1(id) {
            var name = $("#new-task").val();
            var y = id;
            var m1 = "<button onclick='update(id)' id=" + y + ">Update</button>";
            $("#m2").html(m1);
            $.ajax({
                url: "edittodo.php",
                type: 'POST',
                data: "x=" + y,
                dataType: "text",
            }).done(function(res) {
                $("#add").hide();
                $("#update").show();
                $("#new-task").val(res);

            })

        }

        function update(id) {

            var x1 = $("#new-task").val();
     


            $.ajax({
                url: "updatetodo.php",
                type: 'POST',
                data: {
                    x1: x1,
                    id: id
                },
                dataType: "json",
            }).done(function(res) {
                $("#add").show();
                display_todo(res);

            })
        }

        function display_todo(res) {
            // alert("hello");
            if (res == []) {
            } else {
                var str1 = "";
                var str2 = "";
                console.log(res);
               res.forEach((element,index) => {

                    if (element.status == "false") {
                        str1 += "<li><input name='checkbox' type='checkbox'   class='checking1' value=" + index + "><label>" + element.name + "</label><button class='edit' onclick='edit1(" + index + ")' id=" + element + ">Edit</button></td><td><button class='delete' onclick='delete1(" + index + ")' id=" + element + ">Delete</button></li>";
                    }
                    else{
                        str2 += "<li><input name='checkbox' type='checkbox'   class='checking1' value=" + index + " checked><label>" + element.name + "</label><button class='edit' onclick='edit1(" + index + ")' id=" + element + ">Edit</button></td><td><button class='delete' onclick='delete1(" + index + ")' id=" + element + ">Delete</button></li>";
                    }
                });
                $("#incomplete-tasks").html(str1);
                $("#completed-tasks").html(str2);
            }

        }
// status checking
        $(document).on('click', '.checking1', function() {
            var s2 = $(this).prop("checked");
            var id = $(this).attr("value");

            $.ajax({
                url: "statuscheck.php",
                type: 'POST',
                data: {
                    x1: id,
                    status: s2
                },
                dataType: "json",
            }).done(function(res) {
                display_todo(res);
            })

        });
    </script>
</body>

</html>