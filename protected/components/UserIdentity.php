<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
  private $_id;

  public function authenticate()
  {
    $curl = curl_init('https://mail.google.com/mail/feed/atom');

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_USERPWD, $this->username.':'.$this->password);
    $result = curl_exec($curl);
    $code = curl_getinfo ($curl, CURLINFO_HTTP_CODE);

    switch ($code) {
      case 200:
        $success = 1;
        break;
      case 401:
        $success= 2;
        break;
      default:
        $success= 3;
        break;
    }

    $institucional=0;
    if(substr($this->username,-12)=='@iems.edu.mx') $institucional=1;
    $registro= Usuario::model()->findByAttributes(array('email'=>$this->username));
    if($registro===null)
    {
      $this->errorCode=self::ERROR_USERNAME_INVALID;
    }
    else if($registro->password===md5($this->password))
    {
      $this->_id=$registro->id;
      $this->setState('id_usuario', $registro->id);
      $this->setState('id_rol', $registro->id_rol);
      $this->errorCode=self::ERROR_NONE;
    }
    else if($institucional === 1 && $success===1)
    {
      $this->_id=$registro->id;
      $this->setState('id_usuario', $registro->id);
      $this->setState('id_rol', $registro->id_rol);
      $this->errorCode=self::ERROR_NONE;
    }
    else
    {
      $this->errorCode=self::ERROR_PASSWORD_INVALID;
    }
    return !$this->errorCode;
  }
}
