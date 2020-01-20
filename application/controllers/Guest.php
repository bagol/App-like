<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends CI_Controller
{
   function __construct()
   {
      parent::__construct();
   }

   function index()
   {
      $data['judul'] = "Instalin";
      $this->load->view('templates/header', $data);
      $this->load->view('guest/index', $data);
      $this->load->view('templates/footer');
   }
}
