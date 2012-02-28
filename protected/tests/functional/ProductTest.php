<?php

class ProductTest extends WebTestCase
{
	public $fixtures=array(
		'products'=>'Product',
	);

	public function testShow()
	{
		$this->open('?r=product/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=product/create');
	}

	public function testUpdate()
	{
		$this->open('?r=product/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=product/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=product/index');
	}

	public function testAdmin()
	{
		$this->open('?r=product/admin');
	}
}
