<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
   function __construct()
   {
      parent::__construct();
      $this->load->model('user');
   }

   function signin()
   {
      $this->form_validation->set_rules('username', 'Username', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      if ($this->form_validation->run() == FALSE) {
         $data['judul'] = "Login - Instalin";
         $this->load->view('templates/header', $data);
         $this->load->view('login/index', $data);
         $this->load->view('templates/footer');
      } else {
         $username = htmlspecialchars($this->input->post('username'));
         $password = $this->input->post('password');

         $cari_user = $this->user->cari_user($username);

         if ($cari_user->num_rows() > 0) {
            $user = $cari_user->row();
            if (password_verify($password, $user->password)) {
               $data_user = [
                  'id_user'   => $user->id,
                  'nama'      => $user->nama,
                  'email'     => $user->email,
                  'username'  => $user->username
               ];
               $this->session->set_userdata($data_user);
               redirect('home');
            } else {
               $this->session->set_flashdata('message', "Password yang anda masukan salah.");
               redirect('auth/signin');
            }
         } else {
            $this->session->set_flashdata('message', "User tidak terdaftar.");
            redirect('auth/signin');
         }
      }
   }

   function signup()
   {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
   }

   function logout()
   {
      $this->session->sess_destroy();
      redirect('guest');
   }
}
