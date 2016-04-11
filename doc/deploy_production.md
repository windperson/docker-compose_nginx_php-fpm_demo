0. Set private registry server information into a environment variable

    ``export registry_host=[docker_registry_ip_or_dnsname:port]``

    ``export deploy_rev=v1.0.0``

1. pull deploy script docker image:

  ``docker pull $registry_host/phpdemo/deploy-conf:$deploy_rev``

2. run following command to extract to a folder (here use **~/deploy** for example, it is recommend to create the folder first.)

  ``docker run --rm -v ~/deploy:/dest --env UID=`id -u ${USER}` --env GID=`id -G ${USER}|cut -d" " -f1` $registry_host/phpdemo/deploy-conf:$deploy_rev``
3. go inside the **~/deploy** folder and invoke following command to pull update images and start service:

  ``private_docker_registry=$registry_host/ release_tag=:$deploy_rev docker-compose -f docker-compose.deploy.yml up -d``
