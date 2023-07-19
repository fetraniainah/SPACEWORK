<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['custom_hook'] = array(
    'class' => 'User_session',
    'function' => 'remove_user_from_connected_list',
    'filename' => 'User_session.php',
    'filepath' => 'hooks',
);