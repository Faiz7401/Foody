<?php include('partials/top.php'); ?>

        <div class="column middle">
            <a style="cursor: pointer" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i></a>
            </div>

        <div class="column right">
            <div class="info">
                
                <h2>Edit Complaint</h2><br>

                <form  action="update.php" method="post">
                            <label for="complaint_ID">Complaint ID:</label><br>
                            <input type="text" id="complaint_ID" name="complaint_ID" value="<?php echo $row['complaint_ID']?>"><br><br>
                            <label for="order_ID">Order ID:</label><br>
                            <input type="text" id="order_ID" value="<?php echo $row['order_ID']?>"  name="order_ID"><br><br>
                            <label for="complaint_type">Complaint Type:</label><br>
                            <input type="complaint_type" id="complaint_type" value="<?php echo $row['complaint_type']?>" name="complaint_type"><br><br>
                            <label for="complaint_date">Complaint Date:</label><br>
                            <input type="date" id="complaint_date" value="<?php echo $row['complaint_date']?>" name="complaint_date"><br><br>
                            <label for="complaint_time">Complaint Time:</label><br>
                            <input type="time" id="complaint_time" value="<?php echo $row['complaint_time']?>" name="complaint_time"><br><br>
                            <label for="complaint_type">Complaint Type:</label><br>
                            <input type="text" id="complaint_type" value="<?php echo $row['complaint_type']?>" name="complaint_type"><br><br>
                            <label for="complaint_desc">Complaint Description:</label><br>
                            <input type="text" id="complaint_desc" value="<?php echo $row['complaint_desc']?>" name="complaint_desc"><br><br>
                            <input type="submit" name="Update" value="Update" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

<?php include('partials/footer.php'); ?>