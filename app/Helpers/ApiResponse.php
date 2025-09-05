<?php

function success($data, $message = 'Success', $status = 200)
{
    return response()->json([
        'success' => true,
        'message' => $message,
        'data' => $data
    ], $status);
}

function error($message = 'Error', $status = 400, $errors = [])
{
    return response()->json([
        'success' => false,
        'message' => $message,
        'errors' => $errors
    ], $status);
}