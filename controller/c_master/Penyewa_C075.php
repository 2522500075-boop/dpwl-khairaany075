<?php
class Penyewa_C075 extends Controller
{
    public function index()
    {
        $m = $this->load->model('m_master/Penyewa_M075');
        $dt['dtpenyewa'] = $m->datapenyewa075();
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/penyewaview075', $dt);
        $this->load->view('layout/footer');
    }

    public function create()
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_penyewaview075');
        $this->load->view('layout/footer');
    }

    public function simpan()
    {
        $m = $this->load->model('m_master/Penyewa_M075');
        $user = trim($_POST['username075'] ?? '');

        // FIX: Cegah data hantu masuk lagi
        if($user == '' || empty($_POST['nik075']) || empty($_POST['nama_lengkap075'])){
            echo "<script>alert('Username, NIK, Nama tidak boleh kosong!'); window.history.back();</script>";
            exit;
        }

        if ($m->cekuser075($user)) {
            echo "<script>alert('Username sudah terdaftar!'); window.history.back();</script>";
            exit;
        }

        $folder = dirname(__DIR__, 2) . '/img/';
        if(!is_dir($folder)) mkdir($folder, 0777, true);

        $ft_ktp = '';
        if(!empty($_FILES['ft_ktp075']['name'])){
            $ft_ktp = 'KTP_' . $user . '_' . time() . '.' . pathinfo($_FILES['ft_ktp075']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['ft_ktp075']['tmp_name'], $folder . $ft_ktp);
        }

        $ft_sim_a = '';
        if(!empty($_FILES['ft_sim_a075']['name'])){
            $ft_sim_a = 'SIM_A_' . $user . '_' . time() . '.' . pathinfo($_FILES['ft_sim_a075']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['ft_sim_a075']['tmp_name'], $folder . $ft_sim_a);
        }

        $data = [
            'user_plg075' => $_POST['username075'],
            'sandi075' => $_POST['password075'],
            'nik075' => $_POST['nik075'],
            'nm_lngkp075' => $_POST['nama_lengkap075'],
            'no_hp075' => $_POST['no_handphone075'],
            'almt_lngkp075' => $_POST['alamat_lengkap075'],
            'ft_ktp' => $ft_ktp,
            'ft_sim_a' => $ft_sim_a
        ];

        if ($m->simpan075($data)) {
            echo "<script>alert('Data penyewa berhasil disimpan!'); window.location.href='" . BASEURL . "/?url=c_master/Penyewa_C075/index';</script>";
        }
    }

    public function edit($user = '')
    {
        $user = urldecode($user);
        $m = $this->load->model('m_master/Penyewa_M075');
        $dt['p'] = $m->detail075($user);
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/edit_penyewaview075', $dt);
        $this->load->view('layout/footer');
    }

    public function ubah()
    {
        $m = $this->load->model('m_master/Penyewa_M075');
        $user_lama = $_POST['user_lama075'];
        $detail = $m->detail075($user_lama);
        $detail = array_change_key_case($detail, CASE_LOWER);
        $folder = dirname(__DIR__, 2) . '/img/';

        if (!empty($_FILES['ft_ktp075']['name'])) {
            @unlink($folder . ($detail['ft_ktp'] ?? ''));
            $ft_ktp = 'KTP_' . $_POST['username075'] . '_' . time() . '.' . pathinfo($_FILES['ft_ktp075']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['ft_ktp075']['tmp_name'], $folder . $ft_ktp);
        } else {
            $ft_ktp = $detail['ft_ktp'] ?? '';
        }

        if (!empty($_FILES['ft_sim_a075']['name'])) {
            @unlink($folder . ($detail['ft_sim_a'] ?? ''));
            $ft_sim_a = 'SIM_A_' . $_POST['username075'] . '_' . time() . '.' . pathinfo($_FILES['ft_sim_a075']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['ft_sim_a075']['tmp_name'], $folder . $ft_sim_a);
        } else {
            $ft_sim_a = $detail['ft_sim_a'] ?? '';
        }

        $data = [
            'user_plg075' => $_POST['username075'],
            'sandi075' => $_POST['password075'],
            'nik075' => $_POST['nik075'],
            'nm_lngkp075' => $_POST['nama_lengkap075'],
            'no_hp075' => $_POST['no_handphone075'],
            'almt_lngkp075' => $_POST['alamat_lengkap075'],
            'ft_ktp' => $ft_ktp,
            'ft_sim_a' => $ft_sim_a,
            'user_lama075' => $user_lama
        ];

        $m->ubah075($data);
        echo "<script>alert('Data berhasil diupdate!'); window.location.href='" . BASEURL . "/?url=c_master/Penyewa_C075/index';</script>";
    }

    // FIX UTAMA BIAR GAK FATAL ERROR LAGI
    public function hapus($user = '')
    {
        $m = $this->load->model('m_master/Penyewa_M075');

        // Jika URL kosong (data hantu yang atas), hapus semua data kosong langsung
        if(empty($user) || trim(urldecode($user)) == ''){
            // Hapus data hantu via model
            $m->hapusHantu075();
            echo "<script>alert('Data kosong (hantu) berhasil dihapus!'); window.location.href='" . BASEURL . "/?url=c_master/Penyewa_C075/index';</script>";
            exit;
        }

        $user = urldecode($user);
        $dt = $m->detail075($user);
        if($dt){
            $dt = array_change_key_case($dt, CASE_LOWER);
            @unlink(dirname(__DIR__, 2) . '/img/' . ($dt['ft_ktp'] ?? ''));
            @unlink(dirname(__DIR__, 2) . '/img/' . ($dt['ft_sim_a'] ?? ''));
        }
        $m->hapus075($user);
        echo "<script>alert('Dihapus!'); window.location.href='" . BASEURL . "/?url=c_master/Penyewa_C075/index';</script>";
    }
}
?>