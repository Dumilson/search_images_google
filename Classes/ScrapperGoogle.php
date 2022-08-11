<?php
class ScrapperGoogle
{
    public static function GetImages($nome)
    {
        // URL GOOGLE IMAGES
        $url = "https://www.google.com/search?q=" . str_replace(' ', '+', $nome) . "&tbm=isch";
        $html = file_get_contents($url);
        $DOM = new \DOMDocument();
        $DOM->loadHTML(utf8_encode($html));
        $array_images = "";
        $images = $DOM->getElementsByTagName('img');
        $count = 0;
        foreach ($images as $image) {
        
            if (strpos($image->getAttribute('class'), 'yWs4tf') === 0) {
                $count++;
                $array_images .= '
                            <div class="col-sm-6 mb-5">
                                <img src="' . $image->getAttribute('src') . '" class="img-fluid img-code" alt="...">
                            </div>
                ';
                if ($count == 10) {
                    break;
                }
            }
        }
        return $array_images;
    }
}
