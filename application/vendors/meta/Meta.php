<?php

class Meta
{
    public $url;
    public $pageId;
    public $accessToken;

    public function __construct($url, $pageId, $accessToken)
    {
        $this->url = $url;
        $this->pageId = $pageId;
        $this->accessToken = $accessToken;
    }

    public function publish($message, $imageUrl)
    {
        $graph_url = $this->url.$this->pageId."/photos";
        $postData = "url=" . urlencode($imageUrl)
            . "&message=" . urlencode($message)
            . "&access_token=" . $this->accessToken;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $graph_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        curl_exec($ch);
        curl_close($ch);
    }
}