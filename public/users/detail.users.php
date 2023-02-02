<?php 
require_once('../../config/app.config.php');
include('../../layout/header.layout.php');
$data = pg_query($db, "SELECT * FROM tbl_campus ORDER BY nid  DESC");
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
                    <td></td>
                    <td>
                        <a href="home.users.php" class="btn btn-sm float-end" style="background-color:sandybrown"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-back" viewBox="0 0 16 16">
                                <path
                                    d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z" />
                            </svg> Back To Home</a>
                    </td>
                </tr>

                <?php } ?>
            </table>

        </div>
    </div>
</div>