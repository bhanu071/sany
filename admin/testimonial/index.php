<?php
include 'header.php';
?>
<div id="main-content">
<h2>All Testimonial</h2>
    <?php
    require_once "config.php";
    $sql = "SELECT * FROM testimonials JOIN roles WHERE testimonials.role_id = roles.role_id";
    $result = mysqli_query($conn, $sql) or die("Query Failed!");
    if(mysqli_num_rows($result) > 0){

    
    ?>
   
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Role</th>
        <th>Message</th>
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
                <td> <img src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/sany/admin/testimonial/' . $row['photo']; ?>" alt="" style="width: 60px; height: 60px;"> </td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['role_name']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $row['id']; ?>'>Edit</a>
                    <a href='delete-testimonial.php?id=<?php echo $row['id']; ?>'>Delete</a>
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
