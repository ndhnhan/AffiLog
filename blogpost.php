<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/utilities.css">
    <link rel="stylesheet" href="CSS/blog.css">
    <link rel="stylesheet" href="CSS/phone.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Blog_Hire</title>
</head>

<body>
    <?php require 'partials/_dbconnect.php'; ?>
    <?php require 'partials/_navbar.php'; ?>
    <hr>
    <div class="blog max_width_1 m_auto">
        <div class="blog_left">
            <?php
                $blog_post_number = $_GET['blogquery'];
                $sqlblog = "SELECT * FROM `cat_post` WHERE blog_title='$blog_post_number';";
                $result = mysqli_query($connaffi, $sqlblog); 
                $row = mysqli_fetch_assoc($result);

                $tag = $row['blog_tag'];
                $title = $row['blog_title'];
                $content = $row['blog_left'];
                $author = $row['blog_author'];
                $blog_image = $row['blog_image'];
                $author_image = $row['author_image'];
    
                echo '<h3>'.$title.'</h3>
                    <img src="img/'.$blog_image.'" alt="'.$tag.'">
                    '.$content;
            ?>
        </div>

        <div class="blog_right">
            <div class="card_about">
                <h2>About Us:-</h2>
                <?php
                    echo '<img src="img/'.$author_image.'" alt="profile">
                    <p>'. $author .'</p>';                
                ?>
            </div>
            <div class="card_recent_post">
                <h2>Related Blogs:-</h2>
                <?php 
                    $category = $_GET['cpost'];
                    $sql_recent = "SELECT * FROM `cat_post` WHERE blog_category = '$category' LIMIT 5;";
                    $result = mysqli_query($connaffi, $sql_recent);
                    while($row = mysqli_fetch_assoc($result)){
                        $related_posts = $row['blog_image'];
                        $related_posts_title = $row['blog_title'];
                        if($related_posts_title == $title)
                            continue;
                        $related_posts_tag = $row['blog_tag'];
                        echo '<a href="blogpost.php?blogquery='.str_replace(" ","+",$related_posts_title).'&cpost='.str_replace(" ","+",$category).'"><img src="img/'.$related_posts.'" alt="'.$related_posts_tag.'"></a>';
                    }

                ?>
            </div>
            <div class="card_comment">
                <textarea name="" id="" cols="40" rows="4" maxlength="500"
                    placeholder="Comment On This Blog"></textarea>
                <button class="btn_1" type="submit">Submit</button>
            </div>
            <div class="card_categories">

            </div>
        </div>
    </div>

    <?php require 'partials/_footer.php' ?>
</body>

</html>