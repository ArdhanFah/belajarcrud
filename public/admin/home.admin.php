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
                        <div>
                            <a href="add.admin.php" style="background-color:cornflowerblue" class="btn btn-sm"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg> Tambah Data</a>
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
                $data = pg_query($db, "SELECT * FROM tbl_campus WHERE names LIKE '%$key%'");
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
                        <a href="update.admin.php?nid=<?php echo $row['nid']?>" class="btn btn-sm"
                            style="background-color:burlywood"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                height="14" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 1 16 16">
                                <path
                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                            </svg> Update</a>

                        <a href="detail.admin.php?nid=<?php echo $row['nid']?>" class="btn btn-sm"
                            style="background-color:cornflowerblue"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-filter-square-fill" viewBox="0 1 16 16">
                                <path
                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm.5 5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1 0-1zM4 8.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm2 3a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z" />
                            </svg> Detail</a>
                        <a href="destroy.admin.php?nid=<?php echo $row['nid']?>" class="btn btn-sm"
                            style="background-color:crimson" onclick="return confirm('apakah anda yakin')"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 1 16 16">
                                <path
                                    d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                            </svg> Delete</a>
                    </td>
                </tr>

                <?php } ?>
            </table>

        </div>
    </div>
</div>