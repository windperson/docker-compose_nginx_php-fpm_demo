0. Set private registry server information into a environment variable

    ``export private_registry=[docker_registry_ip_or_dnsname:port]/``

1. pull deploy script docker image:

    ``docker pull ${private_registry}phpdemo/deploy-conf``
2. run following command to extract to a folder(here use **~/deploy** for example, it is recommand to create it first.)

    ``docker run --rm -v ~/deploy:/dest --env UID=`id -u ${USER}` --env GID=`id -G ${USER}|cut -d" " -f1` ${private_registry}phpdemo/deploy-conf``
3. go inside the **~/deploy** folder and invoke following command to pull down images:

    ```docker-compose -f docker-compose.deploy.yml pull```
