<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_session
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function remove_user_from_connected_list()
    {
        // Vérifiez si l'utilisateur est connecté (assurez-vous que la bibliothèque de session est chargée).
        if ($this->CI->session->userdata('user_id')) {
            // Supprimez l'entrée de la table connected_users pour l'utilisateur déconnecté.
            $user_id = $this->CI->session->userdata('matriculId');
            $this->CI->db->delete('connected_users', array('user_id' => $user_id));
        }
    }
}