<?php
include 'header.php';
?>
<div id="main-content">
<h2>All Product</h2>
    <?php
    require_once "config.php";
    $sql = "SELECT * FROM products JOIN categories WHERE products.category_id = categories.cat_id";
    $result = mysqli_query($conn, $sql) or die("Query Failed!");
    if(mysqli_num_rows($result) > 0){

    
    ?>
   
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Thumbnail</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php
            $counter=0;
            while($row = mysqli_fetch_assoc($result)){

          
            ?>
            <tr>
                <td>
                <?php echo $counter=$counter+1;   ?>
                </td>
                <td> <img src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/sany/admin/product/' . $row['thumbnail']; ?>" alt="" style="width: 80px; height: 60px;"> </td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['category_name']; ?></td>
               
                <td>
                    <a href='edit.php?id=<?php echo $row['prod_id']; ?>'>Edit</a>
                    <a href='deleteProduct.php?id=<?php echo $row['prod_id']; ?>'>Delete</a>
                </td>
            </tr>
            <?php   } ?>
        </tbody>
    </table>
    <?php
    }
    ?>
</div>
</div>
</body>
</html>
