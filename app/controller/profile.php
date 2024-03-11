<?php 
namespace profile;
use profile_model\model_profile;

class ProfileView {
    protected $pfr;
    public function __construct($db){
        $this->pfr = new model_profile($db);
    }
}

?>