<?php

class RespuestaTest extends WebTestCase
{
	public $fixtures=array(
		'respuestas'=>'Respuesta',
	);

	public function testShow()
	{
		$this->open('?r=respuesta/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=respuesta/create');
	}

	public function testUpdate()
	{
		$this->open('?r=respuesta/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=respuesta/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=respuesta/index');
	}

	public function testAdmin()
	{
		$this->open('?r=respuesta/admin');
	}
}
