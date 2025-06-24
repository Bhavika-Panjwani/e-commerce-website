<h3 class="text-center text-success">All users</h3> 
<table class="table table-bordered mt-5">
<thead class="bg-info">
<?php
$get_users = "SELECT * FROM `user_table`";
$result = mysqli_query($conn, $get_users);
$row_count = mysqli_num_rows($result);
if($row_count == 0){
    echo "<tr><td colspan='7' class='text-center bg-danger'>No users yet</td></tr>";
}else{
    echo "<tr>
<th>S.no</th>
<th>Username</th>
<th>User email</th>
<th>User image</th>
<th>User address</th>
<th>User mobile</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='bg-secondary text-light'>";
    $number = 0; 
    while($row_data = mysqli_fetch_assoc($result)){ 
        $user_id = $row_data['user_id']; 
        $username = $row_data['username'];
        $user_email = $row_data['user_email'];  
        $user_image = $row_data['user_image']; 
        $user_address = $row_data['user_address']; 
        $user_mobile = $row_data['user_mobile']; 
        $number++;
        echo "<tr class='text-center'>
        <td>$number</td>
        <td>$username</td>
        <td>$user_email</td>
        <td><img src='../users_area/user_images/$user_image' alt='$username' class='product_img'/></td>
        <td>$user_address</td>
        <td>$user_mobile</td>
        <td><a href='' class='text-light'>DO</a></td>
        </tr>";
    }
}
?>
</tbody>
</table>
