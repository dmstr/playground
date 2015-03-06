#!/bin/sh

echo "[task] Generating application CRUD in docker container..."

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