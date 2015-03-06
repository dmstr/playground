#!/bin/sh

set -e

# Setup build environment
pushd `dirname $0`/..
./yii app/version
source .env



tutum stack redeploy ${APP_ID}