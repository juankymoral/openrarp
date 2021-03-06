# openrarp
<img src="images/openrarp_logo_large.png" width="150px" alt="openrarp logo"/>

## Open Residential Area Resource Planning
A web application to manage the payment of fees in a neighborhood community. Reading of water meters, statistics of water consumption and billing. Historical of readings. Paddel reservations. Creation of remittances (SEPA direct debit files). CSV exports. Spanish language.

## Previous requirements
- Apache2 Web Server
- PostgreSQL Server
- PHP7 and PHP7 modules:
  - libapache2-mod-php7.0
  - php7.0-common
  - php7.0-pgsql
  - php7.0-json

## HowTo Install

### Configure PHP
Locate your apache php.ini and configure your PHP to obey 'short open tags' style (<?) 
```sh
short_open_tag = On
```
Include the path of your openrarp directory so that PHP can locate the libraries:
```sh
include_path = ".:/path_to_your_openrarp_directory:/usr/share/php"
```

### Create the openrarp database:

```sh
$ su postgres
$ createdb openrarp
$ psql -e -d openrarp < openrarp.sql
```

Copy the openrarp directory into the DOCUMENT_ROOT

Rename the file 'config-default.php' to 'config.php' and edit the file to suit your needs 
(depending on how you have configured postgres you will need to edit this file)

Open a browser and enter the following url: 
http://localhost/openrarp

Your initial credentials:
```
Email: admin@myopenrarp.com
Passwd: openrarp
```
## ToDo
- Add new neighbour
- Add new water meter
- Setup dialog
- Change user password
