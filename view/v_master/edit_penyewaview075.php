<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1 class="m-0">Update Penyewa 075</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= BASEURL ?>/?url=c_master/Penyewa_C075/index">Master Penyewa</a>
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
                        Form Update - <?= $p['Nik075'] ?? $p['nik075'] ?>
                    </h3>
                </div>

                <!-- SESUAI CONTROLLER KAMU: ubah -->
                <form action="<?= BASEURL ?>/?url=c_master/Penyewa_C075/ubah" method="POST" enctype="multipart/form-data">
                    
                    <!-- KUNCI WHERE -->
                    <input type="hidden" name="user_lama075" value="<?= $p['user_plg075'] ?>">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username075" class="form-control"
                                        value="<?= $p['user_plg075'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password075" class="form-control"
                                        value="<?= $p['Sandi075'] ?? $p['sandi075'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" name="nik075" class="form-control"
                                        value="<?= $p['Nik075'] ?? $p['nik075'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap075" class="form-control"
                                        value="<?= $p['nm_lngkp075'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>No. HP</label>
                                    <input type="text" name="no_handphone075" class="form-control"
                                        value="<?= $p['no_hp075'] ?>" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat Lengkap</label>
                                    <textarea name="alamat_lengkap075" class="form-control" rows="3" required><?= $p['almt_lngkp075'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Foto KTP</label><br>
                                    <?php if(!empty($p['ft_ktp'])): ?>
                                    <img src="<?= BASEURL ?>/img/<?= $p['ft_ktp'] ?>"
                                        width="100" style="border-radius:5px; margin-bottom:5px;"><br>
                                    <?php endif; ?>
                                    <input type="file" name="ft_ktp075" class="form-control" accept="image/*">
                                    <small class="form-text text-muted">Kosongkan jika tidak ganti</small>
                                </div>
                                <div class="form-group">
                                    <label>Foto SIM A</label><br>
                                    <?php if(!empty($p['ft_sim_a'])): ?>
                                    <img src="<?= BASEURL ?>/img/<?= $p['ft_sim_a'] ?>"
                                        width="100" style="border-radius:5px; margin-bottom:5px;"><br>
                                    <?php endif; ?>
                                    <input type="file" name="ft_sim_a075" class="form-control" accept="image/*">
                                    <small class="form-text text-muted">Kosongkan jika tidak ganti</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= BASEURL ?>/?url=c_master/Penyewa_C075/index"
                            class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>