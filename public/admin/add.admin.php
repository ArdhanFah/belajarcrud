<?php 
require('../../layout/header.layout.php');
?>

<div class="d-flex justify-content-center">
    <div class="co-xl-8 col-lg-8 col-md-8 col-8">
        <div class="text-center mt-5">
            <img src="../../layout/static/logo.png" alt="campus" width="400vh">
        </div>
        <div class="card shadow-5-strong mt-5">
            <div class="card-header text-start">
                Add Data Mahasiswa
            </div>
            <form action="" method="POST" enctype="multipart/form-data" class="card-body form-horizontal p-3">
                <div class="mb-3">
                    <label for="NIM" class="form-label">Nim <span class="text-danger">*</span></label>
                    <input type="number" name="nim" id="NIM" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="NAMES" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="names" id="NAMES" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="BORN" class="form-label">Born <span class="text-danger">*</span></label>
                    <input type="date" name="born" id="BORN" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="MAJORS" class="form-label">Majors <span class="text-danger">*</span></label>
                    <select name="majors" id="MAJORS" class="form-select">
                        <option disabled selected>Choose One</option>
                        <option value="Perkantoran">Perkantoran</option>
                        <option value="Programing">Programing</option>
                        <option value="Networking">Networking</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ADDRESS" class="form-label">Address <span class="text-danger">*</span></label>
                    <input type="text" name="address" id="ADDRESS" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="IMAGES" class="form-label">Images <span class="text-danger">*</span></label>
                    <input type="file" name="images" id="IMAGES" class="form-control" required>
                </div>
                <div class="mb-3">
                    <button class="btn btn-sm float-end" name="submit" style="background-color:sandybrown"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus" viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg> Tambah</button>
                </div>
            </form>

        </div>
    </div>
</div>


<?php 


require_once('../../config/app.config.php');

if(isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $names = $_POST['names'];
    $born = $_POST['born'];
    $majors = $_POST['majors'];
    $address = $_POST['address'];
    $images = $_FILES['images']['tmp_name'];

    $svimg = base64_encode(file_get_contents($images));

    $query = pg_query($db, "INSERT INTO tbl_campus(nim,names,born,majors,address,images) VALUES ($nim,'$names','$born','$majors','$address','$svimg')");

    if($query){
       header('location: home.admin.php');
    }

}

require('../../layout/footer.layout.php');
?>