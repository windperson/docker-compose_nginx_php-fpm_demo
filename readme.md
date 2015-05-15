A demonstration of Docker official [Nginx image](http://registry.hub.docker.com/_/nginx/) + [PHP-FPM image](https://registry.hub.docker.com/_/php/),

Usage instruction:

1. Install [Docker-compose](https://docs.docker.com/compose/).

2. Check out **master** branch.

3. Use command to start up Nginx & PHP-FPM docker containers:
	````Bash
	docker-compose up -d;docker-compose logs
	````
4. Navigate to *http://localhost* to see demo page.
