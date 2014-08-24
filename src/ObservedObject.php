<?php


class ObservedObject
{
    /**
     * @var Observer[]
     */
    private $observers = array();

    /**
     * @var $mixed $object
     */
    private $object;


    /**
     * @param $object
     * @throws InvalidArgumentException
     */
    public function __construct($object)
    {
        if (!is_object($object))
        {
            throw new InvalidArgumentException("Whatever you're throwing in here isn't an object.");
        }
        $this->object = $object;
    }

    /**
     * @param string $name
     * @param array $arguments
     */
    public function __call($name, $arguments)
    {
        $reflectionMethod = new ReflectionMethod(get_class($this->object), $name);
        $reflectionMethod->invokeArgs($this->object, $arguments);
        foreach($this->observers as $observer)
        {
            $observer->onInterest($this->object);
        }
    }

    /**
     * @param Observer $observer
     * @return $this
     */
    public function addObserver(Observer $observer)
    {
        $this->observers []= $observer;
        return $this;
    }

    /**
     * @param Observer $observer
     */
    public function removeObserver(Observer $observer)
    {
        $this->observers []= $observer;
    }



    /**
     * @return array
     */
    public function get0bservers()
    {
        return $this->observers;
    }
}