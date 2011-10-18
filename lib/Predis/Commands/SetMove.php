<?php

/*
 * This file is part of the Predis package.
 *
 * (c) Daniele Alessandri <suppakilla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Predis\Commands;

class SetMove extends Command
{
    public function getId()
    {
        return 'SMOVE';
    }

    protected function onPrefixKeys(Array $arguments, $prefix)
    {
        return PrefixHelpers::skipLastArgument($arguments, $prefix);
    }

    protected function canBeHashed()
    {
        return false;
    }

    public function parseResponse($data)
    {
        return (bool) $data;
    }
}
