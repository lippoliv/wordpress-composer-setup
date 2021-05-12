set SLEEPTIME=90

docker-compose build
docker-compose down
docker-compose up -d

ping -n %SLEEPTIME% 127.0.0.1 > nul

docker-compose up -d
