<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="manage.css">
    <title>Client Side Mangement Software: [Blog_Hire]</title>
</head>

<body>
    <!-- This is to connect with database  -->
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
            if(isset($_POST['submit_1']) && $_POST['submit_1']){
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
                
                echo '<div class="alert" role="alert">
                        <strong>Success!</strong> You\'ve added a new blog successfully.
                      </div>';
            }
            else if(isset($_POST['submit_2']) && $_POST['submit_2']){
                $addcategory = $_POST['addcategory'];
                $categorydescription = $_POST['categorydescription'];
                $newcategoryimage = $_POST['newcategoryimage'];

                $sqlinsert = "INSERT INTO `cat_affilog` (`cat_name`, `cat_description`, `cat_image`)
                 VALUES ('$addcategory', '$categorydescription', '$newcategoryimage');";
                $result = mysqli_query($connaffi, $sqlinsert);
                echo '<div class="alert" role="alert">
                        <strong>Success!</strong> You\'ve added a new category successfully.
                      </div>';
            }
            else if(isset($_POST['submit_5']) && $_POST['submit_5']){
                $blog_del_title = $_POST["blog_del"];
                $sql = "DELETE FROM `cat_post` WHERE `blog_title` = '$blog_del_title';";
                $result = mysqli_query($connaffi, $sql);
                echo '<div class="alert" role="alert">
                        <strong>Deleted!</strong> You\'ve deleted blog with title "'.$blog_del_title.'".
                      </div>';
            }
        }
    ?>
    <div class="dev_methods">
        <!-- This is to Add a new Blog to Database -->
        <div class="add_blog">
            <h1>Add A New Blog From Here</h1>
            <form action="manage.php" method="POST">
                <select class="add_blog_input select_width" id="" name="category" required>
                    <option selected disabled>Select your blog category</option>
                    <?php
                        $sqlload = "SELECT * FROM `cat_affilog`";
                        $sqlresult = mysqli_query($connaffi, $sqlload);

                        while($row = mysqli_fetch_assoc($sqlresult)){
                            $row_categories = $row['cat_name'];
                            echo '<option value="'.$row_categories.'">'.$row_categories.'</option>';
                        }
                    ?>
                </select>
                <select class="add_blog_input select_width" id="" name="author_image" required>
                    <option selected disabled>Select author</option>
                    <option value="Bhupendra Singh Image name">Bhupendra Singh</option>
                    <option value="Madhur Garg Image name">Madhur Garg</option>
                </select>
                <input class="add_blog_input" type="text" name="tags" id="" placeholder="Add few tags to this blog (, )"
                    required>
                <input class="add_blog_input" type="text" name="title" id="" placeholder="Blog title" required>
                <textarea class="add_blog_input" name="content" id="" cols="30" rows="6" maxlength="2000"
                    placeholder="Blog content with tags & links in HTML format" required></textarea>
                <select class="add_blog_input select_width" id="" name="about_author" required>
                    <option selected disabled>Select Blog author Description</option>
                    <option value="Bhupendra Singh Description">Bhupendra Singh Description</option>
                    <option value="Madhur Garg Description">Madhur Garg Description</option>
                </select>
                <input class="add_blog_input" type="text" name="blog_image" id="" placeholder="Image name" required>
                <!-- <label for="">Upload image for this blog</label>
            <input class="custom-file-input" type="file" accept=".jpg, .jpeg, .svg" name="" id="" required> -->
                <input class="btn" type="submit" name="submit_1" value="Add Blog">
            </form>
        </div>
        <!-- This is to Add a new Category to Database -->
        <div class="add_blog">
            <h1>Add A New Category</h1>
            <form action="manage.php" method="POST">
                <input class="add_blog_input" type="text" name="addcategory" id=""
                    placeholder="Type new blog category title" required>
                <textarea class="add_blog_input" name="categorydescription" id="" cols="30" rows="3" maxlength="2000"
                    placeholder="Add category description here" required></textarea>
                <input class="add_blog_input" type="text" name="newcategoryimage" id=""
                    placeholder="Write image name of this category" required>
                <input class="btn" type="submit" name="submit_2" value="Add Category">
            </form>
        </div>
        <!-- This is to Delete & Update any Blog From Database -->
        <div class="add_blog">
            <h1>Delete Blog</h1>
            <form action="manage.php" method="POST">
                <select class="add_blog_input select_width" id="" name="category" required>
                    <option selected disabled>Select your blog category</option>
                    <?php
                        $sqlload = "SELECT * FROM `cat_affilog`";
                        $sqlresult = mysqli_query($connaffi, $sqlload);

                        while($row = mysqli_fetch_assoc($sqlresult)){
                            $row_categories = $row['cat_name'];
                            echo '<option value="'.$row_categories.'">'.$row_categories.'</option>';
                        }
                    ?>
                </select>
                <input class="btn" type="submit" name="submit_3" value="Fetch Blogs">
            </form>

            <?php 
                if(isset($_POST['submit_3']) && $_POST['submit_3']){
                    $category = $_POST['category'];
                    
                    $sql = "SELECT * FROM  `cat_post` WHERE `blog_category`='$category';";
                    $result = mysqli_query($connaffi, $sql);
                    echo '<form action="manage.php" method="POST">
                            <table class="blog_table">
                                <tr>
                                    <th colspan="6">Blogs For '.$category.'</th>
                                </tr>
                                <tr>
                                    <th>S.No.</th>
                                    <th colspan="2">Blog Title</th>
                                    <th>Operations</th>
                                </tr>';
                    $sno = 1;
                    while($row = mysqli_fetch_assoc($result)){
                        $title = $row['blog_title'];
                        echo '<tr>
                                <td>'.$sno.'</td>
                                <td colspan="2">'.$title.'</td>
                                <td>
                                    <input class="btn_1" type="submit" name="submit_4" value="Update" disabled>
                                    <input type="hidden" name="blog_del" value="'.$title.'">
                                    <input class="btn_1" type="submit" name="submit_5" value="Delete">
                                </td>
                              </tr>';
                        $sno+=1;
                    }
                    echo '</table>
                    </form>';
                }
            ?>

        </div>
    </div>
</body>

</html>