#!/bin/bash


TAG=`docker ps | grep sail | cut -d " " -f 1`

docker exec -ti $TAG npm run dev
