Phundament Developer Playground
===============================

*A custom Yii CMS application demo with code-generated backend, build upon open-source extensions.*

Try a testdrive!
----------------

**[Online-Demo](http://playground.188.166.2.35.xip.io) or download [production container stack](https://github.com/phundament/playground/blob/master/build/production.yml).** 

Multiple Phundament 4 containers, MariaDB, Redis, HAProxy


Workflow
--------


### Install

Clone the application

    https://github.com/phundament/playground.git
    
Prepare `vendor` folder for development
    
    docker-compose run web composer install

Start application

	docker-compose up web


### Customize

> Optional steps

#### Views, Styles

    ...

#### Extensions

##### Install library packages

First install some additional libs

	docker-compose run web composer require \
		dmstr/yii2-db:@stable \
		dmstr/yii2-bootstrap:@stable \
		zhuravljov/yii2-datetime-widgets:@stable

##### Install development packages		
		
Enable `dev-master` for extensions under your development

	docker-compose run web composer require --dev \
		schmunk42/yii2-giiant:dev-master


### Develop

> Optional steps

#### Code Generation: Modules	
		
Create a module

	docker-compose run web ./yii gii/module \
        --moduleID=employees \
        --moduleClass=app\\modules\\employees\\Module
        
    mkdir modules/employees/models/search
	
Configure it

	...
	
Migration template
	
    docker-compose run web ./yii migrate/create --templateFile='@dmstr/db/mysql/templates/file-migration.php' import

    	    
    docker-compose run web ./yii migrate
	
	
And check if the migrations have been applied.

Open [playground.192.168.59.103.xip.io](http://playground.192.168.59.103.xip.io).   


#### Code Generation: CRUD

Update the *Dependency Injection* configuration `config/giiant.php`.

Generate backend files for example Sakila module

	sh build/crud.sh

Open [playground.192.168.59.103.xip.io/admin](http://playground.192.168.59.103.xip.io/admin).



### Test
       
Build your test stack       
       
    sh build/test-stack.sh
          
Afterwards, run the tests
          
    sh build/test.sh

       
### Build       

All tests green? Build production image, this will also build your production assets
    
    sh build/image.sh

To release this version, tag and push it to your registry

    sh build/release.sh    


### Deploy

        
[Create an initial production stack on tutum](https://dashboard.tutum.co/stack/launch/) by drag&drop uploading [the stack definition file](build/tutum.yml)
 or running this command

    sh build/production-stack.sh

If you need to update your stack, run

    sh build/deploy.sh



Troubleshooting
---------------

    docker-compose stop
    docker-compose rm


Links
-----

Also available on [Docker Hub](https://registry.hub.docker.com/u/schmunk42/phundament-playground/).
