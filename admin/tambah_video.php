<?php 
    $sql = "SELECT * FROM pendidikan";
    $result = $conn->query($sql);
?>

<!-- Tambah Jenis Paket -->
<div class="card shadow mb-4 col-6">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Video</h6>
    </div>
    <div class="card-body">
        <form method="POST" class="needs-validation" novalidate>
            <div class="mb-3 row">
                <label for="url" class="col-sm-3 col-form-label">URL</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="url" name="url" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" required></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan</label>
                <div class="col-sm-9">
                    <select class="custom-select" id="pendidikan" name="pendidikan" required>
                        <?php if($result->num_rows > 0) { ?>
                            <option selected disabled value="">Pilih Pendidikan</option>
                            <?php while($row = $result->fetch_assoc()) { ?>
                                <option value=<?= $row['id'] ?>><?= $row['pendidikan'] ?></option>
                            <?php } ?>
                        <?php } else { ?>
                                <option disabled>Tidak ada data</option>
                        <?php } ?>
                    </select>
                </div>    
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php 
    if(isset($_POST['simpan'])) {
        $url = $_POST['url'];
        $deskripsi = $_POST['deskripsi'];
        $pendidikan = $_POST['pendidikan'];

        $conn->query("INSERT INTO video (url, deskripsi, pendidikan_id) VALUES ('$url', '$deskripsi', $pendidikan)");

        echo "<script>alert('Video telah ditambahkan')</script>";
        echo "<script>location='index.php?halaman=video'</script>";

    }
?>