Phundament playground
=====================

"Demoo" - the demo stack
------------------------

### Test-drive with docker compose

    mkdir demoo
    cd demoo
    curl -o docker-compose.yml https://raw.githubusercontent.com/phundament/playground/master/stacks/app-demoo/docker-compose.yml    
    docker-compose up -d
    docker-compose ps

### One-liner

    curl https://raw.githubusercontent.com/phundament/playground/master/stacks/app-demoo/docker-compose.yml | docker-compose -f - pull

Online Demo
-----------

*under construction*

### PaaS / cloud service

[Demo stack "Demoo"](stacks/app-demoo), include *Tutum* test drive.

-----

Built by [*dmstr](http://diemeisterei.de), Stuttgart :de: