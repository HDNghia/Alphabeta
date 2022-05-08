<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add news</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the news">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the news."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Link: </td>
                    <td>
                        <input type="text" name = "link">
                    </td>
                </tr>
                <tr>
                    <td>Approve: </td>
                    <td>
                        <input type="radio" name="approve" value="Yes">Yes
                        <input type="radio" name="approve" value="No">No

                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add news" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <?php 
        
            //Check whether the button is clicked or not
            if(isset($_POST['submit']))
            {
                //Add the food in database
                //echo "Clicked";

                //1. Get the data from form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $link = $_POST['link'];

                //Check the whether raido button for featured and active are checked or not
                if(isset($_POST['approve']))
                {
                    $approve = $_POST['approve'];
                }
                else{
                    $approve = "No"; //setting the default value
                }

                //2. Upload the image if select
                //check whether the select image is clicked or not and upload the image only if the image is selected
                if(isset($_FILES['image']['name']))
                {
                    //get the details of the selected image
                    $image_name = $_FILES['image']['name'];

                    //check whether the image is selected or not and upload image only if selected
                    if($image_name!="")
                    {
                        // image is selected

                        //a. renamge the image
                        //get the extension of selected image (jpg,png,gif,etc.)  
                        $ext = end(explode('.', $image_name)); //Gets the extention of the image

                        $image_name = "Food-Name-" . rand(0000, 9999) . '.' . $ext; //This will be renamed image

                        //b. upload the image
                        //get the src path and description path

                        // source path is the current location of the image
                        $src = $_FILES['image']['tmp_name'];

                        //description path for the image to the upload
                        $dst = "../images/news/".$image_name;

                        //finally upload the food image
                        $upload = move_uploaded_file($src, $dst);

                        //check whether the image upload of not
                        if($upload==false)
                        {
                            //failed to upload the image
                            //redirect to add food page with error message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            header('location:'.SITEURL.'admin/add-news.php');
                            //stop the process
                            die();
                        }
                    }
                }
                else
                {
                    $image_name = ""; //setting default value as blank
                }

                //3. Insert into database

                //create a sql query to save or add food

                //for numerical we do not need to pass value inside quotes '' but for string value it is compulsory to add quotes ''
                $sql2 = "INSERT INTO tbl_post SET
                    title = '$title',
                    description = '$description',
                    image_name = '$image_name',
                    link = '$link',
                    approve = '$approve',
                    id = '$id'
                ";
                //execute the query
                $res2 = mysqli_query($conn, $sql2);
                // check whether data inserted or not
                //4. Redirect with message to mana food page
                if($res2 == true)
                {
                    //date inserted successfully
                    $_SESSION['add'] = "<div class='success'>news added successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-news.php');
                }
                else
                {
                    //failed to insert data
                    $_SESSION['add'] = "<div class='error'>Failes to Add news.</div>";
                    header('location:'.SITEURL.'admin/manage-news.php');
                }  
            }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>