#!/bin/sh

set -e

echo "\n\n[task] Building production Docker image\n"

# Setup build environment
pushd `dirname $0`/..
./yii app/version
source .env

# Build assets
sh build/assets.sh


echo "\n\n[operation] Start Docker build\n"
# Build production image
docker build -f Dockerfile-production -t ${APP_ID}:production .
echo "\nDocker image '${APP_ID}:production' built and tagged.\n"

# Start production image
docker-compose -f build/production.yml -p ${APP_ID} up -d

popd