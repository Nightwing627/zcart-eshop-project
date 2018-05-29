<?php
namespace App\Helpers;

use Analytics;
use Carbon\Carbon;
use Spatie\Analytics\Period;
use Illuminate\Support\Collection;

class GoogleAnalytics
{

    public static function fetchTotalVisitorsSessionsAndPageViews(Period $period, $dimension = 'month'): Collection
    {
        $response = Analytics::performQuery(
            $period,
            'ga:users,ga:sessions,ga:pageviews',
            ['dimensions' => 'ga:'.$dimension]
        );

        return collect($response['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'period' => (int) $dateRow[0],
                'visitors' => (int) $dateRow[1],
                'sessions' => (int) $dateRow[2],
                'pageViews' => (int) $dateRow[3],
            ];
        });
    }

    static function country(Period $period): Collection
    {
        $country = Analytics::performQuery(
            $period,
            'ga:sessions',
            ['dimensions'=>'ga:country','sort'=>'-ga:sessions']);

        $result= collect($country['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'country' =>  $dateRow[0],
                'sessions' => (int) $dateRow[1],
            ];
        });
        /* $data['country'] = $result->pluck('country'); */
        /* $data['country_sessions'] = $result->pluck('sessions'); */
        return $result;
    }

    static function topbrowsers(Period $period): Collection
    {
        $analyticsData = Analytics::fetchTopBrowsers($period);
        $array = $analyticsData->toArray();

        foreach ($array as $k=>$v)
        {
            $array[$k] ['label'] = $array[$k] ['browser'];
            unset($array[$k]['browser']);
            $array[$k] ['value'] = $array[$k] ['sessions'];
            unset($array[$k]['sessions']);
            $array[$k]['color'] = $array[$k]['highlight'] = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }
        return json_encode($array);
    }
}