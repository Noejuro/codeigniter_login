<?php
    class UploadUsers extends CI_Model{
        function _construct(){
            $this->load->database();
        }

        public function create($data){
            if(!$this->db->insert('test', $data))
                return false;
            return true;

        }
    }
?>