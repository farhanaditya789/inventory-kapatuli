<?php
    function login_check() {
        $ci = get_instance();
        
        if (!$ci->session->userdata('email')) {
            $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!!</div>');
            redirect('auth');
        } else {
            $role_id = $ci->session->userdata('role_id');
        }
    }
?>