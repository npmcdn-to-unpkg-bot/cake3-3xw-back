# CakePHP Application Skeleton

[![Build Status](https://api.travis-ci.org/cakephp/app.png)](https://travis-ci.org/cakephp/app)
[![License](https://poser.pugx.org/cakephp/app/license.svg)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](http://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## What's in the box ?
This skeleton comes prepacked with plugin we love such as:

- [ADmad/cakephp-i18n](https://github.com/ADmad/cakephp-i18n) routes with translations
- [Friendsofcake/crud](https://github.com/FriendsOfCake/crud) CRUD with JSON/REST but nice
- [FriendsOfCake/search](https://github.com/FriendsOfCake/search) serach tools
- [CakeDC/users](https://github.com/CakeDC/users) very good user login auth managment with CRUD
- [dereuromark/cakephp-queue](https://github.com/dereuromark/cakephp-queue) very cool queue managment
- [3xw-team/attachment](http://croquemonsieur.ninja/3xw-team/attachment) not public yet, remove it from composer.json :)

## Before installation
Remove `line 16` ( attachment package ) and the `repositories` object from `/composer.jon` file.
As attachment package is not public yet :)

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update
	
		composer self-update

2. Run

		php composer.phar create-project --prefer-dist awallef/cake3-3xw-back:2.x-dev [app_name]

3. If Composer is installed globally, run

		bash composer create-project --prefer-dist awallef/awallef/cake3-3xw-back:2.x-dev [app_name]

You should now be able to visit the path to where you installed the app and see
the setup traffic lights.

## Configuration
###Database

Edit `config/app.php`. Setup the `Datasources` and any other
configuration relevant for your application.

###Users
To add your first user run shell command:

	bin/cake users addSuperuser

###Attachments ( Private yet )
####Models
bind any of your models with attachments table as has many or HABTM relation.
####In controllers
Avoid querying Attachments in your add and edit methods.

####in add.ctp

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

####in edit.ctp

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
