<?php
    require 'vendor/autoload.php';
    use Goutte\Client;

    $client = new Client();

    $output = "";
    $outputArray = array();    

    $class = $_POST['class'];
    $subjectsТ = $_POST['subject'];
    $publisherT = $_POST['publisher'];

    
    $link = 'https://www.ciela.com/uchebnitsi/'.$class.'-klas';

    $publisher = array();
    $subjects = array();
    
    $SubjectCrawler = $client->request('GET', $link);
    
    $t = $SubjectCrawler->filter('.mlinks')->each(function ($getSubjects) {
        $ttt = $getSubjects;
        $ttt->filter('li > a')->each(function($aa) {
            $subLink = $aa->attr('href');
            $subName = $aa->text();           
            $GLOBALS['subjects'][$subName] = $subLink;
        });
    });
    
    $PublisherCrawler;
    if(array_key_exists($subjectsТ, $subjects))
    {
        $PublisherCrawler = $client->request('GET', $subjects[$subjectsТ]);

        $t = $PublisherCrawler->filter('.items.term-list')->last()->each(function ($getPublisher) {
            $tt = $getPublisher;
            $tt->filter('li > span')->each(function($aa) {
                $publisherLink = $aa->attr('data-link');
                $publisherName = $aa->innerText();
                
                $GLOBALS['publisher'][$publisherName] = $publisherLink;
            });
        });
    }        
    
    $GetItems;
    if(array_key_exists($publisherT, $publisher))
    {        
        $GetItems = $client->request('GET', $publisher[$publisherT]);
        
        $GetItems->filter('.category-product.products.wrapper.grid.products-grid')->filter('ol > li')->each(function ($node) {
            $GLOBALS['outputArray'][] = $node->html();

            //$outputArray[0] = $node->html();
            //echo $node->html();
        });
    } else if($publisherT == "Друго") {
        $GetItems = $client->request('GET', $GLOBALS['subjects'][$subjectsТ]);
        
        $GetItems->filter('.category-product.products.wrapper.grid.products-grid')->filter('ol > li')->each(function ($node) {
            $GLOBALS['outputArray'][] = $node->html();

            //$outputArray[0] = $node->html();
            //echo $node->html();
        });
    }
    
    $output .= '<div id="booksFromOtherSitesCarousel" class="carousel slide" data-bs-ride="true"><div class="carousel-indicators mb-1">';
    
    if(count($outputArray) > 0)
    {
        
        $output .= '<button type="button" data-bs-target="#booksFromOtherSitesCarousel" data-bs-slide-to="0" class="active"></button>';        
        for($i = 1; $i < count($outputArray); $i++) {
            $output .= '<button type="button" data-bs-target="#booksFromOtherSitesCarousel" data-bs-slide-to="'.$i.'"></button>';
        }
        
        $output .= '</div><div class="carousel-inner"><div class="carousel-item active my-3">'.$outputArray[0].'</div>';                
        
        for($i = 1; $i < count($outputArray); $i++) {
            $output .= '<div class="carousel-item">'.$outputArray[$i].'</div>';
        }
        

        $output .= '</div><button class="carousel-control-prev" type="button" data-bs-target="#booksFromOtherSitesCarousel" data-bs-slide="prev">
                <i class="bi bi-caret-left-fill fs-1 carousel-API-nav"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#booksFromOtherSitesCarousel" data-bs-slide="next">
                <i class="bi bi-caret-right-fill fs-1 carousel-API-nav"></i>
                <span class="visually-hidden">Next</span>
            </button>';
    }
    else {
        $output = '';       
    }

    /*
    $output .= ' <div id="booksFromOtherSitesCarousel" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators">';
    
    if(count($outputArray) > 0)
    {
        
        $output .= '<li data-target="#booksFromOtherSitesCarousel" data-slide-to="0" class="active"></li>';        
        for($i = 1; $i < count($outputArray); $i++) {
            $output .= '<li data-target="#booksFromOtherSitesCarousel" data-slide-to="'.$i.'"></li>';
        }
        
        $output .= '</ol><div class="carousel-inner"><div class="carousel-item active">'.$outputArray[0].'</div>';                
        
        for($i = 1; $i < count($outputArray); $i++) {
            $output .= '<div class="carousel-item">'.$outputArray[$i].'</div>';
        }
        

        $output .= '</div><a class="carousel-control-prev" href="#booksFromOtherSitesCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#booksFromOtherSitesCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>';
    }
    else {
        $output = '';       
    }
    
    */
    /*
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="..." alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="..." alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    */
    
    print $output;
    
?>