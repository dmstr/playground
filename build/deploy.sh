#!/bin/sh

set -e

# Setup build environment
pushd `dirname $0`/..
./yii app/version
source .env

echo "\n\n[operation] Redeploying tutum stack\n"

tutum stack redeploy ${APP_ID}