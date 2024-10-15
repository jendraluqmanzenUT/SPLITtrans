<?php
/**
 * PDO mysql database helper class
 * 
 * @author wildantea <wildannudin@gmail.com>
 * @copyright june 2013
 */
 
class Database {
  
    protected $pdo;
    
    public function __construct()
    {
        
		try
        {
			$this->pdoODBC = new PDO(DB_DSN_ODBC, DB_USERNAME_ODBC, DB_PASSWORD_ODBC);
			$this->pdoODBC->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e)
        {
            echo "error " . $e->getMessage();
        }
		try
        {
            $this->pdoMYSQL = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '" . DB_CHARACSET . "';"));
            $this->pdoMYSQL->exec("SET CHARACTER SET " . DB_CHARACSET);
            $this->pdoMYSQL->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdoMYSQL->query("set names " . DB_CHARACSET);
        } catch (PDOException $e)
        {
            echo "error " . $e->getMessage();
        }
    }

    public function custom_query( $sql,$data=null) {
        if ($data!==null) {
        $dat=array_values($data);
        }
        $sel = $this->pdoODBC->prepare( $sql );
        if ($data!==null) {
            $sel->execute($dat);
        } else {
            $sel->execute();
        }
        $sel->setFetchMode( PDO::FETCH_OBJ );
        return $sel;
    }


    public function begin_transaction()
    {
        $this->pdoODBC->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
        $this->pdoODBC->beginTransaction();
    }

  
    public function commit()
    {
        $this->pdoODBC->commit();
        $this->pdoODBC->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
    }

    public function rollback()
    {
        $this->pdoODBC->rollBack();
        $this->pdoODBC->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
    }

    public function fetch_single_row($table,$col,$val)     
    {       
        $nilai=array($val);
        $sel = $this->pdoODBC->prepare("SELECT * FROM $table WHERE $col=?");
        $sel->execute($nilai);
        $sel->setFetchMode( PDO::FETCH_OBJ );
        $obj = $sel->fetch();
        return $obj;
    }

 
    public function fetch_all($table)
    {
        $sel = $this->pdoODBC->prepare("SELECT * FROM $table");
        $sel->execute();
        $sel->setFetchMode( PDO::FETCH_OBJ );
        return $sel;
    }

    public function fetch_col($table,$dat)
    {
        if( $dat !== null )
        $cols= array_values( $dat );
        $col=implode(', ', $cols);
        $sel = $this->pdoODBC->prepare("SELECT $col from $table");
        $sel->execute();
        $sel->setFetchMode( PDO::FETCH_OBJ );
        return $sel;
    }

    public function fetch_multi_row($table,$col,$where)
    {

        $data = array_values( $where ); 
        //grab keys 
        $cols=array_keys($where);
        $colum=implode(', ', $col);
        foreach ($cols as $key) {
          $keys=$key."=?";
          $mark[]=$keys;
        }

        $jum=count($where);
        if ($jum>1) {
            $im=implode('? and  ', $mark);
             $sel = $this->pdoODBC->prepare("SELECT $colum from $table WHERE $im");
        } else {
          $im=implode('', $mark);
             $sel = $this->pdoODBC->prepare("SELECT $colum from $table WHERE $im");
        }
        $sel->execute( $data );
        $sel->setFetchMode( PDO::FETCH_OBJ );
        return  $sel;
    }

    public function check_exist($table,$dat) {

        $data = array_values( $dat ); 
       //grab keys 
        $cols=array_keys($dat);
        $col=implode(', ', $cols);

        foreach ($cols as $key) {
          $keys=$key."=?";
          $mark[]=$keys;
        }

        $jum=count($dat);
        if ($jum>1) {
            $im=implode(' and  ', $mark);
             $sel = $this->pdoODBC->prepare("SELECT $col from $table WHERE $im");
        } else {
          $im=implode('', $mark);
             $sel = $this->pdoODBC->prepare("SELECT $col from $table WHERE $im");
        }
        $sel->execute( $data );
        //$sel->setFetchMode( PDO::FETCH_OBJ );
		$jum = count($sel->fetchAll());
        //$jum=$sel->rowCount();
        if ($jum>0) {
            return true;
        } else {
            return false;
        }     
    }
   
    public function search($table,$col,$where) {
        $data = array_values( $where );
        foreach ($data as $key) {
           $val = '%'.$key.'%';
           $value[]=$val;
        }
       //grab keys 
        $cols=array_keys($where);
        $colum=implode(', ', $col);

        foreach ($cols as $key) {
          $keys=$key." LIKE ?";
          $mark[]=$keys;
        }
        $jum=count($where);
        if ($jum>1) {
            $im=implode(' OR  ', $mark);
             $sel = $this->pdoODBC->prepare("SELECT $colum from $table WHERE $im");
        } else {
          $im=implode('', $mark);
             $sel = $this->pdoODBC->prepare("SELECT $colum from $table WHERE $im");
        }
           
        $sel->execute($value);
        $sel->setFetchMode( PDO::FETCH_OBJ );
        return  $sel;
    }
   
    public function insert($table,$dat) {

        if( $dat !== null )
        $data = array_values( $dat );
        //grab keys 
        $cols=array_keys($dat);
        $col=implode(', ', $cols);

        //grab values and change it value
        $mark=array();
        foreach ($data as $key) {
          $keys='?';
          $mark[]=$keys;
        }
        $im=implode(', ', $mark);
        $ins = $this->pdoODBC->prepare("INSERT INTO $table ($col) values ($im)");
        $ins->execute( $data );

    }

    public function update($table,$dat,$id,$val) {
        if( $dat !== null )
        $data = array_values( $dat ); 
        array_push($data,$val);
        //grab keys
        $cols=array_keys($dat);
        $mark=array();
        foreach ($cols as $col) {
        $mark[]=$col."=?"; 
        }
        $im=implode(', ', $mark);
        $ins = $this->pdoODBC->prepare("UPDATE $table SET $im where $id=?");
        $ins->execute( $data );
    }

    public function delete( $table, $where,$id ) { 
        $data = array( $id ); 
        $sel = $this->pdoODBC->prepare("Delete from $table where $where=?" );
        $sel->execute( $data );
    }
    
    public function __destruct() {
    $this->pdoODBC = null;
    }
}  

?>
