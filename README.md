## INSTALL - Step by step 
php artisan sail:install
composer install
php artisan passport:install
php artisan migrate --seed
php artisan optimize
php artisan serve

# Create GIPHY_API_KEY
Para obtener una clave de API de GIPHY, sigue estos pasos:

- Visita la guía de inicio rápido de la API de GIPHY en GIPHY API Quick Start Guide.
- Haz clic en "Create an API Key" en el Developer Dashboard, lo cual te llevará a GIPHY Dashboard.
- Selecciona el tipo de API y haz clic en "Next Step" (para nuestro proyecto, es API)
- Completa los siguientes campos:
  a. Ingresa el nombre de tu aplicación. Ejemplo: 'Prex Challenge'.
  b. Selecciona la plataforma. Ejemplo: 'Web'.
- Haz clic en "Create API Key".

Una vez creada la API Key, copia su valor y colócalo en tu archivo .env:
GIPHY_API_KEY=TU_API_KEY


## OBSERVACIONES
La aplicación se ha estructurado usando los principios de SOLID.
Cada componente tiene su Request Validator, Response Transformer y Repository abstrayendo la lógica de validación, transformación y acceso a los datos

## Audience logs
Se creo un middleware LogRequests y se agreggo a middlewareGroups del kernel de la aplicacion, para persistir todos los request de la aplicacion.
Entidad modelo de logs : 
namespace App\Models\AudienceLog

Los json response y request se persisten encodeados en base64_encode y se desencodean cuando se solicitan ser leidos:
http://{BASE_URL}/api/audience-logs

## Auth
laravel-passport

## unit test
Se quito RefreshDatabase para que puedan hacer los test en la misma db sin la necesidad de reconstruir los datos
No se hicieron todos los casos de uso pero si la mayoria y mas importantes

## Base de datos
la contruccion de la base de datos fue hecha con migraciones

## Seeder
El seeder se encarga 2 crear 2 usuarios , un Personal Access Client y un Password Grant Client. Tambien se encarga de modificar las variables del archivo .env:
PASSPORT_PERSONAL_ACCESS_CLIENT_ID={data}
PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET={data}
importante ejecutar despues un *php arisan config:cache*

## Documentacion
Se utilizo scribe para construir la documentacion de la API
*php artisan scribe:generate*
http://{BASE_URL}/docs

## OTRA DOCUMENTACION
se deposito en la carpeta publica para que la accedan y la usen a su gusto

## der
/public/documentation/der.png

# Collection postman
/public/documentation/user.postman_collection : 
Si ejecutamos el metodo login , corre un script de postman que guarda en una variable de entorno el token para ser usado automaticamente en los demas endpoint

Tambien podriamos haber exportado la collection desde scribe, pero se opto por hacerlo como se solicito en el test

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## RUN IN DOCKER
Correr los mismos comandos de la instalacion pero usando el prefijo de sail 
./vendor/bin/sail



## NEW CONFIGURATION
docker-compose build
docker-compose up -d

