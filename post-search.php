<?php include('partials-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="search text-center">
    <div class="container">
        <?php
        //Get the search keyword
        $search = $_POST['search'];
        ?>
        <h2>Posts on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>
    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="news-menu">
    <div class="container">
        <h2 class="text-center">Posts</h2>

        <?php

        //SQL Query to Get foods based on search keyword
        $sql = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //count rows
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            //food available
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the details
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                $approve = $row['approve'];
                $link = $row['link'];
        ?>

                <div class="news-menu-box">
                    <div class="news-menu-img">
                        <?php
                        //check whether image available or not
                        if ($image_name == "") {
                            //image not available
                            echo "<div class='error'>Image not available.</div>";
                        } else {
                            //image available
                        ?>
                            <img src="<?php echo SITEURL; ?>images/news/<?php echo $image_name; ?>" class="img-responsive img-curve">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="news-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="description"><?php echo $description; ?></p>

                        <br>
                        <a href="<?php echo  "$link" ?>" class="btn btn-primary">Đọc thêm</a>
                    </div>
                </div>
        <?php
            }
        } else {
            //food Not Available
            echo "<div class='error'>news not available</div>";
        }
        ?>

        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>