<?php
    require 'vendor/autoload.php';
    use Goutte\Client;

    $client = new Client();

    $crawler = $client->request('GET', 'https://bguchebnik.com/izdatelstva.html');

    $crawler->filter('.brands-listing')->children()->each(function ($node) {        
        $node->each(function ($row) {
            $row->filter('div > div.row')->each(function ($tt) {
                $result = $tt->filter('div > a')->attr('title');
                
                //echo '<option value="'.$result.'">'.$result.'</option>';
                echo '<option value="'.$result.'" \'.(($row["publisher"] == \''.$result.'\') ? "selected" : "").\'>'.$result.'</option>';
            });
        });
    });
?>