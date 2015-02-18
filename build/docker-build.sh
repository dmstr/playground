VERSION=`git describe --tags``test -z "$(git status --porcelain)" || echo "-dirty"`
echo $VERSION > version

docker build -f Dockerfile-production -t playground:production .
docker build -f Dockerfile -t playground:development .