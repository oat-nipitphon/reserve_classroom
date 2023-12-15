<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="row">
<div class="col-lg-12">
    <img src="image-select-rooms/header.png" style="width: 100%">
</div>
<div class="col-lg-12">
        <table border="1" width="100%">
        <tr>
        <td>ชื่อผู้จอง</td>
        <td>เบอร์โทรศัพท์</td>
        <td>หมายเหตุ</td>
        <td>วัน/เดือน/ปี</td>
        <td>เริ่มเวลา</td>
        <td>สิ้นสุดเวลา</td>
        </tr>
        <?php
        include 'connect.php';
        $id_room = $_GET['id_room'];
        $Sql = "SELECT * FROM report_select_room WHERE id_room=".$id_room;
        $Result = $conn->query($Sql);
        if($Result->num_rows > 0 ){
            while($row = $Result->fetch_assoc()){
                $Sql_user = "SELECT * FROM table_user WHERE id=".$row['id_user'];
                $Result_user = $conn->query($Sql_user);
                if($Result_user->num_rows > 0)
                {
                    while($row_user = $Result_user->fetch_assoc()){

                        ?>
                <tr>
                    <td><?php echo $row_user['full_name'];?></td>
                    <td><?php echo $row_user['tel'];?></td>
                        <?php
                    }
                }
                ?>
                <td><?php echo $row['content'];?></td>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['time_start'];?></td>
                <td><?php echo $row['time_out'];?></td>
                </tr>
                <?php
            }
        }
    ?>
    </table>
</div>
<?php
    include 'footer.php';
?>
</div>
</body>
</html>


<?php

01.
<?php
02.
session_start();
03.
 
04.
require_once("connect.php");
05.
 
06.
$strUsername = mysqli_real_escape_string($con,$_POST['txtUsername']);
07.
$strPassword = mysqli_real_escape_string($con,$_POST['txtPassword']);
08.
 
09.
$strSQL = "SELECT * FROM member WHERE Username = '".$strUsername."'
10.
and Password = '".$strPassword."'";
11.
$objQuery = mysqli_query($con,$strSQL);
12.
$objResult = mysqli_fetch_array($objQuery);
13.
if(!$objResult)
14.
{
15.
echo "Username and Password Incorrect!";
16.
exit();
17.
}
18.
else
19.
{
20.
if($objResult["LoginStatus"] == "1")
21.
{
22.
echo "'".$strUsername."' Exists login!";
23.
exit();
24.
}
25.
else
26.
{
27.
//*** Update Status Login
28.
$sql = "UPDATE member SET LoginStatus = '1' , LastUpdate = NOW() WHERE UserID = '".$objResult["UserID"]."' ";
29.
$query = mysqli_query($con,$sql);
30.
 
31.
//*** Session
32.
$_SESSION["UserID"] = $objResult["UserID"];
33.
session_write_close();
34.
 
35.
//*** Go to Main page
36.
header("location:page1.php");
37.
}
38.
 
39.
}
40.
mysqli_close($con);
41.
?>
?>