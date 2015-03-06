#!/bin/sh

echo "[task] Generating application CRUD in docker container..."

docker-compose run --rm web ./yii giiant-batch \
        --interactive=0 \
        --overwrite=1 \
        --enableI18N=1 \
        --messageCategory=app \
        --modelNamespace=app\\modules\\employees\\models \
        --crudControllerNamespace=app\\modules\\employees\\controllers \
        --crudSearchModelNamespace=app\\modules\\employees\\models\\search \
        --crudViewPath=@app/modules/employees/views \
        --crudPathPrefix= \
        --crudProviders=schmunk42\\giiant\\crud\\providers\\DateTimeProvider \
        --tables=employees,departments,dept_manager,dept_emp,titles,salaries


        ##