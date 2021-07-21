# **PHP WebService**

Esta aplicación se realizó con la finalidad de crear una Web Service PHP y consumir los datos mediante Ajax.

## **Nota:**

Para visualizar la Web Service debe tener instalado en su ordenador [**PHP**](https://www.php.net/manual/es/intro-whatis.php), [**Composer**](https://getcomposer.org/) y [**Git**](https://git-scm.com/download/win), una ves instalado **PHP**, **Composer** y **Git** puede continuar los siguentes pasos:

## **Instalación**

### **Paso 1**

**Forma 1:** Dar clic en **Code**, luego **Download Zip** y descomprimir el archivo en tu ordenador.

**Forma 2:** Abrir una terminal en tu ordenador y ejecutar el siguiente comando:

    git clone https://github.com/HenryGP14/PHPWebServer.git

### **Paso 2**

Configurar PHP para conectar la base de datos a la aplicación, cave de mencionar que la aplicación se realizó utilizando el motor de base de datos [**PostgreSQL**](https://www.postgresql.org/).

1. Ubicarse en la carpeta que tiene instalado **PHP**.
2. Buscar el archivo **php.ini**
3. Buscar la extención del motor de base de datos.

    - Para **PostgreSQL** la extención es <font color=red>extension=pdo_pgsql</font> y <font color=red>extension=pgsql</font>
    - Para **MySQL** la extención es <font color=red>extension=pdo_mysql</font>

4. Para activar las extenciones debe eliminar <font color=red>**;**</font> que significa que la extensión esta comentada una vez eliminado podrá utilizar PHP para el motor de base de datos acinado.

### Paso 3

Crear la base de datos en **PostgreSQL** con las siguientes tablas:

**Provincia**

| idprovincia | nombre   | superficie | hombres | mujeres | capital  | poblacion |
| ----------- | -------- | ---------- | ------- | ------- | -------- | --------- |
| 13          | Los Ríos | 7205,27    | 380016  | 398099  | Babahoyo | 778115    |
| ....        | ....     | ........   | ....    | ....    | ....     | ....      |

**Cantones**

| idprovincia | nombre  | poblacion_total |
| ----------- | ------- | --------------- |
| 13          | Quevedo | 150827          |
| ....        | ....    | ........        |

**Nota:** Los datos de las tablas se encuentra en un archivo **cvs** en la carpeta **PHPWebServer/dataset**

### **Paso 4**

Configurar el archivo de configuaraciones **.env**, este archivo contendra las configuraciones de la aplicación.

-   **Primero:** Cambiar el nombre del archivo "**.env.example**"a "**.env**"
-   **Segundo:** Configurar el acceso del motor de base de datos.

### **Paso 5**

Ejecutar el siguiente comando dentro de la ruta raíz, es decir, **./PHPWebServer**:

**Nota:** Para realizar este paso debes tener instalado [**Composer**](https://getcomposer.org/) en tu ordenador.

    composer require vlucas/phpdotenv

Para saber más información sobre **phpdotenv** visita el repositorio dando [**click aquí**](https://github.com/vlucas/phpdotenv).

### **Paso 6**

Configurar el archivo **utils.php** que se encuentra dentro de la carpeta **settings**, expecificando a que motor de base de datos se debe conectar, por defecto se conectará al motor de base de datos de **PostgreSQL**, si necesitas añadir otro motro de base de datos debes cambiar dentro del array <font color=red>pgsql</font> por:

1. En caso de **MySQL** cambiar a <font color=red>mysql</font>.
2. En caso **OBDC** cambiar a <font color=red>obdc</font>.

### **Paso 7**

Ejecutar el proyecto de **PHP**:

-   **Forma 1**: Puedes utilizar programas de terceros para ejecutar el proyecto de **PHP** asi como: [**MAMP**](https://www.mamp.info/en/windows/) o [**XAMPP**](https://www.apachefriends.org/es/index.html).
-   **Forma 2**: Puedes ejecutar el servidor median **PHP** ejecutando el siguiente comando en consola:

          php -S localhost:8000

## **Extra**

Si deseas ver los datos que trae de la base de datos a la **WebService** debes tener ejecutado el servidor e ir a la siguiente dirección en tu navegador.

1.  Ver los datos de las provincias.

        http://localhost:8000/WebService/

2.  Ver los datos de una provincia especifica.

    -   **Por id:**

              http://localhost:8000/WebService?provincia-id={Id_provincia}

    -   **Por nombre:**

             http://localhost:8000/WebService?provincia={Nombre_provincia}

3.  Ver los cantones por la provincia.

    -   **Por id:**

              http://localhost:8000/WebService?id-provincia={Id_provincia}

    -   **Por nombre:**

             http://localhost:8000/WebService?nom-provincia={Nombre_provincia}
