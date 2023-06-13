<?php

namespace App\Controllers;
use App\Models\userModel;

class Home extends BaseController
{   
    public $modelHome;
    public $form;
   // public function __construct(){   helper form
      //  helper('form'); 
   /// }

   // public function __construct(){  // para leer el modelo recien creado 
       
   // }
    public function index()
    {   
      
      $estructura=view('welcome_message');
        
      
      return $estructura;
    }

    

 
}