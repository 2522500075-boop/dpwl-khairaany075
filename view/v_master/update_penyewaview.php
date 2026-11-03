<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('?url=c_master/Penyewa_C059/index') ?>">Master Penyewa</a>
                        </li>
                        <li class="breadcrumb-item active">Update Penyewa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-edit"></i>
                        Form Update Data Penyewa - <?= $penyewa['Nik059'] ?>
                    </h3>
                </div>

                <form action="<?= base_url('?url=c_master/Penyewa_C059/UpdatePenyewa') ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="user_plg059" class="form-control"
                                        value="<?= $penyewa['user_plg059'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="Sandi059" class="form-control"
                                        value="<?= $penyewa['Sandi059'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" name="Nik059" class="form-control"
                                        value="<?= $penyewa['Nik059'] ?>" readonly required>
                                </div>

                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nm_lngkp059" class="form-control"
                                        value="<?= $penyewa['nm_lngkp059'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>No. HP</label>
                                    <input type="text" name="no_hp059" class="form-control"
                                        value="<?= $penyewa['no_hp059'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Foto KTP</label><br>
                                    <img src="<?= base_url('img/'.$penyewa['ft_ktp']) ?>"
                                        width="100" style="border-radius:5px; margin-bottom:5px;"><br>

                                    <input type="file" name="ft_ktp" class="form-control" accept="image/*">

                                    <small class="form-text text-muted">
                                        Format JPG, JPEG atau PNG - Kosongkan jika tidak ganti
                                    </small>

                                    <input type="hidden" name="ft_ktp_asli"
                                        value="<?= $penyewa['ft_ktp'] ?>">
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Alamat Lengkap</label>
                                    <textarea name="almt_lngkp059" class="form-control" rows="3" required><?= $penyewa['almt_lngkp059'] ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Foto SIM A</label><br>
                                    <img src="<?= base_url('img/'.$penyewa['ft_sim_a']) ?>"
                                        width="100" style="border-radius:5px; margin-bottom:5px;"><br>

                                    <input type="file" name="ft_sim_a" class="form-control" accept="image/*">

                                    <small class="form-text text-muted">
                                        Format JPG, JPEG atau PNG - Kosongkan jika tidak ganti
                                    </small>

                                    <input type="hidden" name="ft_sim_a_asli"
                                        value="<?= $penyewa['ft_sim_a'] ?>">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>

                        <a href="<?= base_url('?url=c_master/Penyewa_C059/index') ?>"
                            class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>