<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="manage.css">
    <title>Client Side Mangement Software: [Blog_Hire]</title>
</head>

<body>
    <?php    
        $connaffi = mysqli_connect("localhost", "root", "", "AffiliateBlogger");
    ?>
    <!-- <nav class="client_nav">
        <span>Blog_Hire</span>
        <ul>
            <li><a href="#">Add Blog</a></li>
            <li><a href="#">Add Category</a></li>
        </ul>
    </nav> -->

    <?php 

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $tag = $_POST['tags'];
            $category = $_POST['category'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $about_author = $_POST['about_author'];
            $blog_image = $_POST['blog_image'];
            $author_image = $_POST['author_image'];
            
            $sqlinsert = "INSERT INTO `cat_post` (`blog_tag`, `blog_category`, `blog_title`, `blog_left`, `blog_author`, `blog_image`, `author_image`) 
            VALUES ('$tag', '$category', '$title', '$content', '$about_author', '$blog_image', '$author_image');";
            $result = mysqli_query($connaffi, $sqlinsert);
            
            echo var_dump($result);
        }
    ?>

    <div class="add_blog">
        <h1>Add A New Blog From Here</h1>
        <form action="manage.php" method="POST" class="blog_form">
            <select class="add_blog_input select_width" id="" name="category" require>
                <option selected>Select your blog category</option>
                <option value="Cat 01">Cat 01</option>
                <option value="Cat 02">Cat 02</option>
                <option value="Cat 03">Cat 03</option>
            </select>
            <select class="add_blog_input select_width" id="" name="author_image" require>
                <option selected>Select author</option>
                <option value="Bhupendra Singh Image name">Bhupendra Singh</option>
                <option value="Madhur Garg Image name">Madhur Garg</option>
            </select>
            <input class="add_blog_input" type="text" name="tags" id="" placeholder="Add few tags to this blog (, )"
                require>
            <input class="add_blog_input" type="text" name="title" id="" placeholder="Blog title">
            <textarea class="add_blog_input" name="content" id="" cols="30" rows="6" maxlength="2000"
                placeholder="Blog Content with tags & links in HTML Format" require></textarea>
            <select class="add_blog_input select_width" id="" name="about_author" require>
                <option selected>Blog Authors Description</option>
                <option value="Bhupendra Singh Description">Bhupendra Singh Description</option>
                <option value="Madhur Garg Description">Madhur Garg Description</option>
            </select>
            <input class="add_blog_input" type="text" name="blog_image" id="" placeholder="Image name" require>
            <!-- <label for="">Upload image for this blog</label>
            <input class="custom-file-input" type="file" accept=".jpg, .jpeg, .svg" name="" id="" require> -->
            <button class="btn" type="submit">Add Blog</button>
        </form>
    </div>

    <div class="add_category">

    </div>
</body>

</html>