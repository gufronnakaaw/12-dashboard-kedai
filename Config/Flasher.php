<?php 

class Flasher {
    // butuh 2 parameter
    // pesannya apa dan tipe pesannya apa
    public static function setFlash($msg, $type)
    {
        $_SESSION['flash'] = [
            'message' => $msg,
            'type' => $type
        ];
    }

    public static function flash()
    {
        if( isset($_SESSION['flash']) ){
            echo '<div class="alert alert-'. $_SESSION['flash']['type'] .' alert-dismissible fade show" role="alert">
                    <strong>'. $_SESSION['flash']['message'] .'</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            
            unset($_SESSION['flash']);
        }
    }
}