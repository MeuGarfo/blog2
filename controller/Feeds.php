<?php
namespace app\controller;

use Suin\RSSWriter\Channel;
use Suin\RSSWriter\Feed;
use Suin\RSSWriter\Item;

class Feeds
{
    public $db;
    public $auth;
    public $view;
    public function index($method)
    {
        $this->db=require_once ROOT.'db.php';
        $this->get();
    }
    public function get()
    {
        /*VARs*/
        $title=$_ENV['site_name'];
        $description=$_ENV['site_description'];
        $siteUrl=$_ENV['site_url'];
        $feedUrl=$siteUrl.'/feed';
        $siteLanguage='pt-BR';
        $feed = new Feed();
        $channel = new Channel();
        $channel
        ->title($title)
        ->description($description)
        ->url($siteUrl)
        ->feedUrl($feedUrl)
        ->language($siteLanguage)
        ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
        ->ttl(60)
        ->appendTo($feed);
        $item = new Item();
        $item
        ->title('Blog Entry Title')
        ->description('<div>Blog body</div>')
        ->contentEncoded('<div>Blog body</div>')
        ->url('http://blog.example.com/2012/08/21/blog-entry/')
        ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
        ->appendTo($channel);
        /*RULEs*/
        echo $feed;
    }
}
