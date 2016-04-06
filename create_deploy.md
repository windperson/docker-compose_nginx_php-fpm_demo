0. Set upload registry server information into a environment variable

    ``export private_registry=[docker_registry_ip_or_dnsname:port]/``

### Create & Upload config files docker image

1. Create docker image that bundled config files as:

    ``docker build -t phpdemo/deploy-conf -f Dockerfile.deploy-config .``

2. After verify that image is good on local machine, Tag the image with docker registry server information:

    ``docker tag phpdemo/deploy-conf ${private_registry}phpdemo/deploy-conf``

3. Push the image:

    ``docker push ${private_registry}phpdemo/deploy-conf``

### Create application container images
1. Make dev time docker images:

    ``docker-compose build``
2. Make production deployable docker images:

    ``docker-compose -f docker-compose.prod.yml build``

    And you can use ``docker-compose -f docker-compose.prod.yml up`` to verify that is runnable.
