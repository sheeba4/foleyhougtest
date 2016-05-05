#!/usr/bin/env bash

###########################
### IDIOT PROOF SETTINGS
###########################

if [ -z ${REPO} ]; then echo "REPO is set to default."; REPO="foleyhoag"; fi
if [ -z ${DEPLOY_ENV} ]; then echo "DEPLOY_ENV is set to default."; DEPLOY_ENV="staging"; fi
if [ -z ${STAGING_URL} ]; then echo "STAGING_URL is set to default."; STAGING_URL="https://ndevr.io"; fi
if [ -z ${PRODUCTION_URL} ]; then echo "PRODUCTION_URL is set to default."; PRODUCTION_URL="https://ndevr.io"; fi

function deploy_init_production {
    echo -e "\Add production remote"
    cd ~/wpengine-staging/
    git remote add production git@git.wpengine.com:production/$REPO.git
    loud "Production remote for $REPO set up!"
}

function deploy_init_staging {
    echo -e "\nCreating staging deploy directory"
    cd ~/
    git clone git@git.wpengine.com:staging/$REPO.git wpengine-staging
    cd ~/wpengine-staging/
    echo -e "\nSetting up git"

    git config user.email "codeship@ndevr.io"
    git config user.name "ndevr-codeship2"
    pwd
    loud "Staging directory for $REPO set up!"
}

function deploy {

    if [ "$DEPLOY_ENV" == "production" ]; then
        deploy_production
    fi
    if [ "$DEPLOY_ENV" == "staging" ]; then
        deploy_staging
    fi

}

function deploy_production {

    deploy_init_staging
    deploy_init_production

    SITE_URL = $PRODUCTION_URL
    curl -u "meekyhwang1:VKXS5VqUBPwVnudAMifE" -H "Content-Type: application/json" -H "Accept: application/json"  -d '{"browsers": [{"os": "Windows", "os_version": "7", "browser_version": "8.0", "browser": "ie"}], "url": "'"$SITE_URL"'"}' https://www.browserstack.com/screenshots

    cd ~/wpengine-staging
    git push -f production master
    loud "Deployment Complete ($DEPLOY_ENV/$REPO)!"

}

function deploy_staging {

    deploy_init_staging

    cd ~/clone

    echo -e "\nWP Engine Deployment ($DEPLOY_ENV)"
    rsync -rcz --delete-excluded ~/clone/ ~/wpengine-staging/wp-content/ \
    --exclude=".editorconfig" \
    --exclude=".gitignore" \
    --exclude=".DS_Store" \
    --exclude="*.sql" \
    --exclude="README.md" \
    --exclude="readme.txt" \
    --exclude="package.json" \
    --exclude="index.php" \
    --exclude="ndevr-deploy/"

    cp ~/ndevr-plugins/ndevr-deploy/wpengine-gitignore-no-wp.txt ~/wpengine-staging/.gitignore

    cd ~/wpengine-staging/
    git add --all
    git commit -m "Deployment for $REPO $DEPLOY_ENV"
    git push -f origin master
    loud "Deployment Complete ($DEPLOY_ENV/$REPO)!"

    SITE_URL = $STAGING_URL
    curl -u "meekyhwang1:VKXS5VqUBPwVnudAMifE" -H "Content-Type: application/json" -H "Accept: application/json"  -d '{"browsers": [{"os": "Windows", "os_version": "7", "browser_version": "8.0", "browser": "ie"}], "url": "'"$SITE_URL"'"}' https://www.browserstack.com/screenshots

}

#####################
### HELPER FUNCTIONS
#####################

function loud {
  echo -e "\n#### ${1}"
}

function quiet {
  echo -e "\t${1}"
}

#deploy
