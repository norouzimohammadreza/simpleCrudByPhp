<!DOCTYPE html>
<html lang="en">
<?php


require_once("dbconfig.php");
if(isset($_REQUEST['delete'])){
    $userid = intval($_REQUEST['delete']);
    $sql = "DELETE FROM users WHERE (id=:id)";
    $query= $conn->prepare($sql);
    $query->bindParam(":id",$userid);
    $query->execute();
    echo"<script>alert('the record is deleted.');</script>";
    echo"<script>window.location.href='index.php';</script>";
}
?>

<head>
    <meta charset="utf-8">
    <title>پروژه ساده</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<?php
$sql = "SELECT id,firstname,lastname,email,phone,createdtime,address 
    FROM users";
$query = $conn->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);


?>

<body>
    <div class="container border p-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="p-3 pt-5">Crud Example</h3>
                <hr />
                <a href="insert.php"><button class="btn btn-primary font-16 m-3">وارد کردن رکورد</button></a>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped m-2">
                        <thead>
                            <th>شناسه</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>ایمیل</th>
                            <th>شماره</th>
                            <th>آدرس</th>
                            <th>تاریخ ساخت</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </thead>
                        <tbody>
                            <?php

                            if ($query->rowCount() == 0) {
                                echo "Hichi Toosh Nist";
                                exit;
                            } else {
                                $ci = 0;
                                foreach ($results as $result) {

                            ?>
                                    <tr>
                                        <td>
                                            <?php echo ++$ci; ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities( $result->firstname) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($result->lastname) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($result->email) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($result->phone) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($result->address) ?>
                                        </td>
                                        <td>

                                            <?php echo htmlentities($result->createdtime) ?>
                                        </td>

                                        <td><a href="update.php?id=<?php echo htmlentities($result->id); ?>"><button class="btn btn-warning">
                                            <span class="glyphicon glyphicon-pencil"></span></button></a></td>

                                        <td><a href="index.php?delete=<?php echo htmlentities($result->id); ?>">
                                            <button class="btn btn-danger" onClick="return confirm('آیا حذف انجام شود');">
                                            <span class="glyphicon glyphicon-trash"></span></button></a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>