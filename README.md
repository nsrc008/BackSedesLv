# API de Sedes - Proyecto Laravel

Este proyecto consiste en una API RESTful desarrollada en Laravel que permite la gestión de información sobre sedes. La API ofrece un endpoint para obtener una lista de sedes (locations), y la autenticación se realiza mediante una API Key para garantizar la seguridad.

## Características

-   Autenticación: Uso de API Key para proteger los endpoints.
-   Operaciones CRUD: Actualmente, el único endpoint implementado es para obtener una lista de sedes.
-   Datos simulados: Los datos de las sedes se cargan desde un archivo JSON o un array simulado en el controlador.
-   Calidad del código: Configuración opcional de herramientas de análisis estático como PHPStan, PHP CodeSniffer, y Laravel Pint.

## Requisitos Previos

Asegúrate de tener instalados los siguientes programas:

-   PHP >= 8.2
-   Composer
-   Laravel
-   Docker (opcional)

## Instalación

### 1. Clonar el repositorio

Clona este repositorio en tu máquina local:

```
[git clone https://github.com/nsrc008/FrontSedesLv.git](https://github.com/nsrc008/BackSedesLv.git)
cd BackSedesLv
```

### 2. Instalar dependencias

Instala las dependencias del proyecto con Composer:

```
composer install
```

### 3. Crear y configurar el archivo `.env`

Copia el archivo `.env.example` a `.env`:

```
cp .env.example .env
```

Luego, configura las variables de entorno necesarias, incluyendo la API Key que será utilizada para la autenticación.

### 4. Generar la clave de la aplicación

Genera la clave de la aplicación de Laravel:

```
php artisan key:generate
```

### 5. Ejecutar migraciones (opcional)

Si en el futuro decides almacenar las sedes en una base de datos, puedes ejecutar las migraciones:

```
php artisan migrate
```

### 6. Ejecutar la aplicación

Levanta el servidor de desarrollo de Laravel:

```
php artisan serve
```

La aplicación estará disponible en http://localhost:8000.

## Autenticación

Esta API utiliza una API Key para autenticar las solicitudes. La API Key debe ser proporcionada en el encabezado de cada solicitud como Authorization.

### Ejemplo:

```
Authorization: Bearer <tu-api-key>
```

## Uso de la API

### Obtener la lista de sedes

-   URL: /api/locations
-   Método HTTP: `GET`
-   Autenticación: API Key

Este endpoint devuelve una lista de sedes con la siguiente información:

-   `code`: Código único de la sede (ID).
-   `name`: Nombre de la sede.
-   `image`: URL simulada de una imagen de la sede.
-   `creationDate`: Fecha de creación de la sede.

### Ejemplo de respuesta:

```
[
  {
    "code": 1,
    "name": "Sede Central",
    "image": "https://example.com/image1.jpg",
    "creationDate": "2024-01-15"
  },
  {
    "code": 2,
    "name": "Sede Norte",
    "image": "https://example.com/image2.jpg",
    "creationDate": "2024-02-20"
  }
]
```

## Configuración de la API Key

Para la autenticación, se utiliza una API Key que puedes definir en el archivo `.env`:

```
API_KEY=your-api-key-here
```

## Middleware para la autenticación con API Key

En el proyecto, se incluye un middleware para validar la API Key antes de procesar las solicitudes. Si la API Key es incorrecta o no se proporciona, el sistema devuelve una respuesta de error 401 (Unauthorized).

## Consideraciones Técnicas

-   Rutas: Las rutas se encuentran en el archivo routes/api.php.
-   Controladores: El controlador principal es LocationController, que gestiona las solicitudes al endpoint /api/locations.
-   Errores: En caso de que la API Key no sea válida, se devuelve una respuesta JSON con el estado 401.

## Herramientas de Calidad de Código

Se incluyen las siguientes herramientas para garantizar la calidad del código:

-   PHP CodeSniffer y Laravel Pint: Para asegurarse de que el código cumple con los estándares.
-   PHPStan: Para análisis estático del código.

### Ejecución de las herramientas:

-   PHP CodeSniffer:

```
vendor/bin/phpcs
```

-   Laravel Pint:

```
vendor/bin/pint
```

-   PHPStan:

```
vendor/bin/phpstan analyse
```

## Despliegue en Producción

Para desplegar la API en un entorno de producción, sigue estos pasos:

1. Asegúrate de que la variable APP_ENV=production esté configurada en el archivo .env.
2. Configura correctamente los valores de API_KEY, ALLOWED_HOSTS, y APP_DEBUG=false.
3. Considera utilizar un servidor web como Nginx o Apache para manejar las solicitudes.

## Dependencias

El proyecto utiliza las siguientes dependencias, listadas en composer.json:

```
{
  "require": {
    "php": "^8.2",
    "laravel/framework": "^11.9",
    "laravel/sanctum": "^4.0",
    "laravel/tinker": "^2.9"
  }
}
```

Las dependencias de desarrollo se manejan a través de composer.json y package.json:

```
{
  "devDependencies": {
    "vite": "^5.0",
    "tailwindcss": "^3.4.13",
    "laravel-vite-plugin": "^1.0"
  }
}
```

## Docker Compose

## Estructura del Proyecto

A continuación, se muestra la estructura de directorios del proyecto:

```
/proyecto
│
├── FrontSedesLv/            # Repositorio del frontend
│   ├── Dockerfile
│   └── ... (otros archivos del frontend)
│
├── BackSedesDj/             # Repositorio del backend
│   ├── Dockerfile
│   └── ... (otros archivos del backend)
│
└── docker-compose.yml          # Archivo para orquestar los servicios
```

## Instrucciones de Uso

1. Clonar los Repositorios: Clona ambos repositorios (frontend y backend) en el mismo directorio donde se encuentra el archivo `docker-compose.yml`.
2. Construir y Ejecutar los Servicios:
    - Abre una terminal y navega hasta el directorio que contiene `docker-compose.yml`.
    - Ejecuta el siguiente comando para construir y levantar los contenedores:
        ```
         docker-compose up --build
        ```
3. Acceso a la Aplicación:
    - El frontend estará disponible en `http://localhost:3000 `
    - El backend estará disponible en `http://localhost:8000`

## Descripción del Archivo docker-compose.yml

```
version: '3.8'

services:
  frontend:
    build:
      context: ./FrontProjectRc
    ports:
      - "3000:3000"
    networks:
      - app-network
    depends_on:
      - backend

  backend:
    build:
      context: ./BackProjectLv
    ports:
      - "8000:80"
    networks:
      - app-network
    volumes:
      - backend_data:/var/www/html
    environment:
      - APP_ENV=local
      - APP_DEBUG=true
      - APP_KEY=base64:YpsxTw/mKmMOXTRpPpY3u/LceoxJWauq2gYGMkopUQo=
      - API_KEY=f3f24338ac0ede6a37e47d6012b4c389

networks:
  app-network:
    driver: bridge

volumes:
  backend_data:
```

Este archivo orquesta tanto el frontend como el backend, asegurando que ambos servicios estén disponibles y funcionando correctamente.
