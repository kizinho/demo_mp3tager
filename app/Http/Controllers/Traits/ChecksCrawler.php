<?php
namespace App\Http\Traits;

use Jaybizzle\CrawlerDetect\CrawlerDetect;

/**
 *
 * @author Victor Anuebunwa
 */
trait ChecksCrawler
{
    
    protected function isCrawler()
    {
        $crawlerDetect = new CrawlerDetect;

        return $crawlerDetect->isCrawler();
    }

}
