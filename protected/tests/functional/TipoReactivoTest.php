<?php

class TipoReactivoTest extends WebTestCase
{
	public $fixtures=array(
		'tipoReactivos'=>'TipoReactivo',
	);

	public function testShow()
	{
		$this->open('?r=tipoReactivo/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tipoReactivo/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tipoReactivo/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tipoReactivo/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tipoReactivo/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tipoReactivo/admin');
	}
}
