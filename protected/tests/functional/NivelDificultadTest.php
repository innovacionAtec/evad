<?php

class NivelDificultadTest extends WebTestCase
{
	public $fixtures=array(
		'nivelDificultads'=>'NivelDificultad',
	);

	public function testShow()
	{
		$this->open('?r=nivelDificultad/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=nivelDificultad/create');
	}

	public function testUpdate()
	{
		$this->open('?r=nivelDificultad/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=nivelDificultad/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=nivelDificultad/index');
	}

	public function testAdmin()
	{
		$this->open('?r=nivelDificultad/admin');
	}
}
