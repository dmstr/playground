#!/bin/sh
set -e

# Setup build environment
pushd `dirname $0`/..
./yii app/version
source .env

tutum stack create -n ${APP_ID} -f build/tutum.yml

echo "\nTest stack up, run test suites with:"
echo "\n  sh build/test.sh\n"