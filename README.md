# putc
Helper for testing protected methods and fields

How to use

    class Foo { //tested class
        protected $bla = true;
        
        protected function bar() {
            return true;
        }
    }

    class FooTest extends Putc { //testing class
          
        public function testBar() {
            $tested = new Foo();
            
            $this->assertTrue($this->invokeMethod($tested, 'bar')); //check protected method
            $this->assertTrue($this->invokeProperty($tested, 'bla')); //check protected field
        }
    }
