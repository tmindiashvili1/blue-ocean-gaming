<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\View3d
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property int $playerid
 * @property int $agentid
 * @property string $currency
 * @property string|null $bet
 * @property string|null $win
 * @property string|null $tournament
 * @property string $net
 * @property string|null $fin
 * @property string $aams_ticket
 * @property string $aams_table
 * @method static \Database\Factories\View3dFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|View3d newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View3d newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View3d query()
 * @method static \Illuminate\Database\Eloquent\Builder|View3d whereAamsTable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View3d whereAamsTicket($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View3d whereAgentid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View3d whereBet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View3d whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View3d whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View3d whereFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View3d whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View3d whereNet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View3d wherePlayerid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View3d whereTournament($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View3d whereWin($value)
 * @mixin \Eloquent
 * @property-read string $formatted_date
 */
class View3d extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'view_3d';

    /**
     * @var string[]
     */
    protected $fillable = [
        'date',
        'playerid',
        'agentid',
        'currency',
        'bet',
        'win',
        'tournament',
        'net',
        'fin',
        'aams_ticket',
        'aams_table'
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'date'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $appends = [
        'formatted_date'
    ];

    /**
     * @return string
     */
    public function getFormattedDateAttribute()
    {
        return $this->date ? $this->date->format('Y-m-d') : '';
    }

}
