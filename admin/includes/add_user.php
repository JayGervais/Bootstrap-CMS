<?php 

if(isset($_POST['create_user'])) {
    
    // post data from form
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    
   /* $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name']; */
    
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
   // $post_date = date('d-m-y');
    //$post_comment_count = 4;
    

 /*    // upload temp file and send to directory
    move_uploaded_file($post_image_temp, "../images/$post_image"); */
    
   // query to insert data to database
    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
    // continued with values
    $query .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$username}', '{$user_email}', '{$user_password}' ) ";
    
    // database connection query
    $create_user_query = mysqli_query($connection, $query);
    
    // query error check function
    confirmQuery($create_user_query); 
    
    
}


?>
   

   
   <form action="" method="post" enctype="multipart/form-data">
     

    <div class="form-group">
        <label for="title">First Name</label><br>
        <input type="text" class="form-control" name="user_firstname">
    </div> 
    
    <div class="form-group">
        <label for="post_status">Last Name</label><br>
        <input type="text" class="form-control" name="user_lastname">
    </div>   

    <div class="form-group">
        <label for="user_role">User Role</label><br>
        <select name="user_role">
        <option value="subscriber">Select Role</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
    </select>
    </div>  


    
        
   <!-- <div class="form-group">
        <label for="post_image">User Image</label><br>
        <input type="file" name="image">
    </div> -->
    
    <div class="form-group">
        <label for="post_tags">Username</label><br>
        <input type="text" class="form-control" name="username">
    </div> 
    
    <div class="form-group">
        <label for="post_tags">Email</label><br>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="post_tags">Password</label><br>
        <input type="password" class="form-control" name="user_password">
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>

    
</form>