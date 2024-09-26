
<?php

class Home extends Controller {

    
    public function index() 
    {
        $data['page_title'] = "Home";
        $this->view("HomePage", $data);
    }

    public function ContactUs() 
    {
        $data['page_title'] = "Contact Us";
        $this->view("Contact", $data);
    }

}
