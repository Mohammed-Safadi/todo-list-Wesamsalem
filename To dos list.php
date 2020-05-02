<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assginment";

// Create connection
$conn = new mysqli('localhost', 'root', '', 'assginment');
// Check connection                                                                         //جمل الاتصال بقاعدة البيانات يتم كتابتها فى الملفين
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM task";
$result = $conn->query($sql);    //جملة الاستعلام عن جميع البيانات التى تم اضافتها فى الجدول

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TO-do's list</title>
    <style>
        .container{
            margin: 30px;
        }
        .btn-submit {
            background: blueviolet;
            border: aliceblue;
            height: 29px;
            width: 88px;
            border-radius: 4px;
        }
        .input-st{
            height: 25px;
            width: 200px;
        }
        .container3{
            color: darksalmon;
            display: inline;
        }

        .container4{
            color: seagreen;
            display: inline;
        }


        .a-row1{
            display: none;
            margin-left: 80%;}

        .done-btn{
            color: seagreen;
        }
        .delete-btn{
            color: darkred;
        }

        .row1:hover .a-row1{display: inline; text-decoration:underline;}

        .row1:hover  .new1{ border: 1.5px solid;}



    </style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="container">
<h1>To-do's List</h1>
<form method="post" action="php.php">
    <input class="input-st" type="text" name="name" placeholder="New task....">
    <button class="btn-submit" type="submit">Add To list</button>

</form>
</div>
<div class="container2">
    <ul style="list-style-type: none;" class="ul-tab">
        <?php
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            if ($row['complete'] == 0){

            echo "<div class=\"row1\">
        <li class='container3'>".$row["name"]."</li>

       <div class='a-row1'>

           <a href='complete.php?id=".$row["id"]."' class=\"done-btn\">Mark as Done |</a>
           <a href='delete.php?id=".$row["id"]."' class=\"delete-btn\">Delete</a>
       </div>

        <hr class=\"new1\">

        </div>";
        }

            else{
                echo "<div class=\"row1\">
        <li class='container4'>".$row["name"]."</li>

        <hr class=\"new1\">

        </div>";
            }


        }
        }
        ?>

    </ul>

</div>

<script>
/*

    $('form').submit(function () {
        var valueofinput= $('.input-st').val();

        $.post("php.php",
                {
                    name: valueofinput,
                },
                function(data, status){
                        $('.ul-tab').append('<div class="row1">\n' +
                            '            <li class="container3">'+valueofinput+'</li>\n' +
                            '\n' +
                            '            <div class="a-row1">\n' +
                            '\n' +
                            '                <a href="#" class="done-btn">Mark as Done |</a>\n' +
                            '                <a href="#" class="delete-btn">Delete</a>\n' +
                            '            </div>\n' +
                            '\n' +
                            '            <hr class="new1">\n' +
                            '\n' +
                            '        </div>')

                });
    })
*/

    /*
        $(".btn-submit").on("click",function(){
            var valueofinput= $('.input-st').val();

            $('.ul-tab').append('<div class="row1">\n' +
                '            <li class="container3">'+valueofinput+'</li>\n' +
                '\n' +
                '            <div class="a-row1">\n' +
                '\n' +
                '                <a href="#" class="done-btn">Mark as Done |</a>\n' +
                '                <a href="#" class="delete-btn">Delete</a>\n' +
                '            </div>\n' +
                '\n' +
                '            <hr class="new1">\n' +
                '\n' +
                '        </div>')

         

        });*/

        $(document).on("click",'.delete-btn',function () {
            $(this).parent().parent().empty()             //عند تحميل الصفحة يتم اعطاء خاصيتين للقائمة الجديدة

        });

        $(document).on("click",'.done-btn',function () {
            $(this).parent().parent().children('li').css({'color':'green'});
            $(this).parent().empty()
        });




</script>


</body>
</html>