<?php

class NivelTaxonomicoTest extends WebTestCase
{
	public $fixtures=array(
		'nivelTaxonomicos'=>'NivelTaxonomico',
	);

	public function testShow()
	{
		$this->open('?r=nivelTaxonomico/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=nivelTaxonomico/create');
	}

	public function testUpdate()
	{
		$this->open('?r=nivelTaxonomico/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=nivelTaxonomico/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=nivelTaxonomico/index');
	}

	public function testAdmin()
	{
		$this->open('?r=nivelTaxonomico/admin');
	}
}
