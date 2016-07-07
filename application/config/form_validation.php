<?php
//'password', 'password', 'required');
$config['login'] = array
(
                     array(
                          'field' => 'email',
                           'label' => 'Email',
                           'rules' => 'required|valid_email'
                           ),
                      array(
                          'field' => 'password',
                           'label' => 'Password',
                           'rules' => 'required|min_length[8]'
                           )
);

$config['register'] = array
(
                     array(
                          'field' => 'email',
                           'label' => 'Email',
                           'rules' => 'required|valid_email'
                           ),
                      array(
                          'field' => 'password',
                           'label' => 'Password',
                           'rules' => 'required|min_length[8]|matches[re_password]'
                           ),
                      array(
                        'field' => 'name' , 
                        'label' => 'Full Name',
                        'rules' => 'required|min_length[4]'
                        ),
                      array(
                        'field' => 'phone' , 
                        'label' => 'Phone Number',
                        'rules' => 'required|min_length[8]|numeric'
                        )
);

?>