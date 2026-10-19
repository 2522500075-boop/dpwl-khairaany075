<?php
class Login_C extends Controller
{
  function index(){ 
    $this->view('login'); 
  }

  function CekLogin()
  {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $this->model('Login_M');
    $model = new Login_M();
    $data = $model->ambildata($email);
    
    // CEK SESUAI FOTO PHPMYADMIN KAMU
    // username = khairaany075@atmaluhur.ac.id
    // password = 12345 (plain)
    // status_akun = Aktif
    if ($data && $data['status_akun'] == 'Aktif' && $data['password'] == $password) {
        session_start();
        $_SESSION['email'] = $data['username'];
        $_SESSION['emailuser'] = $data['username'];
        
        header('Location: ' . BASEURL . '?url=Admin_C/index');
        exit;
    } else {
        echo "<script>alert('Gagal: Silahkan cek email, password, atau status akun Anda...'); window.location='".BASEURL."?url=Login_C/index';</script>";
        exit;
    }
  }

  function logout(){
    session_start();
    session_destroy();
    header('Location: ' . BASEURL . '?url=Login_C/index');
    exit;
  }
}