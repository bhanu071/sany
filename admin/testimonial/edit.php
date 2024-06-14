
<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Testimonial</h2>

    <?php

    require_once "config.php";

    $test_id = $_GET['id'];

    $sql = "SELECT * FROM testimonials WHERE id = {$test_id}";
    $result = mysqli_query($conn, $sql) or die("Query Failed!");
    if(mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_assoc($result)) {
    ?>

    <form class="post-form" action="updateTestimonial.php" method="post" enctype= multipart/form-data>
        <div class="form-group">
            <label>Name</label>
            <input type="hidden" name="test_id" value="<?php echo $row['id']; ?>"  />
            <input type="text" name="name" required maxlength="30" value="<?php echo $row['name']; ?>" />
        </div>
        
        <div class="form-group">
            <label>Role</label>
            
                <?php
                require_once 'config.php';
                $sql1 = "SELECT * FROM roles";
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed!");
                
                if(mysqli_num_rows($result1) > 0){
                    echo "<select name='role_id' required>";
                while($row1 = mysqli_fetch_assoc($result1)){ 
                    if($row['role_id'] == $row1['role_id'] ){
                        $select = "selected";
                    }else{
                        $select = "";
                    }
                        echo "<option {$select} value='{$row1['role_id']}'>{$row1['role_name']}</option>";  
                }
                echo "</select>";
            }            
                ?>
                

           
        </div>
        <div class="form-group">
            <label>Message</label>
            <textarea name="message" id="message" style="width: 320px; height: 100px" maxlength="546" required><?php echo $row['message']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Photo</label>
            <input type="file" name="image" required/>
        </div>
        <div class="form-group">            
            <img src="" alt="" style="width: 70px; height: 60px; align-item: center;">
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
    <?php 
      }
    }
    ?>
</div>
</div>
</body>
</html>
