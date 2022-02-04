# Laravel Api Rest Ecommerce

Stworzenie prostego API do tworzenia zamówień ecommerce.

Aplikacja musi implementować 3 modele danych:
1. User (użytkownik)
    - id
    - data utworzenia i aktualizacji
    - email
    - liczba zamówień
- Order (zamówienie)
    - id
    - data utworzenia i aktualizacji
    - id użytkownika (kupujący)
    - wartość w PLN
    - status zamówienia (otwarte/zamknięte)
- Product (produkt)
    - id
    - data utworzenia i aktualizacji
    - nazwa
    - cena w PLN

API musi posiadać następujące endpointy REST:
1. /admin/products - listowanie/pobieranie/tworzenia/aktualizacja produktów
2. /admin/users - listowanie/pobieranie/tworzenia/aktualizacja użytkowników
3. /admin/orders - listowanie/pobieranie/tworzenia/aktualizacja zamówień
4. /public/products - listowanie/pobieranie produktów
5. /public/orders - tworzenie zamówień

Opis działania:
na /admin możemy zarządzać produktami, użytkownikami oraz zamówieniami
na /public użytkownik może wylistować produkty oraz wysłać je do api oraz swój email, żeby utworzyć zamówienie, api wtedy musi utworzyć użytkownika, obliczyć cenę zamówienia oraz je stworzyć

Dodatkowe funkcje:
- zaproponowanie i zbudowanie procesu "opłacania" zamówień w przypadku przelewów tradycyjnych, jeśli potrzebne będa dodatlowe pola w modelu lub/i endpointy, należy również je dodać
- wykorzystanie observera, który będzie inkrementował liczbę zamówień w modelu User podczas tworzenia użytkownika
- wykorzystanie joba, który będzie zamykał zamówienia starsze niż 3 dni
- stworzenie fabryk i seederów, które dodadzą do bazy pierwszych 10 użytkowników
- dodatkowych zadaniem jest stworzenie tablicy logów, które będą przechowywać informacje o zmianach we wszystkich modelach, żeby dało się przejrzeć co kiedy było zmieniane
- wdrożenie podstawowego modułu autoryzacji

## Clone Repository

```
    $ git clone https://github.com/pdurka/Ecommerce.git
    $ cd ecommerce
```

## Install with Composer

```
    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install or composer install
```

## Set Environment

```
    $ cp .env.example .env
```

## Set the application key

```
   $ php artisan key:generate
```

## Database

Make a database created for this app and add its credentials to the .env file located in the root of the project.

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret
```

## Run migrations

```
   $ php artisan migrate
```

## Run seeds

```
   $ php artisan db:seed --class=DatabaseSeeder
```

## Run server

```
   $ php artisan serve
```

## Jobs

When we want to dispatch the jobs, we use the following command:
```
   $ php artisan queue: work
```



