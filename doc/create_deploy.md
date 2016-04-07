0. Set upload registry server information into a environment variable (be sure to add ending slash "/")

    ``export private_registry=[docker_registry_ip_or_dnsname:port]/``

### Create & Upload config files docker image

1. Create docker image that bundled config files as:

    ``docker build -t ${private_registry}phpdemo/deploy-conf -f Dockerfile.deploy-config .``

2. Push the image:

    ``docker push ${private_registry}phpdemo/deploy-conf``

### Create application container images
1. Make production deployable docker images:

    ``private_registry='' docker-compose -f docker-compose.prod.yml build --pull``

    And you can use ``private_registry='' docker-compose -f docker-compose.prod.yml up`` to verify that is runnable.

2. Run build again and with private registry server information:

   ``docker-compose -f docker-compose.prod.yml build --pull``

   Check those images exist by using ``docker images | grep ${private_registry} | awk {'print $1'}``

### Push image
Run following to push all image to private registry server at once:

``for i in `docker images | grep ${private_registry} | awk {'print $1'}`; do docker push $i ; done``
