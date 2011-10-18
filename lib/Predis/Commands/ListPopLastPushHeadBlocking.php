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

class ListPopLastPushHeadBlocking extends Command
{
    public function getId()
    {
        return 'BRPOPLPUSH';
    }

    protected function onPrefixKeys(Array $arguments, $prefix)
    {
        return PrefixHelpers::skipLastArgument($arguments, $prefix);
    }

    protected function canBeHashed()
    {
        return $this->checkSameHashForKeys(
            array_slice($args = $this->getArguments(), 0, count($args) - 1)
        );
    }
}
