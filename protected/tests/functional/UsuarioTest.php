<?php

class UsuarioTest extends WebTestCase
{
	public $fixtures=array(
		'usuarios'=>'Usuario',
	);

	public function testShow()
	{
		$this->open('?r=usuario/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=usuario/create');
	}

	public function testUpdate()
	{
		$this->open('?r=usuario/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=usuario/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=usuario/index');
	}

	public function testAdmin()
	{
		$this->open('?r=usuario/admin');
	}
}
