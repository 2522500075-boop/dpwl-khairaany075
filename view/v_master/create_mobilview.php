<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"><h1 class="m-0">Entri Data Mobil</h1></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
            <li class="breadcrumb-item active">Entri Data Mobil</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-car"></i> Form Entri Data Mobil</h3>
        </div>
        <form action="<?= base_url('?url=c_master/Mobil_C/simpan') ?>" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>No. Plat</label>
                  <input type="text" name="no_plat" class="form-control" placeholder="Contoh: BN 1234 AB" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Mobil</label>
                  <input type="text" name="nm_mobil" class="form-control" placeholder="Contoh: Toyota Avanza" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group"><label>Jumlah Kursi</label><input type="number" name="nkursi" class="form-control" required></div>
              </div>
              <div class="col-md-3">
                <div class="form-group"><label>Jumlah Bagasi</label><input type="number" name="nbagasi" class="form-control" required></div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Jenis Mobil</label>
                  <select name="jns_mobil" class="form-control" required>
                    <option value="">-- Pilih Jenis --</option>
                    <option>Kijang</option><option>Sedan</option><option>SUV</option><option>Avanza</option><option>Xenia</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Transmisi</label>
                  <select name="transmisi" class="form-control" required>
                    <option value="">-- Pilih Transmisi --</option>
                    <option>Manual</option><option>Automatic</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Tahun Pembuatan</label>
                  <input type="number" name="thn_buat" class="form-control" placeholder="Contoh: 2024" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Biaya Per Hari</label>
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                    <input type="number" name="hrg_hari" class="form-control" placeholder="Contoh: 350000" required>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Status Unit</label>
                  <select name="status_unit" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Aktif">Aktif</option><option value="Tidak Aktif">Tidak Aktif</option><option value="Disewa">Disewa</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12"><label><i class="fas fa-camera"></i> Foto Mobil</label></div>
              <div class="col-md-4">
                <div class="form-group"><label>Foto Depan</label><input type="file" name="ft_depan" class="form-control"><small>Format JPG, JPEG atau PNG</small></div>
              </div>
              <div class="col-md-4">
                <div class="form-group"><label>Foto Belakang</label><input type="file" name="ft_blkg" class="form-control"><small>Format JPG, JPEG atau PNG</small></div>
              </div>
              <div class="col-md-4">
                <div class="form-group"><label>Foto Interior</label><input type="file" name="ft_interior" class="form-control"><small>Format JPG, JPEG atau PNG</small></div>
              </div>
            </div>

            <div class="form-group">
              <label>Catatan Unit</label>
              <textarea name="cttn_unit" class="form-control" rows="3" placeholder="Masukkan catatan mengenai kendaraan">-</textarea>
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="<?= base_url('?url=c_master/Mobil_C/index') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>