<?php

namespace App\Exceptions;

use Exception;

class GeneralException extends Exception
{
    /**
     * Report the exception.
     *
     * @return bool|void
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        //
    }
}
