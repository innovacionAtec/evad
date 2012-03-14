<?php

class ClasificacionTematicaTest extends WebTestCase
{
	public $fixtures=array(
		'clasificacionTematicas'=>'ClasificacionTematica',
	);

	public function testShow()
	{
		$this->open('?r=clasificacionTematica/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=clasificacionTematica/create');
	}

	public function testUpdate()
	{
		$this->open('?r=clasificacionTematica/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=clasificacionTematica/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=clasificacionTematica/index');
	}

	public function testAdmin()
	{
		$this->open('?r=clasificacionTematica/admin');
	}
}
