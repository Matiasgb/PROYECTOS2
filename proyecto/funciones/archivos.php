<?php
/**
 * @param array $archivoSubido
 * @param string $ruta
 * @return bool|string
 */
function subirArchivo(array $archivoSubido, string $ruta = "") {
 
    $nombreArchivo = date('YmdHis') . $archivoSubido['name'];

  
    if(move_uploaded_file($archivoSubido['tmp_name'], $ruta . "/big-" . $nombreArchivo)) {
        return $nombreArchivo;
    } else {
        return false;
    }
}
