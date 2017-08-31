<?php

namespace JasonRoman\NbaApi\Request\Data\Prod\Game;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\GameDateParam;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\Data\Prod\AbstractDataProdRequest;

/**
 * Get the game book PDF of a game. Some games are missing. Use the other game book request for more reliability.
 * Valid from 2014-2015 preseason and later.
 */
class GameBookRequest extends AbstractDataProdRequest
{
    const ENDPOINT = '/prod/v1/{gameDate}/{gameId}_Book.pdf';

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     *
     * @var \DateTime|string if string, format is YYYY-MM-DD
     */
    public $gameDate;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(GameIdParam::FORMAT)
     *
     * @var string
     */
    public $gameId;
}