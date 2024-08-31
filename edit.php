<?php
    include "db_connection.php";
    $id = $_GET['id'];

    if(isset($_POST['submit'])) {
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $sql = "UPDATE `crud-practice` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`gender`='$gender' WHERE id=$id";
    
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: index.php?msg=Data Updated successfully");
        } else {
            echo "Failed: ". mysqli_error($conn);
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PRACTICE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <style>
      .bg-grayish-black {
        background-color: #2b2b2b;
        color: white;
      } -->
    </style>
</head>

<body class="bg-grayish-black">
    <h2 class="text-center mt-3 mb-5">
        <span style="background-color: #00ff5573; padding: 5px 8px; border-radius: 5px">PHP CRUD APPLICATION BY RAM</span>
    </h2>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit User Information</h3>
            <p class="text-muted">
                Click update after changing any information
            </p>
        </div>
        <?php
            
            $sql = "SELECT * FROM `crud-practice` WHERE id = $id LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vh; min-width: 600px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name"
                            value="<?php echo $row['firstname'] ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name"
                        value="<?php echo $row['lastname'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email: </label>
                    <input type="text" class="form-control" name="email"
                    value="<?php echo $row['email'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label>Gender: </label> &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?php echo ($row['gender']=='male')?"checked":"";?>>
                    <label for="male" class="form-input-label">Male</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?php echo ($row['gender']=='female')?"checked":"";?>>
                    <label for="female" class="form-input-label">Female</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>