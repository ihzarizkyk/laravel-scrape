<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class ScrapeController extends Controller
{
    public function scar()
    {
         // You're doing great with Guzzle here! Let's keep going:
         $client = new Client();

         // Send a GET request to the target URL
         $response = $client->request('GET', 'https://productsolo.github.io/blog');
 
         // Get the body content (HTML) from the response
         $html = $response->getBody()->getContents();
 
         // Use Symfony DomCrawler to parse the HTML
         $crawler = new Crawler($html);
 
         // Now you can use the filter() method without any errors!
         $crawler->filter('h1')->each(function ($node) {
             echo $node->text() . "<br>";
         });
 
         // Example: Extract all links
         $crawler->filter('a')->each(function ($node) {
             $link = $node->attr('href');
             echo "Link: " . $link . "<br>";
         });
 
         return response()->json(['success' => true]);
    }
}
