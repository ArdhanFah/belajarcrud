<?php 
require_once('../../config/app.config.php');
include('../../layout/header.layout.php');
$nid = $_GET['nid'];
$data = pg_query($db, "SELECT * FROM tbl_campus WHERE nid=$nid");
            while($row = pg_fetch_array($data)){
                $img = hex2bin(substr(($row['images']),2));
?>

<div class="d-flex justify-content-center">
    <div class="col-xl-8 col-lg-9 col-md-10 col-11">
        <div class="text-center mt-5">
            <img src="../../layout//static/logo.png" alt="campus" width="400vh">
        </div>
        <div class="card shadow-5-strong  mt-4">
            <div class="card-header">
                <h4>Data Mahasiswa</h4>
            </div>
            <table class="table table-borderless table-responsive table-striped card-body">
                <tr>
                    <th scope="col">No</th>
                    <td><?php echo $row['nid']?></td>
                </tr>
                <tr>
                    <th scope="col">Nim</th>
                    <td><?php echo $row['nim']?></td>
                </tr>
                <tr>
                    <th scope="col">Name</th>
                    <td><?php echo $row['names']?></td>
                </tr>
                <tr>
                    <th scope="col">Born</th>
                    <td><?php echo $row['born']?></td>
                </tr>
                <tr>
                    <th scope="col">Majors</th>
                    <td><?php echo $row['majors']?></td>
                </tr>
                <tr>
                    <th scope="col">Address</th>
                    <td><?php echo $row['address']?></td>
                </tr>
                <tr>
                    <th scope="col">Images</th>
                    <td><img src="data:image/*;base64,<?php echo $img ?>" width="80px"></td>
                </tr>

                <tr>
                <td>
                    <a href="home.admin.php" class="btn btn-sm"
                        style="background-color:darkcyan"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-archive-fill" viewBox="0 1 16 16">
                            <path
                                d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                        </svg> Back To Home</a>
                </td>
                </tr>

                <?php } ?>
            </table>

        </div>
    </div>
</div>