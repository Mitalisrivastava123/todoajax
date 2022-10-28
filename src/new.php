<?php
$(document).on('change', '.check1', function(x1) {
             var s= $(this).prop("checked");
            var string2 = "";
            var checked = $(this).attr("value");
            console.log(checked);
          
            $.ajax({
                url: "checks.php",
                type: 'POST',
                data: {
                    x1: x1,
                    status: status
                },
                dataType: "json",
            }).done(function(res) {
              
                display_todo(res);
             
            })
   


            // if ($(this).is('input:checked')) {
            // array1.push(checked);
            // }
            // console.log(array1);
            // array1.forEach((element,index) => {
            //     string2 += "<li><input type='checkbox' class='check1' value=" + element + "><label>" + element + "</label><button class='edit' onclick='edit1(" + index + ")' id=" + element + ">Edit</button></td><td><button class='delete' onclick='delete1(" + index + ")' id=" + element + ">Delete</button></li>";
            // });
            document.getElementById("completed-tasks").innerHTML = string2;
            // console.log(array1);
        });

        let array2 = [];
        $(document).on('change', '.check1', function() {
          
            var string3 = "";
            // let checkboxes = $(this).attr("value");
            var checked = $(this).val();
            if ($(this).is('input:not(:checked)')) {
            array2.push(checked);
            }
            console.log(array2);
            array1.forEach((element,index) => {
                string3 += "<li><input type='checkbox' class='check1' value=" + element + "><label>" + element + "</label><button class='edit' onclick='edit1(" + index + ")' id=" + element + ">Edit</button></td><td><button class='delete' onclick='delete1(" + index + ")' id=" + element + ">Delete</button></li>";
            });
            document.getElementById("completed-tasks").innerHTML = string3;
            // console.log(array1);
        });

?>