<?php
class Admin_C extends Controller
{
  public function index()
  {
    $email = $this->session->userdata('emailuser');
    $info['nm_user'] = explode('@', $email)[0];
    $info['info_psn'] = $this->session->set_flashdata('pesan');
    $this->load->view('layout/header', $info);
    $this->load->view('layout/sidebar', $info);
    $this->load->view('layout/starter');
    $this->load->view('layout/footer');
  }
}