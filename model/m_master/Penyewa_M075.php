<?php
class Penyewa_M075 extends Model
{
    function datapenyewa075()
    {
        // FIX: Jangan tampilkan data hantu yang username kosong
        $dtpenyewa = $this->db->prepare("SELECT user_plg075, Sandi075, Nik075, nm_lngkp075, no_hp075, almt_lngkp075, ft_ktp, ft_sim_a FROM penyewa WHERE user_plg075 != '' AND user_plg075 IS NOT NULL AND TRIM(user_plg075) != ''");
        $dtpenyewa->execute();
        $result = $dtpenyewa->get_result()->fetch_all(MYSQLI_ASSOC);
        
        // FIX: Normalisasi key biar gak kosong di view
        $fix = [];
        foreach($result as $r){
            $fix[] = array_change_key_case($r, CASE_LOWER);
        }
        return $fix;
    }

    public function cekuser075($user_plg075)
    {
        $user_plg075 = urldecode($user_plg075);
        $sql = $this->db->prepare("SELECT user_plg075 FROM penyewa WHERE user_plg075 = ?");
        $sql->bind_param("s", $user_plg075);
        $sql->execute();
        return $sql->get_result()->num_rows > 0;
    }

    public function simpan075($data)
    {
        $data = array_change_key_case($data, CASE_LOWER);
        if(empty($data['sandi075'])){
            $data['sandi075'] = '123456';
        }
        $data['sandi075'] = password_hash($data['sandi075'], PASSWORD_DEFAULT);
        foreach(['ft_ktp','ft_sim_a'] as $k){
            if(!isset($data[$k]) || $data[$k] === null) $data[$k] = '';
        }
        $sql = $this->db->prepare("INSERT INTO penyewa (user_plg075, Sandi075, nik075, nm_lngkp075, no_hp075, almt_lngkp075, ft_ktp, ft_sim_a) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("ssssssss", 
            $data['user_plg075'], $data['sandi075'], $data['nik075'], $data['nm_lngkp075'], 
            $data['no_hp075'], $data['almt_lngkp075'], $data['ft_ktp'], $data['ft_sim_a']
        );
        return $sql->execute();
    }

    public function detail075($user_plg075)
    {
        $user_plg075 = urldecode($user_plg075);
        $sql = $this->db->prepare("SELECT user_plg075, Sandi075, Nik075, nm_lngkp075, no_hp075, almt_lngkp075, ft_ktp, ft_sim_a FROM penyewa WHERE user_plg075 = ?");
        $sql->bind_param("s", $user_plg075);
        $sql->execute();
        return $sql->get_result()->fetch_assoc();
    }

    public function ubahPenyewa075($data)
    {
        $data = array_change_key_case($data, CASE_LOWER);
        $user_lama = $data['user_plg075_lama'] ?? $data['user_lama075'] ?? $data['user_plg075'];
        
        if(!empty($data['sandi075'])){
            $data['sandi075'] = password_hash($data['sandi075'], PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("UPDATE penyewa SET user_plg075 = ?, Sandi075 = ?, Nik075 = ?, nm_lngkp075 = ?, no_hp075 = ?, almt_lngkp075 = ?, ft_ktp = ?, ft_sim_a = ? WHERE user_plg075 = ?");
            $stmt->bind_param("sssssssss",
                $data['user_plg075'], $data['sandi075'], $data['nik075'], $data['nm_lngkp075'], $data['no_hp075'], $data['almt_lngkp075'], $data['ft_ktp'], $data['ft_sim_a'], $user_lama
            );
        } else {
            $stmt = $this->db->prepare("UPDATE penyewa SET user_plg075 = ?, Nik075 = ?, nm_lngkp075 = ?, no_hp075 = ?, almt_lngkp075 = ?, ft_ktp = ?, ft_sim_a = ? WHERE user_plg075 = ?");
            $stmt->bind_param("ssssssss",
                $data['user_plg075'], $data['nik075'], $data['nm_lngkp075'], $data['no_hp075'], $data['almt_lngkp075'], $data['ft_ktp'], $data['ft_sim_a'], $user_lama
            );
        }
        return $stmt->execute();
    }

    public function ubah075($data)
    {
        $data['user_plg075_lama'] = $data['user_lama075'] ?? $data['user_plg075_lama'] ?? '';
        return $this->ubahPenyewa075($data);
    }

    public function hapus075($user_plg075)
    {
        $user_plg075 = urldecode($user_plg075);
        $dtpenyewa = $this->db->prepare("DELETE FROM penyewa WHERE user_plg075 = ?");
        $dtpenyewa->bind_param("s", $user_plg075);
        $hasil = $dtpenyewa->execute();
        $dtpenyewa->close();
        return $hasil;
    }

    // FIX KHUSUS UNTUK HAPUS DATA HANTU YANG ATAS
    public function hapusHantu075()
    {
        $stmt = $this->db->prepare("DELETE FROM penyewa WHERE user_plg075 = '' OR user_plg075 IS NULL OR TRIM(user_plg075) = '' OR nik075 = '' OR nm_lngkp075 = ''");
        $hasil = $stmt->execute();
        $stmt->close();
        return $hasil;
    }
}
?>