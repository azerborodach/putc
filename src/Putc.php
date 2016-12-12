<?php

/**
 * Putc means PHPUnit TestCase.
 * It's helper for testing prootected fields and methods.
 */
class Putc extends PHPUnit_Framework_TestCase {

	protected function invokeMethod($object, $methodName, array $parameters = array()) {
		$reflection = new \ReflectionClass(get_class($object));
		$method = $reflection->getMethod($methodName);
		$method->setAccessible(true);

		return $method->invokeArgs($object, $parameters);
	}

	protected function invokeProperty($object, $propertyName) {
		$reflector = new ReflectionClass($object);
		$property = $reflector->getProperty($propertyName);
		$property->setAccessible(true);

		return $property->getValue($object);
	}

	protected static function assertArray($testing) {
		self::assertInternalType('array', $testing);
	}

	protected static function assertXml($testing) {
		self::assertNotFalse(simplexml_load_string($testing));
	}
}
