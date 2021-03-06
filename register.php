<?php include('config/constants.php'); ?>

<head>
    <title>Register - System</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<div class="main-content">
    <div class="register">
        <h2 class="text-center">Register</h2>

        <br><br>

        <?php
        if (isset($_SESSION['add'])) //checking whether the SESsion is set of Not
        {
            echo $_SESSION['add']; //Display the SEssion Message if SEt
            unset($_SESSION['add']); //Remove Session Message
        } ?>

        <form action="" method="POST" class="text-center">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Register" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
//Process the Value from Form and Save it in Database
//Check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    // Button clicked

    //1.Get the Data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //password encryption with MD5

    //2. SQL Query to save the data into database
    $sql = "INSERT INTO tbl_user SET
    full_name='$full_name' ,
    username='$username' ,
    password='$password'
    ";
    //3. Executing Query and Saving Data into Database
    $res = mysqli_query($conn, $sql);

    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if ($res == TRUE) {
        //Data Inserted
        //echo "Data Inserted";
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "user Added Successfully";
        //Redirect Page To Manage Admin
        header("location:" . SITEURL . 'login.php');
    } else {
        //FAiled to Insert DAta
        //echo "Faile to Insert Data";
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "failed to add user";
        //Redirect Page To Manage Admin
        header("location:" . SITEURL . 'login.php');
    }
}
?>