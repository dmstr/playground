#!/bin/sh
set -e

echo "\n\n[task] Initializing test stack\n"

# Setup build environment
pushd `dirname $0`/..
./yii app/version
source .env

docker-compose -f build/test.yml -p ${APP_ID} up -d testdb
docker-compose -f build/test.yml -p ${APP_ID} build testweb
docker-compose -f build/test.yml -p ${APP_ID} up -d testweb

docker exec ${APP_ID}_testweb_1 codecept build

echo "\nTest stack up, run test suites with:"
echo "\n  sh build/test.sh\n"