<?php 

if(isset($_POST['create_post'])) {
    
    // post data from form
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;
    
    // upload temp file and send to directory
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    // query to insert data to database
    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
    // continued with values
    $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}' ) ";
    
    // database connection query
    $create_post_query = mysqli_query($connection, $query);
    
    // query error check function
    confirmQuery($create_post_query);
    
    
}


?>
   

   
   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="title">Post Title</label><br>
        <input type="text" class="form-control" name="title">
    </div>   
    
    <div class="form-group">
        <label for="post_category">Post Category ID</label><br>
        <input type="text" class="form-control" name="post_category_id">
    </div>     
    
    <div class="form-group">
        <label for="title">Post Author</label><br>
        <input type="text" class="form-control" name="author">
    </div> 
    
    <div class="form-group">
        <label for="post_status">Post Status</label><br>
        <input type="text" class="form-control" name="post_status">
    </div>   
    
    <div class="form-group">
        <label for="title">Post Image</label><br>
        <input type="file" name="image">
    </div> 
    
    <div class="form-group">
        <label for="post_tags">Post Tags</label><br>
        <input type="text" class="form-control" name="post_tags">
    </div> 
    
    <div class="form-group">
        <label for="post_content">Post Content</label><br>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10" ></textarea>
    </div> 
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>

    
</form>