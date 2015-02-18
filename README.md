Phundament Playground
=====================

Quick-Start
-----------

    git clone https://github.com/phundament/playground.git

    
You can install _Phundament 4_ using [composer](https://getcomposer.org/download/)...

    composer global require "fxp/composer-asset-plugin:1.0.0-beta4"
    composer create-project --stability=dev phundament/app

Create and adjust your environment configuration, eg. add a database...

    cp .env-dist .env
    edit .env
    
Run the application setup...
    
    ./yii app/setup
    
Open `http://path-to-app/web` or `http://path-to-app/web?r=admin` in your browser.

> Note: Alternative installation methods with [Docker](https://github.com/phundament/app/blob/master/docs/51-docker.md), [fig (docker-compose)](https://github.com/phundament/app/blob/master/docs/51-fig.md), [Vagrant & Docker](https://github.com/phundament/app/blob/master/docs/51-vagrant-docker.md) or [PaaS](https://github.com/phundament/app/blob/master/docs/52-paas.md) are availble in the documentation.

Resources
---------

- [Documentation](docs/README.md)
- [Project Source-Code](https://github.com/phundament/app)
- [Website](http://phundament.com)
