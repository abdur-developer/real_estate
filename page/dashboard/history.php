<?php

$sql = "SELECT * FROM transection WHERE user_id = '".$user['id']."'";
$history_query = mysqli_query($conn, $sql);
if(mysqli_num_rows($history_query) > 0){

?>
<style>
    .txn-history {
        text-align: left;
        max-width: 500px;
        margin: 0 auto;
    }

    .txn-list {
        background-color: #86ebff45;
        padding: 8px 10px;
        color: #777;
        font-size: 14px;
        margin: 5px 10px;
        border-radius: 10px;
    }

    .amount{float: right;}
    .debit {color: red;}
    .credit {color: green;}
</style>
<div class="txn-history">
    <p><b>History</b></p>

    <?php
    while($row = mysqli_fetch_assoc($history_query)){
        echo "<p class='txn-list'>".$row['message']."<span class='amount ";

        echo ($row['is_add'] == 0) ? "debit'>-৳ ": "credit'>+৳ ";

        echo $row['amount']."</span></p>";
    }
    ?>
</div>

<?php } ?>