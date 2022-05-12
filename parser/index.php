<?php

include_once 'db.php';
include_once 'simple_html_dom.php';



function curlGetPage($url, $referer = 'https://google.com/')
{
    $proxies = [
        '1.1.1.1',
        '2.2.2.2',
    ];
    $proxyCount = count($proxies);
    $proxyId = rand(0, $proxyCount - 1);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //curl_setopt($ch, CURLOPT_PROXY, $proxies[$proxyId]);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}



$page = curlGetPage('https://m.flip.kz/catalog?subsection=1&filter-show=1');
$html = str_get_html($page);



foreach ($html->find('.good-grid') AS $element) {
    echo $element->plaintext;
    $img = $element->find('.img img', 0);
    echo $img->src . '---';
}
die();

$pagenavi = $html->find('.js-pagination_list', 0);
$pageCount = intval($pagenavi->find('li', 6)->plaintext);

$postCount = 0;
for ($i = 30; $i <= $pageCount; $i++) {
    $referer = 'https://google.com';
    if ($i > 2) {
        $referer = 'https://www.sport-express.ru/football/reviews/page' . ($i - 1) . '/';
    }
    $page = curlGetPage('https://www.sport-express.ru/football/reviews/page' . $i . '/', $referer);
    $html = str_get_html($page);

    foreach ($html->find('.se19-article-list__item') AS $element) {
        $img = $element->find('.se19-article-list__img', 0);
        $link = $element->find('.se19-article-list__title', 0);
        $post = [
            'img' => $img->src,
            'title' => trim($link->plaintext),
            'link' => $link->href,
        ];

        $db->query("INSERT IGNORE INTO posts (`title`, `img`, `link`) 
                VALUES('{$post['title']}', '{$post['img']}', '{$post['link']}')");
        $postCount++;
        echo $postCount . ' - ' . $post['title'] . "\n";
    }

    usleep(1500000);
    if ($i > 100) {
        break;
    }
}

