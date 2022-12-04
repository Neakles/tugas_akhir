<?= $this->extend('layout/index'); ?>
<?= $this->section('page-content'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container-fluid">

    <div class="modal fade show" id="addNewSantri" tabindex="-1" role="dialog" aria-labelledby="addNewSantriLabel" aria-modal="true" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewSantriLabel">Tambah Santri Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="p-5">
                    <form class="santri" method="post" action="https://taspp.posttench.com/santri/tambah_aksi" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nis">NIS</label><br>
                            <input type="text" class="form-control form-control-user" id="nis" name="nis" placeholder="Masukan NIS" value="" required="">
                        </div>
                        <div class="form-group">
                            <label for="nama_santri">Nama Santri</label>
                            <input type="text" class="form-control form-control-user" id="nama_santri" name="nama_santri" placeholder="Masukan Nama Santri" value="">
                        </div>
                        <div class="form-group">
                            &nbsp;<label>Unggah foto</label><br>
                            &nbsp;<input type="file" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukan email" value="">
                        </div>
                        <div class="form-group">
                            <label for="laki-laki">Jenis Kelamin</label><br>
                            &nbsp;<input type="radio" name="jenis_kelamin" id="laki-laki" class="with-gap" value="laki-laki">
                            <label for="laki-laki" class="m-l-20">Laki-Laki</label>
                            <input type="radio" name="jenis_kelamin" id="perempuan" class="with-gap" value="perempuan">
                            <label for="perempuan" class="m-l-20">perempuan</label>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan password">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukan Alamat Santri" value="">
                        </div>
                        <div class="form-group">
                            <label for="no_hp_santri">No. HP Santri</label>
                            <input type="text" class="form-control form-control-user" id="no_hp_santri" name="no_hp" placeholder="Masukan Nomor Hp Santri" value="">
                        </div>
                        <div class="form-group">
                            <label for="ayah">Ayah</label>
                            <input type="text" class="form-control form-control-user" id="ayah" name="ayah" placeholder="Masukan Nama Ayah" value="">
                        </div>
                        <div class="form-group">
                            <label for="ibu">Ibu</label>
                            <input type="text" class="form-control form-control-user" id="ibu" name="ibu" placeholder="Masukan Nama" value="">
                        </div>

                        <div class="form-group" hidden="">
                            <input type="text" class="form-control form-control-user" id="role_id" name="role_id" value="3">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="tambah" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>