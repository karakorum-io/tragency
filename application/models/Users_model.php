<?php
   class Users_model extends CI_Model
   {
       public $table_name = "users";

      function get($whr)
      {
          $this->db->select('*');
         $this->db->from($this->table_name);
          $this->db->where($whr);
         $query = $this->db->get();
          return $query->result();
      }
      function save($data)
      {
         return $this->db->insert($this->table_name,$data);
      }
      
     
   
   }