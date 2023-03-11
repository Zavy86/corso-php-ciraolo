#
# usage: make docker
#
docker:
	docker-compose -p corso-php-ciraolo down && \
	docker-compose -p corso-php-ciraolo rm -f && \
	docker-compose -p corso-php-ciraolo pull && \
	docker-compose -p corso-php-ciraolo build --no-cache && \
	docker-compose -p corso-php-ciraolo up -d --remove-orphans && \
	docker image prune -f --filter="dangling=true"
