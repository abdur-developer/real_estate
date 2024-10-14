<div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">
            User Details
        </h1>
    </div>
    <?php
    $id = $_REQUEST['id'] ;
    $sql = "SELECT * FROM users WHERE id = $id";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    ?>
   
    <div class="report-body">
        <table class="package">
            <tbody class="items">
                <tr>
                    <td><h3 class="t-op-nextlvl">Name : </h3></td>
                    <td><h3 class="t-op-nextlvl"><?=$row['name']?></h3></td>                   
                </tr>
                <tr>
                    <td><h3 class="t-op-nextlvl">Email : </h3></td>
                    <td><h3 class="t-op-nextlvl"><?=$row['email']?></h3></td>                 
                </tr>
                <tr>
                    <td><h3 class="t-op-nextlvl">Number : </h3></td>
                    <td><h3 class="t-op-nextlvl"><?=$row['number']?><img src="img/tick.png" alt="verify" width="15"></h3></td>                 
                </tr>
                <tr>
                    <td><h3 class="t-op-nextlvl">NID : </h3></td>
                    <td><h3 class="t-op-nextlvl">
                        <?php
                            if($row['nid_verify'] == '2') echo 'Verified<img src="img/tick.png" alt="verify" width="15">';
                            elseif($row['nid_verify'] == '1') echo "<a href='?q=view-request&id=$id' class='btn-warning'>Pending</a>";
                            else echo 'Not Verify';
                        ?>
                        
                    </h3></td>                 
                </tr>
                <tr>
                    <td><h3 class="t-op-nextlvl">Balance : </h3></td>
                    <td><h3 class="t-op-nextlvl"><?=$row['balance']?> tk</h3></td>
                </tr>
                <tr>
                    <td><h3 class="t-op-nextlvl">Invest : </h3></td>
                    <td><h3 class="t-op-nextlvl"><?=$row['balance_invest']?> tk</h3></td>
                </tr>
                <tr>
                    <td><h3 class="t-op-nextlvl">Bl Maching : </h3></td>
                    <td><h3 class="t-op-nextlvl"><?=$row['balance_comm']?> tk</h3></td>
                </tr>
                <tr>
                    <td><h3 class="t-op-nextlvl">Bl Bonus : </h3></td>
                    <td><h3 class="t-op-nextlvl"><?=$row['balance_refer']?> tk</h3></td>
                </tr>
                <tr>
                    <td><h3 class="t-op-nextlvl">Withdraw : </h3></td>
                    <td><h3 class="t-op-nextlvl"><?=$row['balance_withdraw']?> tk</h3></td>
                </tr>
                <tr>
                    <td><h3 class="t-op-nextlvl">Join by : </h3></td>
                    <td>
                        <?php
                        if($row['ot_ref'] == '0'){
                            echo "<h5>Website</h5>";
                        }else{
                            $sql = "SELECT id, name FROM users WHERE my_ref = '".$row['ot_ref']."'";
                            $r = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                            echo "<a class='t-op-nextlvl' href='?q=view-user&id=".$r['id']."'>".$r['name']."</a>";
                        }
                        ?>
                        
                    </td>
                </tr>
                <tr>
                    <style>
                        input{
                            font-size: 15px;
                            padding: 3px 10px;
                            margin: 0 10px;
                            width: 300px%;
                            font-weight: 500;
                        }
                        .btn{
                            display: inline-block;
                            text-align: center;
                            text-decoration: none;
                            padding: 5px 15px;
                            border: none;
                            border: 2px solid #0729a9;
                            cursor: pointer;
                            font-size: 14px;
                            border-radius: 10px;
                            background-color: #fff;
                            color: #0729a9;
                            margin: 5px auto;
                        }
                        .btn:hover{
                            color: white;
                            background-color: #0729a9;
                        }
                    </style>
                    <td>
                        <form method="post">
                            <input type="number" name="add_invest" required placeholder="Invest amount">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <input type="hidden" name="balance" value="<?=$row['balance']?>">
                            <input type="hidden" name="invest" value="<?=$row['balance_invest']?>">
                            <input type="hidden" name="ot_ref" value="<?=$row['ot_ref']?>">
                            <button type="submit" class='btn add_btn'>Add Invest</a>
                        </form>
                    </td>
                    <td>
                        <form method="post">
                            <input type="number" name="add_withdraw" required placeholder="Withdraw amount">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <input type="hidden" name="balance" value="<?=$row['balance']?>">
                            <input type="hidden" name="withdraw" value="<?=$row['balance_withdraw']?>">
                            <button type="submit" class='btn add_btn'>Withdraw</a>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href='?user-login=<?= $row['number'] ?>' target="_blank" class="btn-true">Login as user</a>
                    </td>
                    <td>
                        <a href='?user-login=<?= $row['number'] ?>' target="_blank" class="btn-false">Ban user</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>