
<?php 
require_once("dbconfig.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
<?php 
if (isset($_REQUEST['id'])) {
    $sql = "SELECT * FROM users
    WHERE(id=:id)";
    $query = $conn->prepare($sql);
    $query->bindParam(":id",$_REQUEST['id']);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
    
}
if(isset($_POST['update'])){
    $sql="UPDATE users
    SET 
    firstname = :firstname,
    lastname = :lastname,
    email =:email,
    phone = :phone,
    address = :address
    WHERE id =:id ";
    $query = $conn->prepare($sql);
    $query->bindParam(":firstname",$_POST['firstname']);
    $query->bindParam(":lastname",$_POST['lastname']);
    $query->bindParam(":email",$_POST['email']);
    $query->bindParam(":phone",$_POST['phone']);
    $query->bindParam(":address",$_POST['address']);
    $query->bindParam(":id",$_REQUEST['id']);
    $query->execute();
    echo "<script>alert('updated successfully!');</script>";
    echo "<script>window.location.href='index.php';</script>";
}

?>
    <div class="container border p-4 mt-4">

        <div class="row">
            <div class="col-md-12">
                <h3 class="p-4">ویرایش اطلاعات</h3>
                <hr />
            </div>
        </div>
        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>نام</label>
                    <input type="text" name="firstname" value="<?php echo $result->firstname ?>" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>نام خانوادگی</label>
                    <input type="text" name="lastname" value="<?php echo $result->lastname ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label>ایمیل</label>
                <input type="email" name="email" value="<?php echo $result->email ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>شماره</label>
                <input type="number" name="phone" value="<?php echo $result->phone ?>" class="form-control">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>آدرس</label>
                    <textarea class="form-control" name="address" rows="5"><?php echo $result->address?></textarea>

                </div>
            </div>
            <input type="submit" class="btn btn-warning" name="update" value="ویرایش">

        </form>


    </div>
</body>
</html>