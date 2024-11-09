<?php include('partials/top.php'); ?>

<div class="column middle">
            <a style="cursor: pointer" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i></a>
            </div>

        <div class="column right">
            <div class="info">
                
                <h2>Complaint List</h2><br>

                <div class="filec">
                    <table name="list">
                                  
                    <tr>
                        <td>Complaint ID</td>
                        <td>Order ID</td>
                        <td>Complaint Type</td>
                        <td>Date</td>
                        <td>Time</td>
                        <td>Complaint Description</td>
                        <td>Status</td>
                        <td>Feedback</td>
                    </tr>

                    <?php
                            include('config.php');
                            $query=mysqli_query($conn,"select * from `complaint`");
                            $query=mysqli_query($conn,"select * from `rider`");
                            $i=1;
                            while($row=mysqli_fetch_array($query)){                         
                            ?>                        
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['complaint_ID']; ?></td>
                                <td><?php echo $row['order_ID']; ?></td>
                                <td><?php echo $row['complaint_type']; ?></td>
                                <td><?php echo $row['complaint_date']; ?></td>
                                <td><?php echo $row['complaint_time']; ?></td>
                                <td><?php echo $row['complaint_desc']; ?></td>
                                <td><?php echo $row['complaint_status']; ?></td>
                                <td><?php echo $row['rider_feedback']; ?></td>
                                <td><a href="compEdit.php?complaint_ID=<?php echo $row["complaint_ID"]; ?>" type="button" class="btn btn-primary">EDIT</a>
                                <a href="compDelete.php?complaint_ID=<?php echo $row["complaint_ID"]; ?>"  type="button" class="btn btn-danger" value="Delete "name="Delete">DELETE</a>
                                </td>
                                </tr>                  
                            <?php
                            $i++;
                            }  
                    ?>
                    </table>
                </div>

            </div>
        </div>
    </div>

<?php include('partials/footer.php'); ?>