<?php

class Submenu_model extends CI_Model
{
    private $_table = "user_submenu";

    public $id;
    public $menu_id;
    public $title;
    public $url;
    public $icon;
    public $is_active;

    public function rules()
    {
        return [
            ['field' => 'title',
             'label' => 'Title',
             'rules' => 'required'],
             
            ['field' => 'menu_id',
            'label' => 'Menu',
            'rules' => 'required'],

            ['field' => 'url',
             'label' => 'Url',
             'rules' => 'required'],

            ['field' => 'Icon',
             'label' => 'icon',
             'rules' => 'required']
        ];  
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function saveSubmenu()
    {
        $post = $this->input->post();
        $this->menu_id=$post['menu_id'];
        $this->title=$post['title'];
        $this->url=$post['url'];
        $this->icon=$post['icon'];
        if($post['is_active'] == Null){
            $this->is_active='0';
        }else{
            $this->is_active=$post['is_active'];
        }
        return $this->db->insert($this->_table, $this);
        
    }

    public function update($id)
    {
        // $times = $this->getById($id);
        // var_dump($waktu['created']);
        // $waktu = $this->timing;
        $post = $this->input->post();

        $this->id=$id;
        $this->title=$post['title'];
        $this->menu_id=$post['menu_id'];
        $this->url=$post['url'];
        $this->icon=$post['icon'];
        $this->is_active=$post['is_active'];
        return $this->db->update($this->_table, $this, array('id' => $id));
    }


    public function getBy($field, $value)
    {
        return $this->db->get_where($this->_table, array($field => $value))->result_array();
    }

    public function delete($id)
    {
      return $this->db->delete($this->_table, array('id' => $id));
         
    }
}   