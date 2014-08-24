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
     */
    public function onInterest($object)
    {
        $log = var_export(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS), true);
        file_put_contents($this->outfile, $log, FILE_APPEND);
    }
}