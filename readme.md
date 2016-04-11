**NOTE**:
docker & docker-compose need to be installed on both development machine & deploy site.

- To run in development mode, see [this](./doc/dev_time.md).
- To deploy via docker, first you need a docker registry server to push image, then
  1. Make a docker deployable image, see [those instructions](./doc/create_deploy.md) to make & push docker deploy images.
  2. On deploy site, run [those instructions](./doc/deploy_production.md) to deploy and start.
