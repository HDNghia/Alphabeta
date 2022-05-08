<?php include('partials-front/menu.php') ?>
<!-- Navbar Section Ends Here -->

<!-- sEARCH Section Starts Here -->
<section class="search text-center" id="home">
    <div class="container">

        <form action="search.html" method="POST">
            <input type="search" name="search" placeholder="Search ..." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- sEARCH Section Ends Here -->

<!--  News Section Starts Here -->
<section class="news-menu" id="news">
    <div class="main-content">
        <div class="wrapper">
            <?php

            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            ?>
            <h1>Posts</h1>

            <br><br>

            <?php
            if (isset($_SESSION['upload'])) {
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
                        <td>Link: </td>
                        <td>
                            <input type="text" name="link">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="approve" value="No">
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
            if (isset($_POST['submit'])) {
                //Add the food in database
                // echo "Clicked";

                //1. Get the data from form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $link = $_POST['link'];

                //Check the whether raido button for approve are checked or not

                //2. Upload the image if select
                //check whether the select image is clicked or not and upload the image only if the image is selected


                //3. Insert into database

                //create a sql query to save or add food

                //for numerical we do not need to pass value inside quotes '' but for string value it is compulsory to add quotes ''
                $sql2 = "INSERT INTO tbl_post SET
                    title = '$title',
                    description = '$description',
                    link = '$link',
                    approve = '$approve',
                    id = '$id'
                ";
                //execute the query
                $res2 = mysqli_query($conn, $sql2);
                // check whether data inserted or not
                //4. Redirect with message to mana food page
                if ($res2 == true) {
                    //date inserted successfully
                    $_SESSION['add'] = "<div class='success'>Post successfully.</div>";
                    header('location:' . SITEURL . 'post.php');
                } else {
                    //failed to insert data
                    $_SESSION['add'] = "<div class='error'>Failes to Post.</div>";
                    header('location:' . SITEURL . 'post.php');
                }
            }
            ?>

        </div>
    </div>
</section>
<!-- News Section Ends Here -->

<!-- social Section Starts Here -->
<section class="social" id="contact">
    <div class="container text-center">
        <ul>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" /></a>
            </li>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
            </li>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
            </li>
        </ul>
    </div>
</section>
<!-- social Section Ends Here -->

<?php include('partials-front/footer.php') ?>