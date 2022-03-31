#!/bin/sh

CWD=$(cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd)
CWD=${CWD%"/setup"}

APP_IMAGE_NAME=postalcode
APP_IMAGE_TAG=latest
ECR_REGION=sa-east-1
ECR_PATH=999999999999.dkr.ecr.${ECR_REGION}.amazonaws.com/microservices/${APP_IMAGE_NAME}
REGISTRY_IMAGE_NAME=${ECR_PATH}:${APP_IMAGE_TAG}

docker build -t $REGISTRY_IMAGE_NAME --build-arg aws_region_ecr=$ECR_REGION -f ${CWD}/setup/docker/production.Dockerfile .

with_push=$1
if [ "$with_push" == "--with-push" ]; then
  aws ecr get-login-password --region ${ECR_REGION} | docker login --username AWS --password-stdin ${ECR_PATH}
  docker push $REGISTRY_IMAGE_NAME
fi
