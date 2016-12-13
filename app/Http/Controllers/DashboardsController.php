<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\PartType;

class DashboardsController extends Controller
{
    //as this is a private controller everything handled by this controller is
    // only to be seen inside the backoffice.
    public function __construct() {

        /*
         *this must be changed
         * we want just to be authenticated on Creation and Update
         * for Show it's public.
         *           */
       $this->middleware('auth');
    }

    public function index(){
        /*        $data =  DB::select('select part_types.name, count(articles.id) as article_count
                          from part_types
                          	left join articles
                          		on articles.part_type_id = part_types.id
                          group by part_types.name
                          order by 2 asc');*/

        $dataPartTypes = DB::table('articles')
                 ->join('part_types', 'articles.part_type_id', '=', 'part_types.id')
                 ->select(DB::raw('part_types.name as partType'),
                          DB::raw('count(*) as article_count'))
                 ->groupBy('partType')
                 ->pluck('article_count', 'partType');

       $data = DB::table('articles')
                ->join('brands', 'articles.brand_id', '=', 'brands.id')
                ->select(DB::raw('brands.name as brandName'),
                         DB::raw('count(*) as article_count'))
                ->groupBy('brandName')
                ->pluck('article_count', 'brandName');

        $dataPartTypes_by_price = DB::table('articles')
                                     ->join('part_types', 'articles.part_type_id', '=', 'part_types.id')
                                     ->select(DB::raw('part_types.name as partType'),
                                              DB::raw('sum(price) as article_price'))
                                     ->groupBy('partType')
                                     ->pluck('article_price', 'partType');

        $data_series = collect($dataPartTypes_by_price)->map(function($x){ return  (array) $x ; })->toArray();

        $articlesByYear_dataseries = DB::select("SELECT Months.month, count(distinct articles.id) as value
              FROM
                  (SELECT DATE_FORMAT(now(), '%m/%y') AS Month, 12 as mes, year(now()) as ano
                   UNION  SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 1 MONTH), '%m/%y'), 11 as mes, year(now()) as ano
                   UNION   SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 2 MONTH), '%m/%y'), 10 as mes, year(now()) as ano
                   UNION   SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 3 MONTH), '%m/%y'), 9 as mes, year(now()) as ano
                   UNION   SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 4 MONTH), '%m/%y'), 8 as mes, year(now()) as ano
                   UNION   SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 5 MONTH), '%m/%y'), 7 as mes, year(now()) as ano
                   UNION   SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 6 MONTH), '%m/%y'), 6 as mes, year(now()) as ano
                   UNION   SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 7 MONTH), '%m/%y'), 5 as mes, year(now()) as ano
                   UNION   SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 8 MONTH), '%m/%y'), 4 as mes, year(now()) as ano
                   UNION   SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 9 MONTH), '%m/%y'), 3 as mes, year(now()) as ano
                   UNION   SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 10 MONTH), '%m/%y'), 2 as mes, year(now()) as ano
                   UNION   SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 11 MONTH), '%m/%y'), 1 as mes, year(now()) as ano
                  ) AS Months
              left join articles
                on year(articles.created_at) = Months.ano
                  and month(articles.created_at) = Months.mes
              GROUP BY Months.month
              ORDER BY 1");

       $newArticleList = array();
         collect($articlesByYear_dataseries)->map(function($item) use(&$newArticleList) {
            $newArticleList[$item->month] = $item->value;
        });

        $articlesByYear_dataseries = $newArticleList;

        $articlesByYear_dataseries = collect($articlesByYear_dataseries)->map(function($value){
                                                                    return (array)  $value;
                                                                })->toArray();
        return view('dashboards.index')
                    ->with(compact('data'))
                    ->with(compact('data_series'))
                    ->with(compact('dataPartTypes'))
                    ->with(compact('dataPartTypes_by_price'))
                    ->with(compact('articlesByYear_dataseries'));
    }
}
