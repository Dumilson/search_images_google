<?php
class ScrapperGoogle
{
    public function getFotos($nome)
    {
        $url = "https://www.google.com/search?q=" . str_replace(' ', '+', $nome) . "&tbm=isch";
        $html = file_get_contents($url);
        $DOM = new \DOMDocument();
        $DOM->loadHTML(utf8_encode($html));
        $data_code = "";
        $data = $DOM->getElementsByTagName('img');
        $count = 0;
        foreach ($data as $dat) {
            if (strpos($dat->getAttribute('class'), 'yWs4tf') === 0) {
                $count++;
                $data_code .= "<img  width='200'src='" . $dat->getAttribute('src') . "'>";
                if ($count == 1) {
                    break;
                }
            }
        }
        return $data_code;
    }
}
