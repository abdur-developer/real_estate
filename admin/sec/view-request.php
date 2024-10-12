<div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">
            Request Details
        </h1>
    </div>
    <?php
    if(!isset($_REQUEST['id'])){
      header("location: logout.php");
    }
    $id = $_REQUEST['id'] ;
    $sql = "SELECT users.name, nid.user_id, users.number, nid.front, nid.back FROM nid INNER JOIN users ON nid.user_id = users.id WHERE nid.id = $id";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    
    ?>
    <div class="report-body">
        <form class="first">
            <table class="package">
                <tbody class="items">
                    <tr>
                        <td><h3 class="t-op-nextlvl">Name : </h3></td>
                        <td><h3 class="t-op-nextlvl">
                            <a href='?q=view-user&id=<?= $row['user_id'] ?>'><?= $row['name'] ?></a>
                        </h3></td>                   
                    </tr>
                    <tr>
                        <td>
                            <h3 class="t-op-nextlvl">Number : </h3>
                        </td>
                        <td>
                            <h3 class="t-op-nextlvl"><?=$row['number']?></h3>
                        </td>                 
                    </tr>
                    <tr>
                        <td>
                            <img src="../<?=$row['front']?>" alt="front image" class="img-fluid">
                        </td>
                        <td>
                            <img src="../<?=$row['back']?>" alt="back image" class="img-fluid">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 class='t-op-nextlvl'>
                                <a href='?request_action=<?= $id ?>&user_id=<?=$row['user_id']?>&action=delete' class='btn-false'>Delete</a>
                            </h3>
                        </td>
                        <td>
                            <h3 class='t-op-nextlvl'>
                                <a href='?request_action=<?= $id ?>&user_id=<?=$row['user_id']?>&action=accept' class='btn-true'>Accept</a>
                            </h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>