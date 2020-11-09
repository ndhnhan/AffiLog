<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/utilities.css">
    <link rel="stylesheet" href="CSS/phone.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Blog_Hire</title>
</head>

<body>
    <?php require 'partials/_dbconnect.php'; ?>
    <?php require 'partials/_navbar.php'; ?>
    <hr>
    <div class="blog_categories max_width_1 m_auto">
        <?php
            $sqlaffi = "SELECT * FROM `cat_affilog`";
            $result = mysqli_query($connaffi, $sqlaffi);

            while($row = mysqli_fetch_assoc($result)){
                $sno = $row['cat_sno'];
                $image = $row['cat_image'];
                $cat = $row['cat_name'];
                $desc = $row['cat_description'];
                $cat_query = str_replace(' ', '+', $cat);
                echo '
                    <div class="blog_card">
                        <div class="card_up">
                            <img src="img/'.$image.'" alt="">
                        </div>
                        <div class="card_down">
                            <a href="posts.php?cpost='.$cat_query.'">'.$cat.'</a>
                            <p>'.$desc.'</p>
                        </div>
                    </div>';
            }
        ?>
    </div>
    <div class="max_width_1 m_auto">
        <hr>
    </div>
    <div class="content_body max_width_1 m_auto">
        <div class="content_left">
            <h2><a href="#">Affiliate Marketing</a></h2>
            <p>We're going to learn about affiliate marketing from this website. As we all know that by deploying all
                learning we can learn understandably with a bunch of mistakes. Mistakes not only let you know about you
                shortcomings but also let you to
                improve them. Ultimately, we are going to make money from this website by doing affiliate marketing with
                various referral & memberships program.
            </p>
        </div>
        <div class="content_right">
            <img src="img/home.svg" alt="Affiliate Marketing">
        </div>
    </div>
    <div class="max_width_1 m_auto">
        <hr>
    </div>

    <div class="recent max_width_2 m_auto">
        <h3>Featurd Blogs:-</h3>
        <div class="recent_elements">
            <div class="post_thumbnail">
                <img src="img/recent.svg" alt="bolgpost_i">
            </div>
            <div class="recent_elements_text">
                <h4><a href="#">Earn 100$</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, nihil qui. Consequatur enim, ipsa,
                    exercitationem aperiam excepturi dolore voluptas ex ab quas sapiente, illum fugiat maxime quaerat
                    accusamus voluptates unde.</p>
            </div>
        </div>
        <div class="recent_elements">
            <div class="post_thumbnail">
                <img src="img/recent.svg" alt="bolgpost_i">
            </div>
            <div class="recent_elements_text">
                <h4><a href="#">Earn 100,000$</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, nihil qui. Consequatur enim, ipsa,
                    exercitationem aperiam excepturi dolore voluptas ex ab quas sapiente, illum fugiat maxime quaerat
                    accusamus voluptates unde.</p>
            </div>
        </div>
        <div class="recent_elements">
            <div class="post_thumbnail">
                <img src="img/recent.svg" alt="bolgpost_i">
            </div>
            <div class="recent_elements_text">
                <h4><a href="#">Earn 100,000$</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, nihil qui. Consequatur enim, ipsa,
                    exercitationem aperiam excepturi dolore voluptas ex ab quas sapiente, illum fugiat maxime quaerat
                    accusamus voluptates unde.</p>
            </div>
        </div>
        <div class="recent_elements">
            <div class="post_thumbnail">
                <img src="img/recent.svg" alt="bolgpost_i">
            </div>
            <div class="recent_elements_text">
                <h4><a href="#">Earn 100,000$</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, nihil qui. Consequatur enim, ipsa,
                    exercitationem aperiam excepturi dolore voluptas ex ab quas sapiente, illum fugiat maxime quaerat
                    accusamus voluptates unde.</p>
            </div>
        </div>

    </div>
    <?php require 'partials/_footer.php' ?>
</body>

</html>