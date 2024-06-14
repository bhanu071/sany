
<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add Product</h2>
    <form class="post-form" action="storeProduct.php" method="post" enctype= multipart/form-data>
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="product_name" maxlength="30" required/>
        </div>
        
        <div class="form-group">
            <label>Category</label>
            <select name="category_id"  required>
    <option value="" selected disabled>Select Class</option>
    <?php
    require_once 'config.php';
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn, $sql) or die("Query Failed!");
    
    
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    
    foreach ($categories as $category) {
        ?>
        <option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
        <?php
    }
    ?>
</select>

        </div>
        
        <div class="form-group">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" required />
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
