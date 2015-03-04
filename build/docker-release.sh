#!/bin/sh
VERSION=`git describe --tags``test -z "$(git status --porcelain)" || echo "-dirty"`
echo $VERSION > version

docker tag playground:production tutum.co/schmunk/playground:production
docker push tutum.co/schmunk/playground:production