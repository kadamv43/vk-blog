<?php

function redirectRouteWithSuccess($route,$message){
    return redirect()->route($route)->with('success', $message);
}


function redirectRouteWithErrors($route,$errors){
    return redirect()->route($route)->withErrors($errors);
}


function redirectBackWithSuccess($message){
    return redirect()->back()->with('success', $message);
}


function redirectBackWithErrors($errors){
    return redirect()->back()->withErrors($errors);
}
