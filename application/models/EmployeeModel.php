<?php
class EmployeeModel extends CI_Model {

    //insert data
    public function insertUser($data){
        return $this->db->insert('users',$data);
    }

    //get user for authantication by matriculID
    public function get_user($matriculeId) {
        return $this->db->get_where('users', array('matriculId' => $matriculeId))->row();
    }

    // Retrieve all users from the 'users' table where status is active
    public function get_all_users() {
        return $this->db->get_where('users', array('status' => 1))->result_array();
    }

    // Retrieve all users from the 'users' table where status is not active
    public function get_all_users_not_active() {
        return $this->db->get_where('users', array('status' => 0))->result_array();
    }


    //update user
    public function update_user($data,$id){
        return $this->db->update('users',$data, array('matriculId' => $id));
    }

    //update user
    public function confirm_delete($data,$id){
        return $this->db->update('users',$data, array('matriculId' => $id));
    }

    //confirm to restore userer
    public function confirm_restore($data,$id){
        return $this->db->update('users',$data, array('matriculId' => $id));
    }

    //get count active users
    public function get_count_active_user(){
        return $this->db->query('SELECT COUNT(*) as count FROM users WHERE status =true')->result_array();
    }

    //get count not active
    public function get_count_not_active_user(){
        return $this->db->query('SELECT COUNT(*) as count FROM users WHERE status =false')->result_array();
    }

    //get count admin
    public function get_count_admin(){
        return $this->db->query('SELECT COUNT(*) as count FROM users WHERE is_admin=true')->result_array();
    }

    //get users connected
    public function users_connected(){
        $query = $this->db->get('connected_users');
        $connected_users = $query->result();
        header('Content-Type: application/json');
        echo json_encode($connected_users);
    }


    public function remove_user_from_connected_list()
    {
       
        if ($this->session->userdata('matriculId')) {
            // Remove user from connected list.
            $user_id = $this->session->userdata('matriculId');
            $this->db->delete('connected_users', array('matriculId' => $user_id));
        }
    }

    //search user if in connected users list
    public function get_id_from_list($matriculId){
        return $this->db->get_where('connected_users', array('matriculId' => $matriculId))->row();
    }

    //set action 

    public function actions($id,$adminId,$action_name){
        return $this->db->insert('action_s',array('user_id'=>$id,'adminId'=>$adminId,'action_name'=>$action_name));
    }
}