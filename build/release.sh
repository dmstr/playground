#!/bin/sh

set -e

echo "\n\n[task] Starting release process\n"

# Setup build environment
pushd `dirname $0`/..
./yii app/version
source .env

sh build/test.sh

sh build/image.sh

echo "\n\n[operation] Tagging and pushing images\n"
# Tag images for tutum and Docker Hub
docker tag -f playground:production tutum.co/schmunk/phundament-${APP_ID}:production
docker tag -f playground:production schmunk42/phundament-${APP_ID}:production

# Push images to registries
#docker push tutum.co/schmunk/phundament-${APP_ID}:production
docker push schmunk42/phundament-${APP_ID}:production
