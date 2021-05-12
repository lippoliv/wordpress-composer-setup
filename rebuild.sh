SLEEPTIME=90s

docker-compose build
docker-compose down
docker-compose up -d

sleep "$SLEEPTIME"

docker-compose up -d
