# kinandcarta

## Full-Stack Coding Challenge

###### Instalación
1. Descargar de GIT el proyecto
2. Crear una BD MySQL **kinandcarta**
3. En la consola de comando, ir al directorio del proyecto y ejecutar: **php artisan migrate**
4. Luego ejecutar: **php artisan db:seed**
5. Para finalizar, ejecutar: **php artisan serve**

###### API
- URL: http://127.0.0.1:8000/api/all<br>
Método: GET<br>
Descripción: Obtiene un array de todos los Contactos.<br><br>

- URL: http://127.0.0.1:8000/api/view/{id}<br>
Parámetros: id = [integer]<br>
Método: GET<br>
Descripción: Obtiene el objeto de un Contacto dado su número de ID.<br><br>

- URL: http://127.0.0.1:8000/api/search/{value}<br><br>
Parámetros: value = [string]<br>
Método: GET<br>
Descripción: Busca un Contacto por Nombre, Comapañía, Email o Teléfono.<br><br>

- URL: http://127.0.0.1:8000/api/getcities<br>
Método: GET<br>
Descripción: Obtiene todas las 'cities' almacenadas de la tabla 'contacts'.<br><br>

- URL: http://127.0.0.1:8000/api/getstates<br>
Método: GET<br>
Descripción: Obtiene todas las 'states' almacenadas de la tabla 'contacts'.<br><br>

- URL: http://127.0.0.1:8000/api/getcontacts/{value}<br>
Parámetros: value = [string]<br>
Método: GET<br>
Descripción: Busca todos los contactos que tengan asociados la 'City' o 'State' ingresada.<br><br>

- URL: http://127.0.0.1:8000/api/post<br>
Parámetros: [json]<br>
Método: POST<br>
Descripción: Agrega un nuevo Contacto a la tabla 'contacts'.<br>
Ejemplo: {"name":"Javier Verón", "company":"Kin And Carta", "email":"javier.veron@gmail.com", "birthdate":"1981-05-21", "phonenumber_personal":"1156458413", "address":"Ricchieri 1272", "city":"Bella Vista", "state":"Buenos Aires", "country":"Argentina"}<br><br>

- URL: http://127.0.0.1:8000/api/update/{id}<br>
Parámetros: id = [integer] / [json]<br>
Método: PUT<br>
Descripción: Actualiza un Contacto de la tabla 'contacts' dado su número de ID.<br>
Ejemplo: {"name":"Javier Berone"}<br><br>

- URL: http://127.0.0.1:8000/api/delete/{id}<br>
Parámetros: id = [integer]<br>
Método: DELETE<br>
Descripción: Elimina un Contacto de la tabla 'contacts' dado su número de ID.<br><br>

###### Unit Testing
**.\vendor\bin\phpunit --filter ContactTest**