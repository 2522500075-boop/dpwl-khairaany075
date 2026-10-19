<?php
class Mobil_M extends Model
{
    function datamobil()
    {
        $dtmobil = $this->db->prepare("SELECT no_plat, nm_mobil, nkursi, nbagasi, jns_mobil, transmisi, thn_buat, ft_depan, ft_blkg, ft_interior, hrg_hari, cttn_unit, status_unit FROM mobil");
        $dtmobil->execute();
        return $dtmobil->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function cekplat($no_plat)
    {
        $sql = $this->db->prepare("SELECT no_plat FROM mobil WHERE no_plat = ? ");
        $sql->bind_param("s", $no_plat);
        $sql->execute();
        $hasil = $sql->get_result();
        return $hasil->num_rows > 0;
    }

    public function simpan($data)
    {
        $sql = $this->db->prepare("INSERT INTO mobil (no_plat,nm_mobil,nkursi,nbagasi,jns_mobil,transmisi,thn_buat,ft_depan,ft_blkg,ft_interior,hrg_hari,cttn_unit,status_unit) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        // AKU UBAH JADI s SEMUA 13 BIJIK BIAR AMAN MESI!
        $sql->bind_param("sssssssssssss",$data['no_plat'],$data['nm_mobil'],$data['nkursi'],$data['nbagasi'],$data['jns_mobil'],$data['transmisi'],$data['thn_buat'],$data['ft_depan'],$data['ft_blkg'],$data['ft_interior'],$data['hrg_hari'],$data['cttn_unit'],$data['status_unit']);
        return $sql->execute();
    }
}