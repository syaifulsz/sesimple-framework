# Sesimple Framework

**Sesimple** or *Sesimple Yang Boleh* is a Malay language slang for doing something as simple as it can. Thus, the name actually explains the purpose of this framework.

## Development Requirements

- Docker for Mac/Window

## Server Requirements

- PHP 7.1
- Composer

## Installation

This project has a built-in docker container.

### Docker

Make sure that your local machine is not using port `8888`, else you can always modified port on line `7` in `docker/docker-compose.yml` file.

Run container:

```bash
bash deploy/run
```

Stop container:

```bash
bash deploy/halt
```

SSH to container:

```bash
bash deploy/ssh
```

On you local machine `hosts` file, include `127.0.0.1 sesimple.local`.

Now you can access the site on address http://sesimple.local:8888

### Initial Application Setup

SSH to container

```bash
bash deploy/ssh
```

Run composer for the first time to install dependencies

```bash
composer install
```

## Usage

Well, more docs coming soon, as soon as I got the time. Feel free to contribute.
