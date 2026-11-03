<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"><h1 class="m-0">Data Penyewa</h1></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Master Data</li>
            <li class="breadcrumb-item active">Data Penyewa</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <a href="<?= BASEURL ?>/?url=c_master/Penyewa_C075/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data Penyewa</a>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Username</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>No. HP</th>
                <th>Alamat Lengkap</th>
                <th>Foto KTP</th>
                <th>Foto SIM A</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($dtpenyewa)) { foreach($dtpenyewa as $p) { ?>
              <tr>
                <td><?= $p['user_plg075'] ?></td>
                <td><?= $p['Nik075'] ?? $p['nik075'] ?></td>
                <td><?= $p['nm_lngkp075'] ?></td>
                <td><?= $p['no_hp075'] ?></td>
                <td><?= $p['almt_lngkp075'] ?></td>
                <td><img src="<?= BASEURL ?>/img/<?= $p['ft_ktp'] ?>" width="100" style="border-radius:5px"></td>
                <td><img src="<?= BASEURL ?>/img/<?= $p['ft_sim_a'] ?>" width="100" style="border-radius:5px"></td>
                <td>
                  <a href="<?= BASEURL ?>/?url=c_master/Penyewa_C075/edit/<?= $p['user_plg075'] ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="<?= BASEURL ?>/?url=c_master/Penyewa_C075/hapus/<?= $p['user_plg075'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
                </td>
              </tr>
              <?php } } else { ?>
              <tr><td colspan="8" class="text-center">Belum ada data penyewa - Klik Tambah Data</td></tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>