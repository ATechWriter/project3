<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ScraperController extends Controller
{
    /**
    * Show two forms: one for first names, one for last
    *
    * @return Illuminate\Http\Response
    */

    //include_once 'Constants.php';
    public function first()
    {
        return 'Hi from the scraper';
    }

    // public function first()
    // {
    //     return 'Hi from the first scraper controller';
    // }
    //
    // public function last()
    // {
    //     return 'Hi from the last scraper controller';
    // }
}
