<?php

class Menu_model extends CI_Model
{
    private $_table = "user_menu";

    public $id;
    public $menu;

    public function rules()
    {
        return [
                [ 'field' => 'menu', 
                  'label' => 'Menu',
                  'rules' => 'required']
        ];
    }
    
    public function getAllMenu()
    {
        $this->db->from($this->_table);
        $this->db->order_by("menu", "asc");
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function saveMenu()
    {
      $post= $this->input->post();
      $this->menu = $post['menu'];
      return $this->db->insert($this->_table, $this);
    }

    public function update($id)
    {
        $view = $this->input->post();
        $this->id = $id; 
        $this->menu = $view['menu'];
        // var_dump($this);
    
        return $this->db->update($this->_table, $this, array('id'=>$id));

    }

    public function del($id)
    {
        return $this->db->delete($this->_table, array('id' => $id));
    }
}
