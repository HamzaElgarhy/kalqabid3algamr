<?php

include 'config.php';
session_start();
$user_id =  $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {

    //Update Name or email
    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

    mysqli_query($conn, "UPDATE `user_form` SET name='$update_name', email='$update_email' WHERE id='$user_id'") or die('query falied');

    //Update Password
    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

    if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
        if ($update_pass != $old_pass) {
            $message[] = 'Old password not matched';
        } elseif ($new_pass != $confirm_pass) {
            $message[] = 'Confirm password not matched';
        } else {
            mysqli_query($conn, "UPDATE `user_form` SET password='$confirm_pass' WHERE id='$user_id'") or die('query falied');
            $message[] = 'Password Updated Successfully';
        }
    }

    //Update Image
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/' . $update_image;

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'Image is to large';
        } else {
            $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image='$update_image' WHERE id='$user_id'") ;
            if ($image_update_query) {
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'Image Updated Successfully';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="updata-profile">

        <?php
        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id' ") or die('query falied');

        if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">

            <?php
            if ($fetch['image'] == '') {
                echo '<img src="image/Untitled.jpg">';
            } else {
                echo '<img src="uploaded_img/'.$fetch['image'] .'">';
            }

            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
                }
            }
            ?>

            <div class="flex">
                <div class="inputBox">
                    <span>Username: </span>
                    <input type="text" name="update_name" value="<?php echo $fetch['name'] ?>" class="box">
                    <span>Email: </span>
                    <input type="email" name="update_email" value="<?php echo $fetch['email'] ?>" class="box">
                    <span>Update your picture: </span>
                    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                </div>

                <div class="inputBox">
                    <input type="hidden" name="old_pass" value="<?php echo $fetch['password'] ?>">
                    <span>Old Passowrd: </span>
                    <input type="password" name="update_pass" placeholder="Enter Old Password" class="box">
                    <span>New Passowrd: </span>
                    <input type="password" name="new_pass" placeholder="Enter New Password" class="box">
                    <span>Confirm Passowrd: </span>
                    <input type="password" name="confirm_pass" placeholder="Confirm new Password" class="box">
                </div>
            </div>

            <input type="submit" value="Update Profile" name="update_profile" class="btn">
            <a href="home.php" class="delete-btn">Go back</a>
        </form>
    </div>

</body>

</html>