<?php
/**

 *
 * @return string[][]
 */
function getSeccionesLista(): array {
    return [
        'home' => [
            'title' => 'Bienvenidos al panel de administración de Saraza Basket',
            'requiresAuth' => true,
        ],
        'login' => [
            'title' => 'Ingresar al panel de administración de Saraza Basket',
        ],
        'noticias' => [
            'title' => 'Administración de Noticias',
            'requiresAuth' => true,
        ],
        'noticias-nueva' => [
            'title' => 'Crear una nueva noticia',
            'requiresAuth' => true,
        ],
        'noticias-editar' => [
            'title' => 'Editar noticia',
            'requiresAuth' => true,
        ],
        'noticias-leer' => [
            'title' => 'Detalles de una noticia',
            'requiresAuth' => true,
        ],
        '404' => [
            'title' => 'Página no encontrada',
        ],
    ];
}
