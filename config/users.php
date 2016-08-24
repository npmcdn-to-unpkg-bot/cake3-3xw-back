<?php
//debug('users');
return [
  'Users' => [
    //Table used to manage users
    'table' => 'Users',//'CakeDC/Users.Users',
    //configure Auth component
    'auth' => true,
    'Email' => [
      //determines if the user should include email
      'required' => true,
      //determines if registration workflow includes email validation
      'validate' => false,
    ],
    'Registration' => [
      //determines if the register is enabled
      'active' => false,
      //determines if the reCaptcha is enabled for registration
      'reCaptcha' => false,
      //ensure user is active (confirmed email) to reset his password
      'ensureActive' => false
    ],
    'Tos' => [
      //determines if the user should include tos accepted
      'required' => true,
    ],
    'Social' => [
      //enable social login
      'login' => false,
    ],
    'Profile' => [
        //Allow view other users profiles
        'viewOthers' => true,
        'route' => ['controller' => 'Users', 'action' => 'profile','prefix' => 'admin','plugin' => false],
    ],
    //Avatar placeholder
    'Avatar' => ['placeholder' => 'CakeDC/Users.avatar_placeholder.png'],
    'RememberMe' => [
      //configure Remember Me component
      'active' => true,
    ],
  ],
  //default configuration used to auto-load the Auth Component, override to change the way Auth works
  'Auth' => [
    /*'loginAction' => [
        'plugin' => false,
        'controller' => 'Users',
        'action' => 'login',
        'prefix' => 'admin'
    ],*/
    'loginRedirect' => [
      'plugin' => false,
      'controller' => 'Users',
      'action' => 'index',
      'prefix' => 'admin'
    ],
    'authenticate' => [
      'all' => [
        'finder' => 'active',
      ],
      'CakeDC/Users.RememberMe',
      'Form' => [
        'fields' => [
          'username' => 'email'
        ]
      ],
    ],
    'authorize' => [
      'CakeDC/Users.Superuser',
      'CakeDC/Users.SimpleRbac' => [
        'autoload_config' => 'permissions',
      ],
    ],
  ],
];
