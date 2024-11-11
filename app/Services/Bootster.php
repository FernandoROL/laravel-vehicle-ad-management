<?php

namespace App\Services;

class Bootster
{
    public static function success($title, $message)
    {
        session()->flash('toast', [
            'type' => 'success',
            'title' => $title,
            'message' => $message,
            'color' => 'bg-success'
        ]);
    }

    public static function error($title, $message)
    {
        session()->flash('toast', [
            'type' => 'error',
            'title' => $title,
            'message' => $message,
            'color' => 'bg-danger'
        ]);
    }

    public static function alert($title, $message)
    {
        session()->flash('toast', [
            'type' => 'alert',
            'title' => $title,
            'message' => $message,
            'color' => 'bg-warning'
        ]);
    }
}
