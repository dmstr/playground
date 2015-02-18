# Phundament Developer Playground

*How To build up your custom Yii CMS application ... and much more.*

### Extensions

#### Install library packages

First install some additional libs

	composer require \
		dmstr/yii2-db:@stable \
		dmstr/yii2-bootstrap:@stable \
		zhuravljov/yii2-datetime-widgets:@stable

#### Install development packages		
		
Enable `dev-master` for extensions under your development

	composer require --dev \
		schmunk42/yii2-giiant:dev-master

### Modules		
		
Create a module

	...
	
Configure it

	...
	
Restart application

	docker-compose up web
	
And check if the migrations have been applied.

#### Create CRUD

Example Sakila module

	docker-compose run --rm web ./yii giiant-batch \
        --interactive=0 \
        --overwrite=1 \
        --enableI18N=1 \
        --messageCategory=app \
        --modelBaseClass=app\\modules\\sakila\\base\\SakilaActiveRecord \
        --modelNamespace=app\\modules\\sakila\\models \
        --crudControllerNamespace=app\\modules\\sakila\\controllers \
        --crudSearchModelNamespace=app\\modules\\sakila\\models\\search \
        --crudViewPath=@app/modules/sakila/views \
        --crudPathPrefix= \
        --crudProviders=schmunk42\\giiant\\crud\\providers\\DateTimeProvider \
        --tables=actor,address,category,city,country,customer,film,film_actor,film_category,film_text,inventory,language,payment,rental,staff,store
        
       

       
Production
----------

    docker tag playground:production tutum.co/schmunk/playground:producttion
    docker push tutum.co/schmunk/playground:producttion