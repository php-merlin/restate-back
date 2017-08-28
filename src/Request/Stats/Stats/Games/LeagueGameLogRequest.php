<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Games;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\Stats\CounterParam;
use JasonRoman\NbaApi\Params\Stats\DirectionParam;
use JasonRoman\NbaApi\Params\Stats\PlayerOrTeamParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Params\Stats\SorterParam;
use JasonRoman\NbaApi\Request\AbstractStatsRequest;

class LeagueGameLogRequest extends AbstractStatsRequest
{
    const ENDPOINT = '/stats/leaguegamelog';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LeagueIdParam::OPTIONS_NBA_G_LEAGUE)
     *
     * @var string
     */
    public $leagueId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(SeasonParam::FORMAT_WITH_ALL_TIME_ALT)
     *
     * @var string
     */
    public $season;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SeasonTypeParam::OPTIONS_WITH_BOTH_ALL_STAR)
     *
     * @var string
     */
    public $seasonType;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(PlayerOrTeamParam::OPTIONS_ABBREV)
     *
     * @var string
     */
    public $playerOrTeam;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = CounterParam::MIN_ALL, max = CounterParam::MAX)
     *
     * @var int
     */
    public $counter;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SorterParam::OPTIONS)
     *
     * @var string
     */
    public $sorter;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(DirectionParam::OPTIONS)
     *
     * @var string
     */
    public $direction;

    /**
     * @Assert\Date()
     *
     * @var \DateTime|string if string, format is YYYY-MM-DD
     */
    public $dateFrom;

    /**
     * @Assert\Date()
     *
     * @var \DateTime|string if string, format is YYYY-MM-DD
     */
    public $dateTo;
}