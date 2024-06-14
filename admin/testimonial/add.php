
<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add Testimonial</h2>
    <form class="post-form" action="addTestimonial.php" method="post" enctype= multipart/form-data>
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" maxlength="30" required/>
        </div>
        
        <div class="form-group">
            <label>Role</label>
            <select name="role_id" required>
                <option value="" selected disabled>Select Class</option>
                <?php
                require_once 'config.php';
                $sql = "SELECT * FROM roles";
                $result = mysqli_query($conn, $sql) or die("Query Failed!");
                
                while($row = mysqli_fetch_assoc($result)){               
                ?>
                <option value="<?php echo $row['role_id'] ?>"><?php echo $row['role_name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Message</label>
            <textarea name="message" id="message" style="width: 320px; height: 100px" maxlength="546" required></textarea>
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
</div>
</div>
</body>
</html>
