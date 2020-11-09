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
    <?php require 'partials/_navbar.php' ?>

    <hr>

    <div class="recent min_height max_width_2 m_auto">
        <?php 
            $no_result = true;
            $search_query = $_GET['sq'];
            echo '
                <h3>Search results for "'.$search_query.'" (6 mins to read):-</h3>
                <br>
                ';

            $sqlresults = "SELECT * FROM `cat_post` WHERE MATCH (blog_tag, blog_category, blog_title, blog_left, blog_author) against ('$search_query')";
            $result = mysqli_query($connaffi, $sqlresults);
            
            while($row = mysqli_fetch_assoc($result)){
                $no_result = false;
                $search_blog_tag = $row['blog_tag'];
                $search_image = $row['blog_image'];
                $search_title = $row['blog_title'];
                $search_post_category = $row['blog_category'];
                $search_description = substr($row['blog_left'], 0, 160);

                echo '
                    <div class="recent_elements">
                        <div class="post_thumbnail">
                            <img src="img/recent.svg" alt="'.$search_blog_tag.'">
                        </div>
                        <div class="recent_elements_text">
                            <h4><a href="blogpost.php?blogquery='.str_replace(" ","+",$search_title).'&cpost='.str_replace(" ","+",$search_post_category).'">'.$search_title.'</a></h4>
                            <p>
                                '.$search_description.' 
                                <a href="blogpost.php?blogquery='.str_replace(" ","+",$search_title).'&cpost='.str_replace(" ","+",$search_post_category).'">
                                    <b>>> Read More...</b>
                                </a>
                            </p>
                        </div>
                    </div>';
                }
            if($no_result)
                echo '
                    <div class="no_search_jumbotron max_width_2 m_auto" style="">
                        <h1>No Results Found</h1>
                        <ol>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li>
                            <li>Try fewer keywords.</li>
                        </ol>
                    </div>';
        ?>
    </div>
    <!-- start from here  -->


    <?php require 'partials/_footer.php' ?>
</body>

</html>