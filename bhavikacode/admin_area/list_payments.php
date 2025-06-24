<h3 class="text-center text-success">All payments</h3> 
<table class="table table-bordered mt-5">
<thead class="bg-info">
<?php
$get_payments = "SELECT * FROM `user_payments`";
$result = mysqli_query($conn, $get_payments);
$row_count = mysqli_num_rows($result);
if($row_count == 0){
    echo "<tr><td colspan='7' class='text-center bg-danger'>No payments yet</td></tr>";
}else{
    echo "<tr>
<th>S.no</th>
<th>Invoice number</th>
<th>Amount</th>
<th>Payment mode</th>
<th>Order Date</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='bg-secondary text-light'>";
    $number = 0; 
    while($row_data = mysqli_fetch_assoc($result)){ 
        $order_id = $row_data['order_id']; 
        $payment_id = $row_data['payment_id'];
        $amount = $row_data['amount'];  
        $invoice_number = $row_data['invoice_number']; 
        $payment_mode = $row_data['payment_mode']; 
        $date = $row_data['date']; 
        $order_status = $row_data['order_status']; 
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$payment_id</td>
        <td>$amount</td>
        <td>$invoice_number</td>
        <td>$payment_mode</td>
        <td>$date</td>
        <td>$order_status</td>
        <td><a href='' class='text-light'>DO</a></td>
        </tr>";
    }
}
?>
</tbody>
</table>
