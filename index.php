<?php include('partials-front/menu.php') ?>

    <!-- sEARCH Section Starts Here -->
    <section class="search text-center" id="search">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>post-search.php" method="POST">
                <input type="search" name="search" placeholder="Search ..." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- sEARCH Section Ends Here -->

    <!-- About Section Starts Here -->
    <section class="about" id="about">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-md-6">
                  <div class="about-img" data-aos="fade-right" data-aos-delay="100">
                    <img
                      src="https://tinhdoanhatinh.vn/uploads/news/2020_08/phat-khau-trang_1.jpg"
                      alt="" class="img-responsive">
                  </div>
                </div>
      
                <div class="col-lg-7 col-md-6">
                  <div class="about-content" data-aos="fade-left" data-aos-delay="100">
                    <h2>About Website</h2>
                    <p>Lý do tôi phát triển website này. vì tôi cảm thấy rằng, việc kết nối những người có hoàn cảnh khó
                      khăn hay những người có nhu cầu cần giúp đỡ trên cộng đồng đang còn rất hạn chế. Vậy nên, giải pháp của
                      tôi là xây dựng một website có thể kết nối giữa những người có nhu cầu cần giúp đỡ với các nhà hảo tâm
                      lại với nhau để tạo nên các hoạt động và tổ chức cho riêng mình.
                    </p>
                    <p>Đây là một trang web hỗ trợ những người có hoàn cảnh khó khăn (lũ lụt, các bệnh hiểm nghèo, bị ảnh
                      hưởng sau hậu COVID_19,...). Ở đây mọi người có thể chia sẻ khó khăn của bản thân và được gợi ý đến
                      những hội thiện nguyện phù hợp có nhu cầu giúp đỡ.
                    </p>
                  </div>
                </div>
              </div>
        </div>
    </section>
    <!-- About Section Ends Here -->

    <!-- news Section Starts Here -->
    <section class="news-menu" id="news">
        <div class="container">
            <h2 class="text-center">News</h2>

        <?php
        //Getting Foods from Database that are active and featured
        $sql2 = "SELECT * FROM tbl_post where approve='Yes' LIMIT 6";
        //excute the Query
        $res2 = mysqli_query($conn, $sql2);
        //Count Rows
        $count2 = mysqli_num_rows($res2);
        //Check whether food available or not
        if ($count2 > 0) {
            //Food Avallable
            while ($row = mysqli_fetch_assoc($res2)) 
            {
                //Get all the values
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
                            if($image_name=="")
                            {
                                //image not available
                                echo "<div class='error'>Image not available.</div>";
                            }
                            else
                            {
                                //image available
                                ?>
                                    <img src="<?php echo SITEURL;?>images/news/<?php echo $image_name; ?>" class="img-responsive img-curve">
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

        <p class="text-center">
            <a href="#">See All News</a>
        </p>
    </section>
    <!-- news Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->
<?php include('partials-front/footer.php') ?>