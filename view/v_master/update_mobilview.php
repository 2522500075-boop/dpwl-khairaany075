<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/?url=c_master/Mobil_C/index">Master Mobil</a></li>
                        <li class="breadcrumb-item active">Update Mobil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-car"></i> Form Update Data Mobil - <?= $mobil['no_plat'] ?></h3>
                </div>
                <form action="<?= BASEURL ?>/?url=c_master/Mobil_C/UpdateMobil" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="no_plat_lama" value="<?= $mobil['no_plat'] ?>">
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No. Plat</label>
                                    <input type="text" name="no_plat" class="form-control" value="<?= $mobil['no_plat'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Mobil</label>
                                    <input type="text" name="nm_mobil" class="form-control" value="<?= $mobil['nm_mobil'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Kursi</label>
                                    <input type="number" name="nkursi" class="form-control" value="<?= $mobil['nkursi'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Mobil</label>
                                    <input type="text" name="jns_mobil" class="form-control" value="<?= $mobil['jns_mobil'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Buat</label>
                                    <input type="text" name="thn_buat" class="form-control" value="<?= $mobil['thn_buat'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Foto Depan</label><br>
                                    <img src="<?= BASEURL ?>/img/<?= $mobil['ft_depan'] ?>" width="100" style="border-radius:5px; margin-bottom:5px;"><br>
                                    <input type="file" name="ft_depan" class="form-control" accept="image/*">
                                    <small class="form-text text-muted">Format JPG, JPEG atau PNG - Kosongkan jika tidak ganti</small>
                                    <input type="hidden" name="ft_depan_asli" value="<?= $mobil['ft_depan'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Harga/Hari</label>
                                    <input type="number" name="hrg_hari" class="form-control" value="<?= $mobil['hrg_hari'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jumlah Bagasi</label>
                                    <input type="number" name="nbagasi" class="form-control" value="<?= $mobil['nbagasi'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Transmisi</label>
                                    <select name="transmisi" class="form-control">
                                        <option value="Manual" <?= $mobil['transmisi']=='Manual'?'selected':'' ?>>Manual</option>
                                        <option value="Automatic" <?= $mobil['transmisi']=='Automatic'?'selected':'' ?>>Automatic</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status_unit" class="form-control">
                                        <option value="Tersedia" <?= $mobil['status_unit']=='Tersedia'?'selected':'' ?>>Tersedia</option>
                                        <option value="Aktif" <?= $mobil['status_unit']=='Aktif'?'selected':'' ?>>Aktif</option>
                                        <option value="Tidak Aktif" <?= $mobil['status_unit']=='Tidak Aktif'?'selected':'' ?>>Tidak Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Foto Belakang</label><br>
                                    <img src="<?= BASEURL ?>/img/<?= $mobil['ft_blkg'] ?>" width="100" style="border-radius:5px; margin-bottom:5px;"><br>
                                    <input type="file" name="ft_blkg" class="form-control" accept="image/*">
                                    <input type="hidden" name="ft_blkg_asli" value="<?= $mobil['ft_blkg'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Foto Interior</label><br>
                                    <img src="<?= BASEURL ?>/img/<?= $mobil['ft_interior'] ?>" width="100" style="border-radius:5px; margin-bottom:5px;"><br>
                                    <input type="file" name="ft_interior" class="form-control" accept="image/*">
                                    <input type="hidden" name="ft_interior_asli" value="<?= $mobil['ft_interior'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <textarea name="cttn_unit" class="form-control"><?= $mobil['cttn_unit'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= BASEURL ?>/?url=c_master/Mobil_C/index" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>