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

use LogicException as BaseLogicException;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class LogicException extends BaseLogicException implements ExceptionInterface
{
}
