# Caso de Uso 1: Autenticación de Usuario
- Actores: Usuario
- Descripción: Permite a un usuario autenticarse para operar con la API.
- Flujo Principal:
El usuario envía una solicitud de autenticación proporcionando su email y contraseña.
El sistema valida las credenciales del usuario.
Si las credenciales son válidas, el sistema genera un token de acceso con una expiración de 30 minutos y lo devuelve al usuario.

# Caso de Uso 2: Búsqueda de GIFs
- Actores: Usuario
- Descripción: Permite a un usuario buscar imagenes GIFs por una frase o término específico.
- Flujo Principal:
El usuario envía una solicitud de búsqueda de GIFs proporcionando una frase o término.
El sistema realiza una consulta a la API de GHIPY utilizando la frase proporcionada.
El sistema devuelve una colección de resultados de búsqueda al usuario.

# Caso de Uso 3: Obtener GIF por ID
- Actores: Usuario
- Descripción: Permite a un usuario obtener información detallada de un GIF específico mediante su ID.
- Flujo Principal:
El usuario envía una solicitud para obtener información de un GIF proporcionando su ID.
El sistema realiza una consulta a la API de GHIPY utilizando el ID proporcionado.
El sistema devuelve los datos del GIF consultado al usuario.
Fin del caso de uso.

# Caso de Uso 4: Guardar GIF Favorito
- Actores: Usuario
- Descripción: Permite a un usuario almacenar un GIF como favorito asociado a su usuario.
- Flujo Principal:
El usuario envía una solicitud para guardar un GIF como favorito, proporcionando el ID del GIF, un alias y su ID de usuario.
El sistema registra el GIF como favorito para el usuario en la base de datos.

## Notas adicionales:
Todos los servicios requieren autenticación OAuth2.0.
Se registra información de todas las interacciones con los servicios, incluyendo usuario, servicio consultado, cuerpo de la petición, código HTTP de la respuesta y IP de origen de la consulta.
Se aplicarán pruebas unitarias o características para garantizar la integridad y funcionalidad del sistema.
Estos casos de uso proporcionan una visión general de las interacciones principales que los usuarios pueden realizar con la API desarrollada en el contexto del Challenge PHP.
