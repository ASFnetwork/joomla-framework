<?php
/**
 * @copyright  Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Cache\Tests;

use Joomla\Cache;
use Joomla\Test\Helper;

/**
 * Tests for the Joomla\Cache\None class.
 *
 * @since  1.0
 */
class NoneTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var    \Joomla\Cache\None
	 * @since  1.0
	 */
	private $instance;

	/**
	 * Tests the Joomla\Cache\None::doDelete method.
	 *
	 * @return  void
	 *
	 * @covers  Joomla\Cache\None::doDelete
	 * @since   1.0
	 */
	public function testDoDelete()
	{
		$this->instance->delete('foo');
	}

	/**
	 * Tests the Joomla\Cache\None::doGet method.
	 *
	 * @return  void
	 *
	 * @covers  Joomla\Cache\None::doGet
	 * @since   1.0
	 */
	public function testDoGet()
	{
		$this->instance->set('foo', 'bar');
		$this->assertNull($this->instance->get('foo'));
	}

	/**
	 * Tests the Joomla\Cache\None::doSet method.
	 *
	 * @return  void
	 *
	 * @covers  Joomla\Cache\None::doSet
	 * @since   1.0
	 */
	public function testDoSet()
	{
		$this->instance->set('foo', 'bar');
		$this->assertNull($this->instance->get('foo'));
	}

	/**
	 * Tests the Joomla\Cache\None::exists method.
	 *
	 * @return  void
	 *
	 * @covers  Joomla\Cache\None::exists
	 * @since   1.0
	 */
	public function testExists()
	{
		$this->assertFalse(Helper::invoke($this->instance, 'exists', 'foo'));
		$this->instance->set('foo', 'bar');
		$this->assertFalse(Helper::invoke($this->instance, 'exists', 'foo'));
	}

	/**
	 * Setup the tests.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function setUp()
	{
		parent::setUp();

		try
		{
			$this->instance = new Cache\None;
		}
		catch (\Exception $e)
		{
			$this->markTestSkipped();
		}
	}
}
