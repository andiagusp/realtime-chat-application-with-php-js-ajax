<?php 
# set session start
session_start();
require_once("config.php");

$firstname = mysqli_escape_string($conn, $_POST["firstname"]);
$lastname = mysqli_escape_string($conn, $_POST["lastname"]);
$email = mysqli_escape_string($conn, $_POST["email"]);
$password = mysqli_escape_string($conn, $_POST["password"]);

if (
    !empty($firstname) &&
    !empty($lastname) &&
    !empty($email) &&
    !empty($password)
) {
    # filtering email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        # check email ada atau tidak didatabase
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "$email this already exist";
        } else {
            # check user upload image
            if(isset($_FILES['image'])) {
                # simpan nama file yang diupload
                $image = $_FILES['image']['name'];
                # simpan type file yang diupload
                $type = $_FILES['image']['type'];
                # temporary name save file in folder
                $tmp = $_FILES['image']['tmp_name'];

                # explode image for get type jpg png
                $exp_image = explode(".", $image);
                # get extension image
                $ext_image = end($exp_image);

                $extension = ["jpg", "png", "jpeg"];
                # cek in array
                if (in_array($ext_image, $extension)) {
                    # set default time in your area
                    date_default_timezone_set("Asia/Jakarta");
                    # time upload file image
                    $time = time();
                    # concat time and name file image
                    $name_image = $time.$image;
                    # move folder storage and check if success move return true
                    if (move_uploaded_file($tmp, "../../assets/img/{$name_image}")) {
                        $status = "Active now";
                        # create random unique id 
                        $random_id = rand(1, 1000000);
                        # insert to table db
                        $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, firstname, lastname, email, password, image, status, created_at) VALUES ({$random_id}, '{$firstname}', '{$lastname}', '{$email}', '{$password}', '{$name_image}', '{$status}', CURRENT_TIMESTAMP)");
                        # cek if success insert
                        if ($sql2) {
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                # set session uniqe id
                                $_SESSION["unique_id"] = $row["unique_id"];
                                echo "success";
                            }
                        } else {
                            echo("something went wrong");
                        }
                    }
                } else {
                    echo "Please select image file - jpg, jpeg, png";
                }

            } else {
                echo "Please select image file";
            }
        }
    } else {
        echo "$email - This is invalid";
    }
} else {
    echo "All input field are required";
}

?>