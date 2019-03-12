<?php
/************************************************************************
Class: SessionHandlerCustom.php
Creation: 2013/11/06
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Factory.php
			Base       - Php/Controller/Config.php
Description: 
			Class with Singleton pattern for SessionHandlerCustom
Functions: 
			public function destroy($id);
			public function gc($maxlifetime);
			public function open($savePath, $sessionName);
			public function read($id);
			public function write($id, $data);
**************************************************************************/

class SessionHandlerCustom implements SessionHandlerInterface
{	
	/* Instances */
	private static $Instance;
	
	
	/* Properties */
	private $SavePath;
	
	/**                               **/
	/************* METODOS *************/
	/**                               **/
	
	/* Clone */
	protected function __clone()
    {
        exit(get_class($this) . ": Error! Clone Not Allowed!");
    }
	
	/* Constructor */
	protected function __construct() 
    {
    }
	
	/* Singleton */
	public static function __create()
    {
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
        return self::$Instance;
    }
	
	public function close()
    {
		$sessionId = session_id();
        return true;
    }

    public function destroy($id)
    {
        $file = $this->SavePath . "/sess_" . $id;
        if (file_exists($file)) 
            unlink($file);
        return true;
    }

    public function gc($maxlifetime)
    {
        foreach (glob($this->SavePath . "/sess_*") as $file) 
		{
            if (filemtime($file) + $maxlifetime < time() && file_exists($file))
                unlink($file);
        }
        return true;
    }
	
	public function open($savePath, $sessionName)
    {
        $this->SavePath = $savePath;
		session_save_path($savePath);
        return true;
    }
	
	public function read($id)
    {
        return (string)@file_get_contents($this->SavePath . "/sess_" .$id);
    }
	
	public function write($id, $data)
    {
        return file_put_contents($this->SavePath . "/sess_" . $id, $data) === false ? false : true;
    }
}

?>