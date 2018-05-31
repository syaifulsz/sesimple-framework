#!/bin/bash

# VARIABLES
APP_NAME="SESIMPLE"
APP_CONTAINER="sesimple"

DB_NAME="SESIMPLEDB (not available for now)"
DB_CONTAINER="sesimpledb"

TXT_C_RED=1
TXT_C_GREEN=2
TXT_C_YELLOW=3
TXT_C_DBLUE=4
TXT_C_PURPLE=4
TXT_C_BLUE=4
TXT_C_WHITE=7
TXT_C_GREY=8
TXT_C_PINK=9
TXT_C_BGREEN=10

TXT_BOLD="bold"

_OCAK_INTRO="SESIMPLE DEVBOX"
_OCAK_OWN="MAINTAINER: Syaiful Shah Zinan <i.works@live.com>"

# FUNCTIONS
function DOCKER_DIR()
{
    PWD=`pwd`
    PST=`echo $PWD`
    CODE_DIR="$PST/"
    DOCKER_DIR="$PST/docker"
    cd $DOCKER_DIR
}

function _OCAK()
{
    COLOR_CMD="$(tput setaf $3)"
    if [[ $l = *"bold"* ]]; then
        COLOR_CMD="$(tput bold)"
    fi

    COLOR_CMD="$(tput setaf $3)"
    printf '| %s%*s%s |\n' "$COLOR_CMD" "-$2" "$1" "$(tput setaf 7)"
}

function OCAK()
{
    local s=("$@") b w
    for l in "${s[@]}"; do
        ((w<${#l})) && { b="$l"; w="${#l}"; }
    done
    tput setaf "$TXT_C_WHITE"
    echo " -${b//?/-}-"
    for l in "${s[@]}"; do
        _OCAK "$l" "$w" "$TXT_C_WHITE"
    done
    echo " -${b//?/-}-"
    tput sgr 0
}

function BR()
{
    echo -e "."
}

function SLEEP1()
{
    sleep 1
    echo -e "."
    sleep 1
}

function SLEEP2()
{
    sleep 1
    echo -e "."
    sleep 1
    echo -e "."
    sleep 1
}

function masokBengko()
{
    docker exec -it $APP_CONTAINER /bin/bash
}
