<?php

namespace JasonRoman\NbaApi\Request\Stats\Stats\Players;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\LeagueIdParam;
use JasonRoman\NbaApi\Params\Stats\PerModeParam;
use JasonRoman\NbaApi\Params\SeasonParam;
use JasonRoman\NbaApi\Params\Stats\ConferenceParam;
use JasonRoman\NbaApi\Params\Stats\DivisionParam;
use JasonRoman\NbaApi\Params\Stats\DraftPickParam;
use JasonRoman\NbaApi\Params\Stats\GameScopeParam;
use JasonRoman\NbaApi\Params\Stats\GameSegmentParam;
use JasonRoman\NbaApi\Params\Stats\HeightParam;
use JasonRoman\NbaApi\Params\Stats\LastNGamesParam;
use JasonRoman\NbaApi\Params\Stats\LocationParam;
use JasonRoman\NbaApi\Params\Stats\MeasureTypeParam;
use JasonRoman\NbaApi\Params\Stats\MonthParam;
use JasonRoman\NbaApi\Params\Stats\OutcomeParam;
use JasonRoman\NbaApi\Params\Stats\PeriodParam;
use JasonRoman\NbaApi\Params\Stats\PlayerExperienceParam;
use JasonRoman\NbaApi\Params\Stats\PlayerPositionParam;
use JasonRoman\NbaApi\Params\Stats\PORoundParam;
use JasonRoman\NbaApi\Params\Stats\SeasonSegmentParam;
use JasonRoman\NbaApi\Params\Stats\SeasonTypeParam;
use JasonRoman\NbaApi\Params\Stats\ShotClockRangeParam;
use JasonRoman\NbaApi\Params\Stats\StarterBenchParam;
use JasonRoman\NbaApi\Params\Stats\WeightParam;
use JasonRoman\NbaApi\Params\SeasonYearParam;
use JasonRoman\NbaApi\Params\TeamIdParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

class PlayersGeneralStatsRequest extends AbstractDataRequest
{
    const ENDPOINT = '/stats/leaguedashplayerstats';

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(MeasureTypeParam::OPTIONS_BASE_OPPONENT)
     *
     * @var string
     */
    public $measureType;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(PerModeParam::OPTIONS_ALL)
     *
     * @var string
     */
    public $perMode;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("bool")
     *
     * @var bool
     */
    public $plusMinus;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("bool")
     *
     * @var bool
     */
    public $paceAdjust;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("bool")
     *
     * @var bool
     */
    public $rank;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LeagueIdParam::OPTIONS_NBA_G_LEAGUE)
     *
     * @var string
     */
    public $leagueId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = SeasonParam::FORMAT)
     *
     * @var string
     */
    public $season;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SeasonTypeParam::OPTIONS_WITH_ALL_STAR)
     *
     * @var string
     */
    public $seasonType;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = PORoundParam::MIN_ALL, max = PORoundParam::MAX_VALUE)
     *
     * @var int
     */
    public $poRound;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(OutcomeParam::OPTIONS)
     *
     * @var string
     */
    public $outcome;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(LocationParam::OPTIONS)
     *
     * @var string
     */
    public $location;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = MonthParam::MIN_ALL, max = MonthParam::MAX)
     *
     * @var int
     */
    public $month;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(SeasonSegmentParam::OPTIONS)
     *
     * @var string
     */
    public $seasonSegment;

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

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN_ALL, max = TeamIdParam::MAX_VALUE)
     *
     * @var int
     */
    public $opponentTeamId;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(ConferenceParam::OPTIONS)
     *
     * @var string
     */
    public $vsConference;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(DivisionParam::OPTIONS_WITH_CONFERENCE)
     *
     * @var string
     */
    public $vsDivision;

    /**
     * @Assert\Type("int")
     * @Assert\Range(min = TeamIdParam::MIN_ALL, max = TeamIdParam::MAX_VALUE)
     *
     * @var int
     */
    public $teamId;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(ConferenceParam::OPTIONS)
     *
     * @var string
     */
    public $conference;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(DivisionParam::OPTIONS_WITH_CONFERENCE)
     *
     * @var string
     */
    public $division;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(GameSegmentParam::OPTIONS)
     *
     * @var string
     */
    public $gameSegment;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = PeriodParam::MIN_ALL, max = PeriodParam::MAX)
     *
     * @var int
     */
    public $period;

    /**
     * @Assert\Type("int")
     * @ApiAssert\ApiChoice(ShotClockRangeParam::OPTIONS)
     *
     * @var string
     */
    public $shotClockRange;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = LastNGamesParam::MIN_ALL, max = LastNGamesParam::MAX)
     *
     * @var int
     */
    public $lastNGames;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(GameScopeParam::OPTIONS_LAST_10_YESTERDAY)
     *
     * @var string
     */
    public $gameScope;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(PlayerExperienceParam::OPTIONS)
     *
     * @var string
     */
    public $playerExperience;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(PlayerPositionParam::OPTIONS)
     *
     * @var string
     */
    public $playerPosition;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(StarterBenchParam::OPTIONS)
     *
     * @var string
     */
    public $starterBench;

    /**
     * @Assert\Type("string")
     * @Assert\Range(min = SeasonYearParam::FIRST_DRAFT_SEASON_YEAR)
     *
     * @var string
     */
    public $draftYear;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(DraftPickParam::OPTIONS)
     *
     * @var string
     */
    public $draftPick;

    /**
     * @Assert\Type("string")
     *
     * @var string
     */
    public $college;

    /**
     * @Assert\Type("string")
     *
     * @var string
     */
    public $country;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(HeightParam::OPTIONS)
     *
     * @var string
     */
    public $height;

    /**
     * @Assert\Type("string")
     * @ApiAssert\ApiChoice(WeightParam::OPTIONS)
     *
     * @var string
     */
    public $weight;

    /**
     * {@inheritdoc}
     */
    public function getDefaultValues(): array
    {
        return [
            'measureType'    => MeasureTypeParam::BASE,
            'perMode'        => PerModeParam::PER_GAME,
            'plusMinus'      => false,
            'paceAdjust'     => false,
            'rank'           => false,
            'seasonType'     => SeasonTypeParam::REGULAR_SEASON,
            'poRound'        => PORoundParam::MIN_ALL,
            'month'          => MonthParam::MIN_ALL,
            'opponentTeamId' => TeamIdParam::MIN_ALL,
            'teamId'         => TeamIdParam::MIN_ALL,
            'period'         => PeriodParam::MIN_ALL,
            'lastNGames'     => LastNGamesParam::MIN_ALL,
        ];
    }
}