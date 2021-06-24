<?php

/**
 * Class ValidadorNoticia
 *
 * Validaciones a chequear:
 * - titulo
 *      obligatorio, mínimo 3 caracteres, máximo 120 caracteres
 * - sinopsis
 *      obligatorio, mínimo 3 caracteres, máximo 250 caracteres
 * - texto
 *      obligatorio, mínimo 3 caracteres
 */
class ValidadorNoticia
{
    /** @var array La data a validar. */
    protected $data = [];

    /** @var array Los errores de validación que hayan ocurrido. Es un array asociativo cuyas claves son las de los datos validados. */
    protected $errores = [];

    /**
     * ValidadorNoticia constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        // Ejecute la validación.
        $this->validar();
    }

    /**
     * Retorna true si ocurrió algún error de validación.
     * Retorna false de lo contrario.
     *
     * @return bool
     */
    public function falla(): bool
    {
        return count($this->errores) > 0;
    }

    /**
     * @return array
     */
    public function getErrores(): array
    {
        return $this->errores;
    }

    /**
     * Ejecuta todas lsa validaciones.
     */
    protected function validar()
    {
        // Ejecuto una por una las validaciones de cada campo.
        $this->validarSeccionId();
        $this->validarTitulo();
        $this->validarSinopsis();
        $this->validarTexto();
    }

    /**
     * Valida que el id de sección cumpla con:
     * obligatorio
     */
    protected function validarSeccionId()
    {
        if(empty($this->data['seccion_id'])) {
            $this->errores['seccion_id'] = 'Tenés que elegir la sección.';
        }
    }

    /**
     * Valida que el título cumpla con:
     * obligatorio, mínimo 3 caracteres, máximo 120 caracteres
     */
    protected function validarTitulo()
    {
       
        if(empty($this->data['titulo'])) {
            // Error, el campo está vacío.
            $this->errores['titulo'] = 'Tenés que escribir un título.';
        } else {
            $caracteres = strlen($this->data['titulo']);
            if($caracteres < 3) {
                $this->errores['titulo'] = 'El título tiene que tener al menos 3 caracteres. Actualmente tiene: ' . $caracteres;
            } else if($caracteres > 120) {
                $this->errores['titulo'] = 'El título tiene que tener como máximo 250 caracteres. Actualmente tiene: ' . $caracteres;
            }
        }
    }

 
    protected function validarSinopsis()
    {
        
        
        if(empty($this->data['sinopsis'])) {
            // Error, el campo está vacío.
            $this->errores['sinopsis'] = 'Tenés que escribir una sinopsis.';
        } else {
            $caracteres = strlen($this->data['sinopsis']);
            if($caracteres < 3) {
                $this->errores['sinopsis'] = 'La sinopsis tiene que tener al menos 3 caracteres. Actualmente tiene: ' . $caracteres;
            } else if($caracteres > 250) {
                $this->errores['sinopsis'] = 'La sinopsis tiene que tener como máximo 250 caracteres. Actualmente tiene: ' . $caracteres;
            }
        }
    }

 
    protected function validarTexto()
    {
    
        if(empty($this->data['texto'])) {
            // Error, el campo está vacío.
            $this->errores['texto'] = 'Tenés que escribir un texto.';
        } else {
            $caracteres = strlen($this->data['texto']);
            if($caracteres < 3) {
                $this->errores['texto'] = 'El texto tiene que tener al menos 3 caracteres. Actualmente tiene: ' . $caracteres;
            }
        }
    }
}
