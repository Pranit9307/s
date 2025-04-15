<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empolyee Registration using PHP & MySQL</title>
</head>
<body>
    <fieldset>
        <legend>Empolyee Registration</legend>
        <form name="register" method="post" action="Fetch Empolyee data MySQL.php">
            <p>
                <label>First Name : </label>
                <input type="text" name="fname" id="fname">
            </p>
            <p>
                <label>Last Name : </label>
                <input type="text" name="lname" id="lname">
            </p>
            <p>
                <label>Password : </label>
                <input type="text" name="pass" id="pass">
            </p>
            <p>&nbsp;</p>
            <p>
                <input type="submit" name="Submit" id="Submit" value="Submit">
            </p>
        </form>
    </fieldset>
</body>
</html>





<?php
    $con = mysqli_connect('localhost', 'root', 'Savi#15@Mrunal', 'registration');

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO `student`(`id`, `fname`, `lname`, `pass`) VALUES ('0', '$fname', '$lname', '$pass')";
    
    $res = mysqli_query($con, $sql);

    if($res)
    {
        echo "Empolyee Details Inserted <br><br>";
    }

    $sql = "SELECT * FROM student";
    $retval = mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
    {
        echo "Emp id: {$row['id']} <br>";
        echo "Emp First Name: {$row['fname']} <br>";
        echo "Emp Last Name:: {$row['lname']} <br>";
    }

    echo "Fetch Data Successfully\n";
?>