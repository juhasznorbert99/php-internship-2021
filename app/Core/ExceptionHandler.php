<?php

namespace App\Core;

class ExceptionHandler
{
    public function handle($e)
    {
        $this->report($e);
        $this->render($e);
    }

    /**
     * @param \Exception $e
     */
    protected function report($e)
    {
        $e->getMessage();

        //TODO - log this exception
        echo "reporting the exception\n";
    }

    protected function render($e)
    {
        //TODO - return a custom blade for errors
        echo "rendering the exception\n";
    }
}
