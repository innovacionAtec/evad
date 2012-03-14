<?php

class ReactivoTest extends WebTestCase
{
	public $fixtures=array(
		'reactivos'=>'Reactivo',
	);

	public function testShow()
	{
		$this->open('?r=reactivo/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=reactivo/create');
	}

	public function testUpdate()
	{
		$this->open('?r=reactivo/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=reactivo/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=reactivo/index');
	}

	public function testAdmin()
	{
		$this->open('?r=reactivo/admin');
	}
}
