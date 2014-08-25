<?php


class StackTraceObserver implements Observer
{

    /**
     * @var string
     */
    private $outfile;

    /**
     * @param string $outfile
     */
    public function __construct($outfile)
    {
        $this->outfile = $outfile;
    }

    /**
     * @param $object
     * @param string $methodName
     */
    public function onInterest($object, $methodName)
    {
        $log = var_export(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS), true);
        file_put_contents($this->outfile, $log, FILE_APPEND);
    }
}