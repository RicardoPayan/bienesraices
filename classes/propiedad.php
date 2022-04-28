<?php

namespace App;

class Propiedad{

    //Base de datos

    //La hacemos protected porque solo queremos acceder a ella en la clase, no en alguna otra parte de la pagina
    //static porque no requerimos conectar a la base de datos con cada instancia, porque son siempre las mismas credenciales.

    //$db nunca se va construir de nuevo, por eso es static.
    protected static $db;
    protected static $columnas_DB =['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedorId'];

    //Errores
    protected static $errores=[];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    //Defenir la conexion a la base de datos
    public static function setDB($database){
        self::$db=$database;
    }

    public function __construct($args = []){
        $this->id= $args['id'] ?? '';
        $this->titulo= $args['titulo'] ?? '';
        $this->precio= $args['precio'] ?? '';
        $this->imagen= $args['imagen'] ?? '';
        $this->descripcion= $args['descripcion'] ?? '';
        $this->habitaciones= $args['habitaciones'] ?? '';
        $this->wc= $args['wc'] ?? '';
        $this->estacionamiento= $args['estacionamiento'] ?? '';
        $this->creado= date('Y/m/d');
        $this->vendedorId= $args['vendedorId'] ?? 1;
    }

    public function guardar(){

        //sanitizar los datos
        $atributos= $this->sanitizarAtributos();

        //Convirtiendo las claves del objeto a strings para poder usarlos al momento de insertar los datos a la DB
        $string=join(', ',array_keys($atributos));



        //Insertar en la base de datos
        //Concatenamos los datos usando las funciones de array_keys y arrar_values
        $query= "INSERT INTO propiedades (";
        $query.= join(', ',array_keys($atributos));
        $query.=" ) VALUES (' ";
        $query.= join("', '",array_values($atributos));
        $query.= " ')";


        $resultado=self::$db->query($query);
        return $resultado;
    }

    //Funcion para identificar y unir los atributos de la DB
    public function atributos(){
        $atributos=[];
        foreach (self::$columnas_DB as $columna){
            if($columna=='id')continue;
            $atributos[$columna]=$this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos(){
        $atributos=$this->atributos();
        $sanitizado= [];


        //Lo recorremos como arreglo asociativo, ya que necesitamos la clave y el valor del dato
        foreach ($atributos as $key => $value){
            $sanitizado[$key]= self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //Subida de archivos
    public function setImagen($imagen){
        //Elimina la imagen anterior
        if($this->id){
            //Comprobar si existe archivo
            $existeArchivo=file_exists(CARPETA_IMAGENES . $this->imagen);
            if($existeArchivo){
                //unlink funciona para eliminar archivos
                unlink(CARPETA_IMAGENES . $this->imagen);
            }
        }


        //asignar al atributo imagen el nombre de la imagen
        if($imagen){
            $this->imagen=$imagen;
        }
    }

    //Validacion
    public static function getErrores(){
        return self::$errores;
    }

    public function validar(){
        //VALIDACIONES
        if(!$this->titulo){
            self::$errores[]="Debes añadir un titulo";
        }

        if(!$this->precio){
            self::$errores[]="El precio es obligatorio";
        }

        if(strlen($this->descripcion)<50){
            self::$errores[]="La descripcion es obligatorio y debe tener al menos 50 caracteres";
        }

        if(!$this->habitaciones){
            self::$errores[]="El numero de habitaciones es obligatorio";
        }

        if(!$this->wc){
            self::$errores[]="El numero de baños es obligatorio";
        }

        if(!$this->estacionamiento){
            self::$errores[]="El numero de estacionamientos es obligatorio";
        }

        if(!$this->vendedorId){
            self::$errores[]="Seleccionar el vendedor es obligatorio";
        }

        if(!$this->imagen){
            self::$errores[]='La imagen es obligatoria';
        }

       return self::$errores;
    }
    //Lista todas las propiedades
    public static function all(){
        $query = "SELECT * FROM propiedades";
         $resultado= self::consultarSQL($query);
         return $resultado;
    }

    //Buscar propiedad por su ID
    public static function find($id){
        $query="SELECT * FROM propiedades WHERE id = {$id}";

        $resultado = self::consultarSQL($query);

        //array_shift es una funcion de php que retorna el primer elemento de un arreglo
        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        //Consultar la base de datos
        $resultado=self::$db->query($query);

        //iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[]= self::crearObjeto($registro);
        }


        //Liberar memoria
        $resultado->free();
        //retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto= new self;

        foreach ($registro as $key =>$value){
            //property_exists, verifica si una propiedad existe
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }
    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = []){
        foreach ($args as $key=>$value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}