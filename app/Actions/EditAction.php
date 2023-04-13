<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class EditAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Delete';
    }

    public function getIcon()
    {
        return 'voyager-eye';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right',
        ];
    }

    public function getDefaultRoute()
    {
        // return route('my.route');
    }
}