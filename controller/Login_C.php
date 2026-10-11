<?php
class Login_C extends Controller
{
  function index()
  {
    $this->load->view('login');
  }

  function CekLogin()
  {
    $email = $this->load->post('email');
    $password = $this->load->post('password');

    $model = $this->load->model('Login_M');
    $data = $model->ambildata($email);

    if ($data) {
      if ($password == $data['password']) {
        session_start();
        $_SESSION['username'] = $data['username'];
        $_SESSION['status'] = 'login';
        header('Location: ?url=Latihan1Controller/index');
        exit;
      } else {
        echo "<script>alert('Password Salah!'); window.location='?url=Login_C/index';</script>";
      }
    } else {
      echo "<script>alert('Email Tidak Ditemukan!'); window.location='?url=Login_C/index';</script>";
    }
  }
}