<?php  
defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
In CodeIgniter, hooks are events which can be called before and after the execution of a program. It allows executing a script with specific path in the CodeIgniter execution process without modifying the core files. For example, it can be used where you need to check whether a user is logged in or not before the execution of controller. Using hook will save your time in writing code multiple times.

events if hooks

pre_controller

post_controller

post_contructor

STEPS:

1. application/config/config.php
     
       $config['enable_hooks'] = TRUE;

2.Create your Contoller file in application/hooks folder and write your script in any function.

3. define your hooks in application/config/hooks.php  file.
    
     your can define pre_controller hooks ,post_controller hooks and post_constructor hooks


*/ 
class Example extends CI_Controller {  
public function index($data)  
    {  
        
        echo "This is Hooks";
    }  


 public function myfunction(){
 	echo"execute after controller";
 }   
}  