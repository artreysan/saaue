## Instalación de dependencias
1. Instalacion dependencias de composer
```
composer i
```

2. Instalación de dependencias de node.js
```
npm i
```
## Clonar environments
```bash
cp .env.example .env
```

## Correr base de datos 

1. Correr las migraciones desde la terminal
```
php artisan migrate
```
2. Cargar SQL en LA base de datos [saauedb.sql](./saauedb.sql)
3. Correr los seeders
```
php artisan db:seed
```
---

# Documetacion
```bash
cd docs-saaue
npx docusaurus start
```
