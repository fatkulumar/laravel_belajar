<?php
namespace App\AppServices;

abstract class ApplicationService
{
    /**
     * @param null $message
     * @return array
     */
    protected function successResponse($message = null)
    {
        return ['status' => true, 'errors' => null, 'message' => $message];
    }

    /**
     * @param null $errorMessage
     * @param null $message
     * @return array
     */
    protected function errorResponse($errorMessage = null, $message = null)
    {
        return ['status' => false, 'errors' => 'Error. '.$errorMessage, 'message' => $message];
    }
}

