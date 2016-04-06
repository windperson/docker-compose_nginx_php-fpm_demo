1. pull deploy script docker image:

    ``docker pull [docker_repository_name:port]/phpdemo/deploy-conf``
2. run following command to extract to a folder(here use **~/deploy** for example)

    ``docker run --rm -v ~/deploy:/dest --env UID=`id -u ${USER}` --env GID=`id -G ${USER}|cut -d" " -f1` [docker_repository_name:port]/phpdemo/deploy-conf``
3. go inside the **~/deploy** folder and invoke following command to pull down images:

    ```docker-compose -f docker-compose.deploy.yml pull```
