<?php

class User extends CI_Model
{
   function cari_user($username)
   {
      return $this->db->get_where('tb_user', ['username' => $username]);
   }
}
