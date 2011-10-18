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

use Predis\Helpers;

class SetIntersection extends Command
{
    public function getId()
    {
        return 'SINTER';
    }

    protected function filterArguments(Array $arguments)
    {
        return Helpers::filterArrayArguments($arguments);
    }

    protected function onPrefixKeys(Array $arguments, $prefix)
    {
        return PrefixHelpers::multipleKeys($arguments, $prefix);
    }

    protected function canBeHashed()
    {
        return $this->checkSameHashForKeys($this->getArguments());
    }
}
