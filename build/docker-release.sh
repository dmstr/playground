#!/bin/sh
VERSION=`git describe --tags``test -z "$(git status --porcelain)" || echo "-dirty"`
echo $VERSION > version

docker tag playground:production tutum.co/schmunk/playground:production
docker tag playground:production schmunk42/phundament-playground:production

docker push tutum.co/schmunk/playground:production
docker push schmunk42/phundament-playground:production
