<?php
class Mobil_C extends Controller
{
    public function index()
    {
        $cekdata = $this->load->model('m_master/Mobil_M');
        $dt['dtmobil'] = $cekdata->datamobil();
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/mobilview', $dt);
        $this->load->view('layout/footer');
    }

    public function create_mobil()
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_mobilview');
        $this->load->view('layout/footer');
    }

    public function simpan()
    {
        $mobil = $this->load->model('m_master/Mobil_M');
        if ($mobil->cekplat($this->load->post('no_plat'))) {
            echo "<script>
                alert('Nomor plat sudah terdaftar!');
                window.history.back();
            </script>";
            exit;
        }

        $ft_depan = 'Depan' . $this->load->post('no_plat');
        $ft_blkg = 'Belakang' . $this->load->post('no_plat');
        $ft_interior = 'Interior' . $this->load->post('no_plat');
        
        $nm_gambar = $_FILES['ft_depan']['tmp_name'];
        $ekstensi = explode(".", $_FILES['ft_depan']['name']);
        $ekstensi = end($ekstensi);
        $ft_depan = $ft_depan . "." . $ekstensi;
        $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_depan;
        if ($ekstensi == "jpg" || $ekstensi == "png" || $ekstensi == "jpeg") {
            move_uploaded_file($nm_gambar, $target_dir);
        }

        $nm_gambar2 = $_FILES['ft_blkg']['tmp_name'];
        $ekstensi2 = explode(".", $_FILES['ft_blkg']['name']);
        $ekstensi2 = end($ekstensi2);
        $ft_blkg = $ft_blkg . "." . $ekstensi2;
        $target_dir2 = dirname(__DIR__, 2) . '/img/' . $ft_blkg;
        if ($ekstensi2 == "jpg" || $ekstensi2 == "png" || $ekstensi2 == "jpeg") {
            move_uploaded_file($nm_gambar2, $target_dir2);
        }

        $nm_gambar3 = $_FILES['ft_interior']['tmp_name'];
        $ekstensi3 = explode(".", $_FILES['ft_interior']['name']);
        $ekstensi3 = end($ekstensi3);
        $ft_interior = $ft_interior . "." . $ekstensi3;
        $target_dir3 = dirname(__DIR__, 2) . '/img/' . $ft_interior;
        if ($ekstensi3 == "jpg" || $ekstensi3 == "png" || $ekstensi3 == "jpeg") {
            move_uploaded_file($nm_gambar3, $target_dir3);
        }

        $data = [
            'no_plat' => $this->load->post('no_plat'),
            'nm_mobil' => $this->load->post('nm_mobil'),
            'nkursi' => $this->load->post('nkursi'),
            'nbagasi' => $this->load->post('nbagasi'),
            'jns_mobil' => $this->load->post('jns_mobil'),
            'transmisi' => $this->load->post('transmisi'),
            'thn_buat' => $this->load->post('thn_buat'),
            'ft_depan' => $ft_depan,
            'ft_blkg' => $ft_blkg,
            'ft_interior' => $ft_interior,
            'hrg_hari' => $this->load->post('hrg_hari'),
            'cttn_unit' => $this->load->post('cttn_unit'),
            'status_unit' => $this->load->post('status_unit')
        ];

        $simpan = $mobil->simpan($data);

        if ($simpan) {
            echo "<script>
                alert('Data mobil berhasil disimpan!');
                window.location.href = '" . BASEURL . "/?url=c_master/Mobil_C/index';
            </script>";
        } else {
            echo "<script>
                alert('Data mobil gagal disimpan!');
                window.history.back();
            </script>";
        }
    }

    public function edit($no_plat)
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $mobil = $this->load->model('m_master/Mobil_M');
        $dt['mobil'] = $mobil->detailmobil($no_plat);
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/update_mobilview', $dt);
        $this->load->view('layout/footer');
    }

    public function UpdateMobil()
    {
        $mobil = $this->load->model('m_master/Mobil_M');

        $no_plat_lama = $this->load->post('no_plat_lama');
        $no_plat_baru = $this->load->post('no_plat');

        $ft_depan = 'Depan' . $no_plat_baru;
        $ft_depan_asli = $this->load->post('ft_depan_asli');

        if (isset($_FILES['ft_depan']) && $_FILES['ft_depan']['error'] != UPLOAD_ERR_NO_FILE) {
            $nm_gambar = $_FILES['ft_depan']['tmp_name'];
            $ekstensi = explode(".", $_FILES['ft_depan']['name']);
            $ekstensi = end($ekstensi);
            $ekstensi = strtolower($ekstensi);
            $ft_depan = $ft_depan . "." . $ekstensi;
            $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_depan;
            move_uploaded_file($nm_gambar, $target_dir);
        } else {
            $ft_depan = $ft_depan_asli;
        }

        $ft_blkg = 'Belakang' . $no_plat_baru;
        $ft_blkg_asli = $this->load->post('ft_blkg_asli');
        if (isset($_FILES['ft_blkg']) && $_FILES['ft_blkg']['error'] != UPLOAD_ERR_NO_FILE) {
            $nm_gambar2 = $_FILES['ft_blkg']['tmp_name'];
            $ekstensi2 = explode(".", $_FILES['ft_blkg']['name']);
            $ekstensi2 = end($ekstensi2);
            $ekstensi2 = strtolower($ekstensi2);
            $ft_blkg = $ft_blkg . "." . $ekstensi2;
            $target_dir2 = dirname(__DIR__, 2) . '/img/' . $ft_blkg;
            move_uploaded_file($nm_gambar2, $target_dir2);
        } else {
            $ft_blkg = $ft_blkg_asli;
        }

        $ft_interior = 'Interior' . $no_plat_baru;
        $ft_interior_asli = $this->load->post('ft_interior_asli');
        if (isset($_FILES['ft_interior']) && $_FILES['ft_interior']['error'] != UPLOAD_ERR_NO_FILE) {
            $nm_gambar3 = $_FILES['ft_interior']['tmp_name'];
            $ekstensi3 = explode(".", $_FILES['ft_interior']['name']);
            $ekstensi3 = end($ekstensi3);
            $ekstensi3 = strtolower($ekstensi3);
            $ft_interior = $ft_interior . "." . $ekstensi3;
            $target_dir3 = dirname(__DIR__, 2) . '/img/' . $ft_interior;
            move_uploaded_file($nm_gambar3, $target_dir3);
        } else {
            $ft_interior = $ft_interior_asli;
        }

        $data = [
            'no_plat_lama' => $no_plat_lama,
            'no_plat'     => $no_plat_baru,
            'nm_mobil'    => $this->load->post('nm_mobil'),
            'nkursi'      => $this->load->post('nkursi'),
            'nbagasi'     => $this->load->post('nbagasi'),
            'jns_mobil'   => $this->load->post('jns_mobil'),
            'transmisi'   => $this->load->post('transmisi'),
            'thn_buat'    => $this->load->post('thn_buat'),
            'ft_depan'    => $ft_depan,
            'ft_blkg'     => $ft_blkg,
            'ft_interior' => $ft_interior,
            'hrg_hari'    => $this->load->post('hrg_hari'),
            'cttn_unit'   => $this->load->post('cttn_unit'),
            'status_unit' => $this->load->post('status_unit')
        ];

        $simpan = $mobil->ubahMobil($data);

        if ($simpan) {
            echo "<script>
                alert('Data mobil berhasil diubah!');
                window.location.href = '" . BASEURL . "/?url=c_master/Mobil_C/index';
            </script>";
        } else {
            echo "<script>
                alert('Data mobil gagal diubah!');
                window.history.back();
            </script>";
        }
    }

    public function hapus($no_plat)
    {
        $mobil = $this->load->model('m_master/Mobil_M');
        $dt = $mobil->detailmobil($no_plat);

        $ft_depan = $dt['ft_depan'];
        $ft_blkg = $dt['ft_blkg'];
        $ft_interior = $dt['ft_interior'];

        $hapus = $mobil->HapusDtMobil($no_plat);

        if ($hapus) {
            $folder = dirname(__DIR__, 2) . '/img/';

            if (!empty($ft_depan) && file_exists($folder . $ft_depan)) {
                unlink($folder . $ft_depan);
            }
            if (!empty($ft_blkg) && file_exists($folder . $ft_blkg)) {
                unlink($folder . $ft_blkg);
            }
            if (!empty($ft_interior) && file_exists($folder . $ft_interior)) {
                unlink($folder . $ft_interior);
            }

            echo "<script>
                alert('Data mobil berhasil dihapus!');
                window.location.href = '" . BASEURL . "/?url=c_master/Mobil_C/index';
            </script>";
        } else {
            echo "<script>
                alert('Data mobil gagal dihapus!');
                window.history.back();
            </script>";
        }
    }

    public function keluar()
    {
        $this->session->unset_userdata('emailuser');
        $this->session->set_flashdata('pesan', 'Berhasil Logout');
        redirect('Login_C/index');
        exit;
    }
}