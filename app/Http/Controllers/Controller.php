<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function _createdMessage(string $objectName, $url= null)
    {
        $objectName = $objectName;

        return response()->json([
            'message'=>"$objectName created successfully.",
            'url'=>$url
        ]);
    }

    protected function _updatedMessage(string $objectName, $url= null)
    {
        $objectName = $objectName;

        return response()->json([
            'message'=>"$objectName updated successfully.",
            'url'=>$url
        ]);
    }

    protected function _deletedMessage(string $objectName, $url= null)
    {
        $objectName = $objectName;

        return response()->json([
            'message'=>"$objectName deleted successfully.",
            'url'=>$url
        ]);
    }

    public function _errorMessage($message, $code= 400)
    {
        return response()->json([
            'message'=>$message
        ], $code);
    }

    public function _successMessage($message, $code= 200)
    {
        return response()->json([
            'message'=>$message
        ], $code);
    }
}
