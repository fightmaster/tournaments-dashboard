<?php

/**
 * This file is part of the FightmasterSportsTable package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Exception;

use InvalidArgumentException as BaseInvalidArgumentException;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class InvalidArgumentException extends BaseInvalidArgumentException implements ExceptionInterface
{
}
