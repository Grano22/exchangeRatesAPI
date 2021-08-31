# [Exchange Rates API]() &middot; ![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)

![](https://img.shields.io/badge/Wersja-1.0-blue)
![](https://img.shields.io/badge/Node.js-v14.17.5-success)
![](https://img.shields.io/badge/Laravel-v8.54-red)

## Informacje

* Architektura aplikacji Role Based App z podziałem na serwis operujący danymi z danych oraz front end z operatywnym backendem
* Aby uruchomić wystarczy bash ./manage/start.sh lub cd exchange-rate-api & ./vendor/bin/sail up
* Środowisko dostarczane jest jako docker compose z laravel sail

## Skrypty projektu

* ./manage/start.sh - Wystartuj projekt (LSAIL)
* ./manage/stop.sh - zatrymaj projekt (LSAIL)
* ./manage/rebuild.sh - przebuduj projekt (LSAIL)
* ./manage/deploy.sh - przygotuj projekt jako docker-compose jako publiczny
* ./manage/clearLogs.sh - Wyczyść logi (LSAIL)
