<?php
class Login_M extends Model
{
  function ambildata($email)
  {
    $dtadmin = $this->db->prepare("SELECT username, password, status_akun FROM admin WHERE username=? AND status_akun='Aktif'");
    $dtadmin->bind_param("s", $email);
    $dtadmin->execute();
    return $dtadmin->get_result()->fetch_assoc();
  }
}