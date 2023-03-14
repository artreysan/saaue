## Instalación de dependencias
1. Instalacion dependencias de composer
```
composer i
```
2. Instalación de dependencias de node.js
```
npm i
```
### Clonar environments
```bash
cp .env.example .env
```
3. Generamos una key en el .env
```bash
php artisan key:generate
```
4. Modificamos dos areas:
- Conexion a la base de datos:
```js
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=saauedb
DB_USERNAME=root
DB_PASSWORD=
```
- Configuracion con MailHog:
```js
MAIL_MAILER=smtp
MAIL_HOST=localhost
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=sict@gob.mx
MAIL_FROM_NAME="SICT"
```
## Correr base de datos 

1. Correr las migraciones desde la terminal
```bash
php artisan migrate
```
2. Cargar SQL en LA base de datos [saauedb.sql](./saauedb.sql)
3. Correr los seeders
```bash
php artisan db:seed
```
---
