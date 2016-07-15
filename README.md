# Backoffice 3xW - CakePHP 3

[![Build Status](https://api.travis-ci.org/cakephp/app.png)](https://travis-ci.org/cakephp/app)
[![License](https://poser.pugx.org/cakephp/app/license.svg)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](http://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run 

```
php composer.phar create-project --prefer-dist awallef/cake3-3xw-back [app_name]
```

or if Composer is installed globally, run

```
composer create-project --prefer-dist awallef/cake3-3xw-back [app_name]
```

3. Modify the config/app.php with your database information
4. Go to your app dir and run

```
bin/cake setup
```

You should now be able to visit the path to where you installed the app and see
the setup traffic lights.


sources' and any other
configuration relevant for your application.

## Attachments
### In controllers
Avoid querying Attachments in your add and edit methods

### in add.ctp

  	echo $this->element('Attachments/add', array(
      	'settings' => array(
          	'relations' => 'belongsToMany', // or belongsTo
          	//'field' => 'attachment_id'  // if belongsTo
          	'maxsize' => 30, // 30MB
          	'types' => array(
              	'image/jpeg',
              	'image/png',
              	'application/pdf'
          	)
      	),
      	'attachments' => []
  	));

### in edit.ctp

  	echo $this->element('Attachments/add', array(
      	'settings' => array(
          	'relations' => 'belongsToMany', // or belongsTo
          	//'field' => 'attachment_id'  // if belongsTo
          	'maxsize' => 30, // 30MB
          	'types' => array(
              	'image/jpeg',
              	'image/png',
              	'application/pdf'
          	)
      	),
      	'attachments' => $corresondence['attachments']
  	));
