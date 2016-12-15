<?php 
// The facade pattern
/* 
Author : Alberto Cubeddu
Description: The facade pattern allow to manage a set of operation masquerating their complex.
*/

class thingFacade{
    protected $id;

    public function __construct($thingId){
        $this->id = $thingId;
    }

    /**
     * This is the facade
     * @return string Series of processed task
     */ 
    public function repetitiveList(){
        $this->analyzeThing();
        $this->stopThing();
        $this->killThing();
    }

    /**
     * analyze a thing
     * @return string analyzing {id}
     */
    private function analyzeThing(){
        echo "analyzing....".$this->id."<br/>";
    }
    
    /**
     * stop a thing
     * @return string stop {id}
     */
    private function stopThing(){
        echo "stop ".$this->id."<br/>";
    }

    /**
     * Kill a thing
     * @return string kill {id}
     */
    private function killThing(){
        echo "kill ".$this->id."<br/>";
    }

}

// Just 2 lines of code in all places and we have packedup our repetitive list.
$myThing = new thingFacade(25);
$myThing->repetitiveList();


?>