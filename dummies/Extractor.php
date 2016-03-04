<?php

class Extractor
{

    /**
     *
     * @var Logger
     */
    protected $log;

    /**
     *
     * @param Logger $log            
     */
    public function __construct(Logger $log)
    {
        $this->log = $log;
    }

    /**
     *
     * @param stdClass $source            
     */
    public function extract(stdClass $source)
    {
        $this->log->log('extract');
    }

    /**
     *
     * @return Logger
     */
    public function getLog()
    {
        return $this->log;
    }
}