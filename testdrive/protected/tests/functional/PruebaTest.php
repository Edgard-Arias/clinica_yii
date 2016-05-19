<?php

class PruebaTest extends WebTestCase
{
	public $fixtures=array(
		'pruebas'=>'Prueba',
	);

	public function testShow()
	{
		$this->open('?r=prueba/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=prueba/create');
	}

	public function testUpdate()
	{
		$this->open('?r=prueba/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=prueba/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=prueba/index');
	}

	public function testAdmin()
	{
		$this->open('?r=prueba/admin');
	}
}
