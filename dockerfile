FROM gcr.io/gae-runtimes/php74:php74_20210216_7_4_15_RC00

WORKDIR /srv/

ENV FUNCTIONS_SIGNATURE_TYPE=http

ENV FUNCTION_TARGET=appHttp

ENV GAE_RUNTIME php74