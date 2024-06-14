
<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Product</h2>
    <?php

    require_once "config.php";

    $product_id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE prod_id = {$product_id}";
    $result = mysqli_query($conn, $sql) or die("Query Failed!");
    if(mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <form class="post-form" action="updateProduct.php" method="post" enctype= multipart/form-data>
        <div class="form-group">
            <label>Product Name</label>
            <input type="hidden" name="product_id" value="<?php echo $row['prod_id']; ?>"  />
            <input type="text" name="product_name" maxlength="30" value="<?php echo $row['product_name']; ?>"/>
        </div>
        
        <div class="form-group">
            <label>Category</label>
            <?php
                require_once 'config.php';
                $sql1 = "SELECT * FROM categories";
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed!");
                
                if(mysqli_num_rows($result1) > 0){
                    echo "<select name='category_id'>";
                while($row1 = mysqli_fetch_assoc($result1)){ 
                    if($row['category_id'] == $row1['cat_id'] ){
                        $select = "selected";
                    }else{
                        $select = "";
                    }
                        echo "<option {$select} value='{$row1['cat_id']}'>{$row1['category_name']}</option>";  
                }
                echo "</select>";
            }            
                ?>

        </div>
        
        <div class="form-group">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" required/>
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
