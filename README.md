BundlesServicesAndTwig
========================

Bienvenidos al tutorial que se utilizó en el grupo @symfony_madrid para explicar
como crear un bundle, el uso de DI Container y creación de funciones TWIG para utilizar
desde los templates twig.

Este tutorial muestra, a través de los distintos tags, como fué la construcción real del
Bundle IdeupSimplePaginatorBundle (https://github.com/javiacei/IdeupSimplePaginatorBundle).

IdeupSimplePaginatorBundle consiste en un paginador de colecciones (Doctrine DQLs y arrays) muy
fácil de utilizar y configurar.

1) Descargar la aplicación
--------------------------------

Ejecutar los siguientes comandos:

    git clone git@github.com:javiacei/BundlesServicesAndTwig.git
    cd BundlesServicesAndTwig
    rm -rf .git .gitignore

2) Instalación
---------------
Ejecutar el siguiente comando:

    php bin/vendors install

Este comando instalará todas las dependencias (symfony2, twig, etc...)

3) Juguetea todo lo que quieras
-----------------------------------