<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<meta http-equiv="Content-Language" content="pt-br, en-UK" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<title>Autenticação no Servidor</title>
    </head>
    <body>
    	<div>
        	<h2>
            	Autenticação no Servidor
            </h2>
        </div>
    	<form name="FormAuthenticateServer" action="" id="FormAuthenticateServer" method="post">
        	<div>
            	<div>Usuario:</div>   
                <input type="text"   name="UserName" id="Username" title="User Name"/>
            </div>
            <br/>
			<div>
        		<div>Senha:</div> 
                <input type="password"   name="Passwd"   id="Passwd"   title="Password"/>
            </div>
            <br/>
			<div>
        		<input type='submit' name='Submit'   id='Submit'   title='enviar'/>
                <?php echo "Número de Tentativas: " . $_SESSION['TEST_TRIES']; ?>
            </div>
        </form>
    </body>
</html>