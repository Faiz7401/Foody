<?php include('../_rider/partials/dbconn.php');
$result = mysqli_query($conn,"SELECT * FROM complaint WHERE Complaint_ID = '".$_SESSION['general User']."'");
?>

        <div class="column middle">
            <a style="cursor: pointer" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i></a>
            </div>

        <div class="column right">
            <div class="info">
                
                <br><br><br><br>

                <div class="filec">
                    <table name="buttons">
                    <td class="b"><button onclick="document.location='filecomp.php'" class="clist">FILE A COMPLAINT</button></td>
                    <td class="b"><button onclick="document.location='list.php'" class="clist">VIEW COMPLAINT LIST</button></td>
                    <td class="b"><button onclick="document.location='#report.php'" class="clist">VIEW COMPLAINT REPORT</button></td>
                    </table>
                </div>

            </div>
        </div>
    </div>

<?php include('partials/footer.php'); ?>