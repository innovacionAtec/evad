<?php

class EstatusReactivoTest extends WebTestCase
{
	public $fixtures=array(
		'estatusReactivos'=>'EstatusReactivo',
	);

	public function testShow()
	{
		$this->open('?r=estatusReactivo/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=estatusReactivo/create');
	}

	public function testUpdate()
	{
		$this->open('?r=estatusReactivo/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=estatusReactivo/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=estatusReactivo/index');
	}

	public function testAdmin()
	{
		$this->open('?r=estatusReactivo/admin');
	}
}
