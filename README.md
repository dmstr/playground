### Test-drive with docker compose

    mkdir demoo
    cd demoo
    curl -o docker-compose.yml https://raw.githubusercontent.com/phundament/playground/master/stacks/app-demoo/docker-compose.yml    
    docker-compose up -d

### One-liner

    curl https://raw.githubusercontent.com/phundament/playground/master/stacks/app-tutum/docker-compose.yml | docker-compose -f - pull

### Online Demo

*under construction*

### PaaS / cloud service

[Demo stack "Demoo"](stacks/app-demoo/README.md), include *Tutum* test drive.
