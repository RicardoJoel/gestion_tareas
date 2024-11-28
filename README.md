1. Tener en cuenta que el proyecto está sobre Laravel 11

2. Antes de ejecutar el proyecto, crear una base de datos MySQL con nombre gestion_tareas

3. Correr el siguiente comando para migrar las tablas y ejecutar los seeders: php artisan migrate:fresh --seed

4. Ejecutar la siguiente instrucción: php artisan serve 

5. Para acceder a la interfaz gráfica, ir a al siguiente dirección: http://localhost/gestion-tareas/public/tasks

6. Para utilizar el api, tenemos las sigueintes rutas

6.1. Listar (Método GET): http://localhost:8000/api/tasks

6.2. Consulta  (Método GET): http://localhost:8000/api/tasks/{Identificador*}

6.3. Registro  (Método POST): http://localhost:8000/api/tasks/

6.4. Actualización  (Método PUT): http://localhost:8000/api/tasks/{Identificador*}

6.5. Eliminación  (Método DELETED): http://localhost:8000/api/tasks/{Identificador*}

Notas: {Identificador*} es el identificador del registro, pudiendo ser un numero desde el 1

Ejemplo de cuerpo para las llamadas al registro y actualización:

{
	"dni": "12345678",
    "title": "Titulo de prueba",
    "description": "Descripción de prueba",
    "expired_at": "2024-12-24",
    "status_id": 1
}

Ejemplo de cuerpo para las salidas del registro y actualización:

{
    "message": "Tarea con código T2024005 registrada exitosamente.",
    "task": {
        "dni": "12345678",
        "title": "Titulo de prueba",
        "description": "Descripción de prueba",
        "expired_at": "2024-12-24",
        "status_id": 1,
        "code": "T2024005",
        "updated_at": "2024-11-28T18:56:05.000000Z",
        "created_at": "2024-11-28T18:56:05.000000Z",
        "id": 6
    }
}

Ejemplo de cuerpo para las salidas del listado y consulta

{
    "tasks": [
        {
            "id": 1,
            "code": "T2024001",
            "dni": "70689935",
            "title": "Esta es una prueba 2",
            "description": "vfoidsmvmsdfovkmsdfovkmdfscdsm cjsdcs",
            "expired_at": null,
            "status_id": 3,
            "created_at": "2024-11-28T16:44:03.000000Z",
            "updated_at": "2024-11-28T17:18:41.000000Z",
            "deleted_at": null
        },
        {
            "id": 2,
            "code": "T2024002",
            "dni": "45479610",
            "title": "Esta es otra tarea de prueba",
            "description": "cldskmclkdsclksmldcksmd",
            "expired_at": "2024-12-06",
            "status_id": 1,
            "created_at": "2024-11-28T16:58:58.000000Z",
            "updated_at": "2024-11-28T16:58:58.000000Z",
            "deleted_at": null
        },
        {
            "id": 4,
            "code": "T2024003",
            "dni": "12345678",
            "title": "Titulo de pruebacdskjcndskjncdsjncsdjcnsddcsjcnsdkjcndskjcndskjdskjdskjcnsd",
            "description": "Descripción de prueba",
            "expired_at": "2024-12-24",
            "status_id": 1,
            "created_at": "2024-11-28T18:33:59.000000Z",
            "updated_at": "2024-11-28T18:33:59.000000Z",
            "deleted_at": null
        },
        {
            "id": 5,
            "code": "T2024004",
            "dni": "12345678",
            "title": "Titulo de prueba",
            "description": "Descripción de prueba",
            "expired_at": "2024-12-24",
            "status_id": 1,
            "created_at": "2024-11-28T18:53:11.000000Z",
            "updated_at": "2024-11-28T18:53:11.000000Z",
            "deleted_at": null
        },
        {
            "id": 6,
            "code": "T2024005",
            "dni": "12345678",
            "title": "Titulo de prueba",
            "description": "Descripción de prueba",
            "expired_at": "2024-12-24",
            "status_id": 1,
            "created_at": "2024-11-28T18:56:05.000000Z",
            "updated_at": "2024-11-28T18:56:05.000000Z",
            "deleted_at": null
        }
    ]
}