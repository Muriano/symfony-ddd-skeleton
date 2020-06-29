# DDD Skeleton

DDD Skeleton is a ready-to-use template to boost up your projects using Symfony Framewok 5.x configured for develop your code in a clean architecture way, such as DDD or "Ports and Adapters" (aka Hexagonal)

# Installation

## Using Composer

For use the latest stable version use:
```
$ composer create-project muriano/ddd-skeleton my/awesome/project
```

For use a concrete version of DDD Skeleton template, use
```
$ composer create-project muriano/ddd-skeleton my/awesome/project {versionTag}
``` 

## Using GIT

```
$ git clone git@github.com:Muriano/symfony-ddd-skeleton.git my/awesome/project
```
Then, will be required to install dependencies. Do it by executing in your terminal:
```shell script
$ cd my/awesome/project
$ composer install
```

# What do you get with this template?

First, you get a fully functional base project to start whatever you want to develop. In order to make things go ahead, 
you will get:
* Symfony Framework 5.x configured to work in a way more compatible with DDD.
* The powerful symfony console, ready to use with your own command.
* docker-compose.yml with:
  * A nginx server configure to load symfony public index
  * A php 7.4 service with most common php extensions enabled, besides xdebug extension 100% working.
  * A MySQL 8.0 server, so you can develop your entire app in your localhost.
  * A Makefile with some shorcuts that will make your day.  
  
# How to use

Well, I am not intended to tell you how to use this, but let me give you a few tips if you want to use it in the right way.

## Where to put things.

There are 2 popular approaches when talking about DDD, grouping by modules, or grouping by layer. Whatever approach you want to use (both are, probably, enough good for you) you should use the `src` folder to put them in.
Personally, I prefer the "Group by Module" approach, and, whithin each module directory, give code a layer oriented sorting.
Example:
```text
- src/
  - User
    + Application
    + Domain
    + Infrastructure
```
And you should put in `apps/web` folder things that belongs to framework. That could be classes like:
* Controllers
* Commands
* Forms and Form Types
* Authenticators
* Twig templates

## Using the Symfony Console to make things.

We have already installed and configured the maker bundle for you, so you are able to execute the `make:xxx` to generate useful classes in the framework layer.
Example:
```shell script
$ php bin/console make:controller
```

## Using the Symfony binary.

Of course you can use the symfony binary if you have it installed in your machine.
Example:
```shell script
$ symfony serve
```
And it will start the development server for symfony. Unfortunatelly it is not supported by the docker containers provided (yet), so you will not be able to access the local database using it in this way, but if you do not need it, it is a quick way to start playing you app.

# What comes in the future

This is the very earlier version of this project. I've planned a bunch of features that I will like to add if time allow me to do it. Thinks I have in mind are:
* A complete, fully functional, and well documented example module, so you can see and learn where to place things and how you can configure them in Symfony, if required. I mean, if you need some user module and make it able to symfony for authentication purpose.
* Some more services in docker-compose.yml, such as cache services, or some AMQP service will be great and useful for any serious project.
* Make console and symfony binary accesible within containers, so you do not have to handle system dependencies nor PHP versions.
* Make composer available via docker (within php container or in standalone way) so you do not have to take care about having it in your development machine.

OK, that is the begin, but not all the stuff I have planned to put at your service.

# Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

# License
[MIT](https://choosealicense.com/licenses/mit/)