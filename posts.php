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
    <?php require 'partials/_dbconnect.php' ?>
    <?php require 'partials/_navbar.php' ?>
    <hr>

    <div class="recent max_width_2 m_auto">

        <?php
                $category = $_GET['cpost'];
                echo '<h3>'.$category.' Blogs:-</h3><br>';

                $sql = "SELECT * FROM `cat_post` WHERE blog_category = '$category'";
                $result = mysqli_query($connaffi, $sql);                
                while($row = mysqli_fetch_assoc($result)){
                    $thumbnail = $row['blog_image'];
                    $tag = $row['blog_tag'];
                    $title = $row['blog_title'];
                    $description = $row['blog_left'];
 
                    echo '
                    <div class="recent_elements">
                        <div class="post_thumbnail">
                            <img src="img/'.$thumbnail.'" alt="'.$tag.'">
                        </div>
                        <div class="recent_elements_text">
                            <h4><a href="blogpost.php?blogquery='.str_replace(" ","+",$title).'&cpost='.str_replace(" ","+",$category).'">'.$title.'</a></h4>
                            <p>'.substr($description, 0, 160).'
                            <a href="blogpost.php?blogquery='.str_replace(" ","+",$title).'&cpost='.str_replace(" ","+",$category).'"><b>>>Read More.</b></a>
                            </p>
                        </div>
                    </div>
                   ';
               }
        ?>
    </div>

    <?php require 'partials/_footer.php' ?>
</body>

</html>