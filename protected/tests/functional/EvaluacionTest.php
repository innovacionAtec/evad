<?php

class EvaluacionTest extends WebTestCase
{
	public $fixtures=array(
		'evaluacions'=>'Evaluacion',
	);

	public function testShow()
	{
		$this->open('?r=evaluacion/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=evaluacion/create');
	}

	public function testUpdate()
	{
		$this->open('?r=evaluacion/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=evaluacion/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=evaluacion/index');
	}

	public function testAdmin()
	{
		$this->open('?r=evaluacion/admin');
	}
}
