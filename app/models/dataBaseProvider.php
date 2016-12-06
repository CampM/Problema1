<?php 
/**
 * Capa de abstraccion de base de datos
 * @var array $db_conf
 */

$db_conf=array(
		'servidor'=>'localhost',
		'usuario'=>'root',
		'password'=>'',
		'base_datos'=>'joboffer'
);

class DataBaseProvider{
	
		
	private $link;
	private $result;
	private $regActual;
	
	static $_instance;
	
	/*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/
	private function __construct(){
	
		$this->Conectar($GLOBALS['db_conf']);
	}
	
	/*Evitamos el clonaje del objeto. Patrón Singleton*/
	private function __clone(){ }
	
	/*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
	public static function getInstance(){
		if (!(self::$_instance instanceof self)){
			self::$_instance=new self();
		}
		return self::$_instance;
	}
	
	private function Conectar($conf)
	{
		if (! is_array($conf))
		{
			echo "<p>Faltan parámetros de configuración</p>";
			var_dump($conf);
			// Puede que no se requiera ser tan 'expeditivos' y que lanzar una excepción sea más versatil
			exit();
		}
		$this->link=new mysqli($conf['servidor'], $conf['usuario'], $conf['password']);
		/* check connection */
		if (! $this->link ) {
			printf("Error de conexión: %s\n", mysqli_connect_error());
			// Puede que no se requiera ser tan 'expeditivos' y que lanzar una excepción sea más versatil
			exit();
		}
		
		$this->link->select_db($conf['base_datos']);
		$this->link->query("SET NAMES 'utf8'");
	}
	
	/**
	 * Ejecuta una consulta SQL y devuelve el resultado de esta
	 * @param string $sql
	 * @return mixed
	 */
	public function Consulta($sql)
	{
		$this->result=$this->link->query($sql);
		return $this->result;
	}
	
	/**
	 * Devuelve el siguiente registro del result set devuelto por una consulta.
	 *
	 * @param mixed $result
	 * @return array | NULL
	 */
	public function LeeRegistro($result=NULL)
	{
		if (! $result)
		{
			if (! $this->result)
			{
				return NULL;
			}
			$result=$this->result;
		}
		$this->regActual=mysqli_fetch_array ($result);
		return $this->regActual;
	}
	
	/**
	 * Devuelve el último registro leido
	 */
	public function RegistroActual()
	{
		return $this->regActual;
	}
	
	
	/**
	 * Devuelve el valor del último campo autonumérico insertado
	 * @return int
	 */
	public function LastID()
	{
		return $this->link->insert_id;
	}
		
	/**
	 * Devuelve el primer registro que cumple la condición indicada
	 * @param string $tabla
	 * @param string $condicion
	 * @param string $campos
	 * @return array|NULL
	 */
	public function LeeUnRegistro($tabla, $condicion, $campos='*')
	{
		$sql="select $campos from $tabla where $condicion limit 1";
		$rs=$this->link->query($sql);
		if($rs)
		{
			return $rs->fetch_array();
		}
		else
		{
			return NULL;
		}
	}

	
	/**
	 * Inserta en la base de datos controlando la inyeccion de codigo
	 * @param unknown $tabla
	 * @param unknown $tarea
	 * @return boolean
	 */
	public function Insertar($tabla, $tarea){
   
        $values=array();
        $campos=array();
   
        foreach($tarea as $campo => $valor)
        {
            $values[]='"'.addslashes($valor).'"';
            $campos[]='`'.$campo.'`';
        }
        $sql = "INSERT INTO `$tabla`(".implode(',', $campos).")
                 VALUES (".implode(',', $values)."); ";
       
        /*echo "<p>SQL:</p><pre>$sql</pre>";*/
   
        $ok=$this->link->query($sql);
       
        if (! $ok)
        {
            echo "<p>Hay error: .".$this->link->error."</p>";
            return false;
        }

        return true;
    }

	
    /**
     * Modifica un registro en la base de datos controlando la inyeccion de codigo
     * @param unknown $tabla
     * @param unknown $tarea
     * @param unknown $condicion
     * @return boolean
     */
    public function Modificar($tabla, $tarea, $condicion){
   
        $campos=array();
   
        foreach($tarea as $campo => $valor)
        {
            $campos[]='`'.$campo.'`="'.addslashes($valor).'"';
        }
       
        $sql = "UPDATE `$tabla`
                 SET ".implode(',', $campos)."
                  WHERE ".addslashes($condicion);   
   
        $ok=$this->link->query($sql);
   
        if (! $ok)
        {
            return false;
        }
        return true;
    }
   	
   	
    /**
     * Elimina un regisstro de la base de datos controlando la inyeccion de codigo
     * @param unknown $tabla
     * @param unknown $condicion
     * @return boolean
     */
    public function Eliminar($tabla, $condicion)
    {
       
        $sql = "DELETE FROM `$tabla`
                  WHERE ".addslashes($condicion);
       
        $ok=$this->link->query($sql);
       
        //echo "<p>SQL:</p><pre>$sql</pre>";
       
        if (! $ok)
        {
            echo "<p>Hay error: .".$this->link->error."</p>";
            return false;
        }
       return true;
    }    

    
    /**
     * Cuenta el numero de filas de una consulta dada
     * @param unknown $result
     * @return number|unknown
     */
    function Contar($result=NULL)
	{
		if (! $result)
		{
			if (! $this->result)
			{
				return 0;
			}
			$result=$this->result;
		}

		$cuenta=$result->num_rows;
		return $cuenta;
	}
}
?>