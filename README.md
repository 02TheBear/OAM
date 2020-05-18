# Booking

[![Code style: black](https://img.shields.io/badge/code%20style-black-000000.svg)](https://github.com/psf/black)

A booking system for the yearly event **Allaktivitetsdag** at Tullinge gymnasium.

Demo site at [allaktivitetsdagen.tullingelabs.se](http://allaktivitetsdagen.tullingelabs.se/login)

## Requirements

- Docker & docker-compose
- Python 3
- Python libraries (look in `requirements.txt`, can be installed using `pip install -r requirements.txt`)

### Instructions (running locally)

1. `docker-compose up -d`
2. `python scripts/setup_db.py`
3. `python scripts/create_admin.py`
4. `python main.py`

### Instructions (deployment)

1. Set `DOCKER_HOST` and `MYSQL_PASSWORD`
2. `docker-compose -f docker-compose.yml -f prod.yml up -d`
3. `docker exec booking_app_1 python scripts/setup_db.py`
4. `docker exec -it booking_app_1 python scripts/create_admin.py`