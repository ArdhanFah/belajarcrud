<?php 
error_reporting(0);
require('../../layout/header.layout.php');
require_once('../../config/app.config.php');
?>

<div class="d-flex justify-content-center">
    <div class="col-xl-8 col-lg-9 col-md-10 col-11">
        <div class="text-center mt-5">
            <img src="../../layout//static/logo.png" alt="campus" width="400vh">
        </div>
        <div class="card shadow-5-strong  mt-4">
            <div class="card-header">
                <div class="g-3 align-items justify-content-end">
                    <form action="" method="POST">
                        <div class="float-end">
                            <input type="search" name="key" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-borderless table-responsive table-striped card-body">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Name</th>
                    <th scope="col">Born</th>
                    <th scope="col">Majors</th>
                    <th scope="col">Address</th>
                    <th scope="col">Images</th>
                    <th scope="col">Handle</th>
                </tr>

            <?php 
            $key = $_POST['key'];
            if($key != ''){
                $data = pg_query($db, "SELECT * FROM tbl_campus WHERE nim LIKE '%$key%'");
            }else{
                $data = pg_query($db, "SELECT * FROM tbl_campus ORDER BY nid  DESC");
            }
            while($row = pg_fetch_array($data)){
                $img = hex2bin(substr(($row['images']),2));
            ?>
                <tr>
                    <td><?php echo $row['nid']?></td>
                    <td><?php echo $row['nim']?></td>
                    <td><?php echo $row['names']?></td>
                    <td><?php echo $row['born']?></td>
                    <td><?php echo $row['majors']?></td>
                    <td><?php echo $row['address']?></td>
                    <td><img src="data:image/*;base64,<?php echo $img ?>" width="80px"></td>
                    <td>

                        <a href="detail.users.php" class="btn btn-sm"
                            style="background-color:cornflowerblue"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-filter-square-fill" viewBox="0 1 16 16">
                                <path
                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm.5 5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1 0-1zM4 8.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm2 3a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z" />
                            </svg> Detail</a>
                    </td>
                </tr>

                <?php } ?>
            </table>

        </div>
    </div>
</div>