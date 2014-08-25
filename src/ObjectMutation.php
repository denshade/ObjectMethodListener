<?php


class ObjectMutation
{
    /**
     * @param $object
     * @param string $outfile
     * @return mixed
     */
    public static function wrapAsTraceObserver($object, $outfile)
    {
        $wrapper = new ObservedObject($object);
        $wrapper->addObserver(new StackTraceObserver($outfile));
        return $wrapper;
    }

    /**
     * @param $object
     * @return mixed
     */
    public static function wrapAsReadonlyObject($object)
    {
        $wrapper = new ObservedObject($object);
        $wrapper->addObserver(new ReadOnlyObserver());
        return $wrapper;
    }
} 