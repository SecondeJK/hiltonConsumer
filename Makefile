#!make

.PHONY: start build clean

build:
	@composer install
	@docker volume create --name=hilton_db
	@echo 'Build successful'

start:
	@docker-compose up --abort-on-container-exit

clean:
	@-docker volume rm hilton_db