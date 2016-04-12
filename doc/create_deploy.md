0. Set upload registry server information into a environment variable (be sure to add ending slash "/")

    ``export registry_host=[docker_registry_ip_or_dnsname:port]``

    ``export release_rev=v1.0.0``

    you can use your free style version string, like use ``v1.0.0``  or even formatted date time string like the ``$(date +"%Y%m%d-%H%M%S")`` generated.

### Create application container docker images
1. Make production deployable docker images:

    ``docker-compose -f docker-compose.build_prod.yml build --pull``

    And then you can use ``docker-compose -f docker-compose.deploy.yml up -d`` to verify those images are runnable, bring down it by ``docker-compose -f docker-compose.deploy.yml stop``.
2. Run build again to add push private registry server & docker image tag information:

   ``private_docker_registry=$registry_host/ release_tag=:$release_rev docker-compose -f docker-compose.build_prod.yml build``

   Check those images exist by using ``docker images | grep $registry_host``.

### Create deploy config files docker image

1. Create docker image as:

  ``docker build -t phpdemo/deploy-conf -f Dockerfile.deploy-config .``

2. tag docker image with upload server info & version tag as:

  ``docker tag phpdemo/deploy-conf $registry_host/phpdemo/deploy-conf:$release_rev``

### Upload (Push) docker images for deploy
Run following to push all image to private registry server at once:

``for i in $(docker images | awk -v image="^${registry_host}/phpdemo" -v ver="$release_rev" '$1 ~ image && $2 == ver {print $1}'); do set -x && docker push $i && set +x ; done``
