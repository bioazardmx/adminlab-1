<?php
namespace App;

abstract class Ayudantes
{
    /* Variable estática para mantener consistencia*/
    protected static $timezone = 'America/Mexico_City';

    /**
     * Función estática para recuperar el valor predeterminado para los calendarios.
     * @return string: Zona horaria ($this->timezone).
     */
    public static function getDefaultTimezone()
    {
        return self::$timezone;
    }

    /**
     * Función para el envío de mensajes al Usuario
     * @param string $error: Error a mostrar al usuario.
     * @param string $accion: Acción que el sistema realiza.
     * @return void
     */
    public static function flashMessages($error = null, $accion = 'creado')
    {
        session()->flash('flash-message', ((is_null($error))? 'Registro '.$accion.' exitosamente.' : 'Error: '.$error));

        if(!is_null($error)){
            session()->flash('flash-message-error', true);
        }
    }

    /**
     * Función para obtener un color aleatorio
     * @return string: Color en hexadecimal, con "#" incluido.
     */
    public static function generarColor()
    {
        $r = random_int(0, 255);
        $g = random_int(0, 255);
        $b = random_int(0, 255);
        return ('#'.strtoupper(dechex($r) . dechex($g) . dechex($b)));
    }

    /**
     * Función para obtener el tono contrastante del color dado (Blanco o Negro)
     * @param string $hexcolor: Color en hexadecimal, con o sin "#"
     * @return string: Color en hexadecimal, con "#" incluido.
     */
    public static function colorContrastante($hexcolor){
        $posicionPound = stripos($hexcolor, '#');
        $hexcolor = ($posicionPound === false)? $hexcolor : substr($hexcolor, 1);
        return ('#'.((hexdec($hexcolor) > 0xffffff/2) ? '000000':'FFFFFF'));
    }

    /**
     * Función para obtener el lenguaje a usar en los DataTable
     * @return string: propiedad "language" con su objeto
     */
    public static function imprimirLenguageDataTable()
    {
        return 'language: {
    				lengthMenu: "_MENU_",
    				search: "_INPUT_",
    				searchPlaceholder: "Buscar",
    				emptyTable: "No hay registros",
    				info: "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
    				infoEmpty: "Mostrando desde 0 hasta 0 de 0 registros",
    				infoFiltered: "(filtrado de un total de _MAX_ registros)",
    				infoPostFix: "",
    				thousands: ",",
    				lengthMenu: "Mostrar los _MENU_ registros",
    				loadingRecords: "Cargando...",
    				processing: "Procesando...",
    				zeroRecords: "No se encontraron coincidencias",
    				paginate: {
    						first: "Primero",
    						last: "&Uacute;ltimo",
    						next: "Siguiente",
    						previous: "Anterior"
    				},
    				aria: {
    						sortAscending: ": activar para ordenar la columna de manera ascendente",
    						sortDescending: ": activar para ordenar la columna de manera descendente"
    				}
    		},';
    }
}
