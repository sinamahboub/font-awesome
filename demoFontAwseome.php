<?php
$css = file_get_contents("css/all.css");
$rules = [];

$css = str_replace("\r", "", $css); // get rid of new lines
$css = str_replace("\n", "", $css); // get rid of new lines

// explode() on close curly braces
// We should be left with stuff like:
//   span{//whatever
//   .block{//whatever
$first = explode('}', $css);

// If a } didn't exist then we probably don't have a valid CSS file
if($first)
{
    // Loop each item
    foreach($first as $v)
    {
        // explode() on the opening curly brace and the ZERO index should be the class declaration or w/e
        $second = explode('{', $v);

        // The final item in $first is going to be empty so we should ignore it
        if(isset($second[0]) && $second[0] !== '')
        {
            $rules[] = trim($second[0]);
        }
    }
}

$classFab=array('fa-font-awesome-logo-full','fa-supple','fa-galactic-senate','fa-aviato','fa-gitlab','fa-accessible-icon','fa-accusoft','fa-acquisitions-incorporated','fa-adn','fa-adversal','fa-algolia','fa-alipay','fa-amazon','fa-amazon-pay','fa-amilia','fa-android','fa-angellist','fa-app-store-ios','fa-apple-pay','fa-artstation','fa-asymmetrik','fa-atlassian','fa-avianex','fa-aws','fa-bandcamp','fa-battle-net','fa-bimobject','fa-bitbucket','fa-bitcoin','fa-bity','fa-blackberry','fa-bluetooth','fa-bootstrap','fa-btc','fa-buysellads','fa-cc-amazon-pay','fa-cc-amex','fa-cc-apple-pay','fa-cc-mastercard','fa-cc-paypal','fa-cc-visa','fa-centos','fa-chromecast','fa-cloudsmith','fa-cloudversify','fa-codepen','fa-connectdevelop','fa-cpanel','fa-creative-commons','fa-creative-commons-by','fa-creative-commons-nc','fa-creative-commons-nc-eu','fa-creative-commons-nc-jp','fa-creative-commons-nd','fa-creative-commons-pd','fa-creative-commons-pd-alt','fa-creative-commons-remix','fa-creative-commons-sa','fa-creative-commons-sampling','fa-creative-commons-sampling-plus','fa-css3','fa-css3-alt','fa-cuttlefish','fa-d-and-d','fa-d-and-d-beyond','fa-delicious','fa-deploydog','fa-dev','fa-deviantart','fa-dhl','fa-diaspora','fa-digg','fa-digital-ocean','fa-discord','fa-draft2digital','fa-dropbox','fa-drupal','fa-dyalog','fa-earlybirds','fa-ebay','fa-envira','fa-erlang','fa-ethereum','fa-etsy','fa-expeditedssl','fa-facebook','fa-fantasy-flight-games','fa-fedex','fa-fedora','fa-figma','fa-firefox','fa-first-order-alt','fa-firstdraft','fa-flipboard','fa-fly','fa-font-awesome-alt','fa-font-awesome-flag','fa-fonticons','fa-fonticons-fi','fa-fort-awesome-alt','fa-free-code-camp','fa-freebsd','fa-fulcrum','fa-galactic-republic','fa-get-pocket','fa-gg','fa-git','fa-git-alt','fa-github-alt','fa-gitkraken','fa-glide-g','fa-goodreads','fa-goodreads-g','fa-google-play','fa-google-plus','fa-google-plus-g','fa-google-wallet','fa-gratipay','fa-grav','fa-grunt','fa-gulp','fa-hacker-news','fa-hackerrank','fa-hips','fa-hooli','fa-hornbill','fa-houzz','fa-html5','fa-hubspot','fa-instagram','fa-intercom','fa-invision','fa-ioxhost','fa-itunes','fa-java','fa-jenkins','fa-jira','fa-joget','fa-joomla','fa-js','fa-keycdn','fa-kickstarter-k','fa-laravel','fa-lastfm','fa-less','fa-linkedin','fa-linkedin-in','fa-linux','fa-lyft','fa-mailchimp','fa-mandalorian','fa-markdown','fa-mastodon','fa-maxcdn','fa-medapps','fa-medium','fa-medium-m','fa-medrt','fa-meetup','fa-megaport','fa-mendeley','fa-microsoft','fa-mix','fa-mixcloud','fa-mizuni','fa-modx','fa-neos','fa-node-js','fa-npm','fa-ns8','fa-nutritionix','fa-odnoklassniki','fa-old-republic','fa-opencart','fa-openid','fa-opera','fa-osi','fa-page4','fa-pagelines','fa-palfed','fa-patreon','fa-paypal','fa-phoenix-framework','fa-phoenix-squadron','fa-php','fa-pied-piper-alt','fa-pied-piper-hat','fa-pied-piper-pp','fa-pinterest','fa-pinterest-p','fa-playstation','fa-product-hunt','fa-pushed','fa-python','fa-qq','fa-quora','fa-r-project','fa-raspberry-pi','fa-ravelry','fa-react','fa-rebel','fa-reddit','fa-reddit-alien','fa-redhat','fa-renren','fa-replyd','fa-resolving','fa-rev','fa-rocketchat','fa-rockrms','fa-safari','fa-sass','fa-schlix','fa-scribd','fa-searchengin','fa-sellcast','fa-sellsy','fa-servicestack','fa-shirtsinbulk','fa-simplybuilt','fa-sistrix','fa-sith','fa-sketch','fa-skyatlas','fa-slack','fa-slack-hash','fa-snapchat','fa-snapchat-ghost','fa-soundcloud','fa-speakap','fa-speaker-deck','fa-spotify','fa-stack-overflow','fa-stackpath','fa-staylinked','fa-steam','fa-steam-symbol','fa-strava','fa-stripe-s','fa-studiovinari','fa-stumbleupon','fa-superpowers','fa-symfony','fa-teamspeak','fa-telegram','fa-the-red-yeti','fa-think-peaks','fa-trade-federation','fa-twitch','fa-typo3','fa-ubuntu','fa-uikit','fa-uniregistry','fa-untappd','fa-ups','fa-usps','fa-ussunnah','fa-vaadin','fa-viacoin','fa-vimeo-v','fa-vk','fa-vnv','fa-vuejs','fa-weebly','fa-weixin','fa-whatsapp','fa-whmcs','fa-wikipedia-w','fa-windows','fa-wix','fa-wizards-of-the-coast','fa-wolf-pack-battalion','fa-wordpress','fa-wpforms','fa-xbox','fa-xing','fa-yandex','fa-yandex-international','fa-yarn','fa-yelp','fa-yoast','fa-zhihu','fa-airbnb','fa-affiliatetheme','fa-adobe','fa-angular','fa-app-store','fa-apple','fa-apper','fa-angrycreative','fa-audible','fa-autoprefixer','fa-behance-square','fa-behance','fa-blogger','fa-blogger-b','fa-bluetooth-b','fa-black-tie','fa-buromobelexperte','fa-buffer','fa-canadian-maple-leaf','fa-cc-stripe','fa-centercode','fa-cc-diners-club','fa-cc-discover','fa-cc-jcb','fa-chrome','fa-cloudscale','fa-codiepie','fa-confluence','fa-contao','fa-creative-commons-zero','fa-creative-commons-share','fa-dashcube','fa-critical-role','fa-dochub','fa-docker','fa-discourse','fa-deskpro','fa-dribbble','fa-dribbble-square','fa-edge','fa-empire','fa-ember','fa-ello','fa-evernote','fa-elementor','fa-facebook-f','fa-facebook-messenger','fa-facebook-square','fa-font-awesome','fa-forumbee','fa-fort-awesome','fa-first-order','fa-flickr','fa-foursquare','fa-git-square','fa-github','fa-glide','fa-github-square','fa-gg-circle','fa-google-drive','fa-google','fa-gofore','fa-google-plus-square','fa-gitter','fa-gripfire','fa-hacker-news-square','fa-hire-a-helper','fa-hotjar','fa-imdb','fa-itch-io','fa-itunes-note','fa-jedi-order','fa-internet-explorer','fa-kaggle','fa-lastfm-square','fa-js-square','fa-kickstarter','fa-jsfiddle','fa-leanpub','fa-korvue','fa-keybase','fa-line','fa-magento','fa-linode','fa-nimblr','fa-node','fa-napster','fa-odnoklassniki-square','fa-monero','fa-optin-monster','fa-penny-arcade','fa-phoenix-framework','fa-phabricator','fa-pied-piper','fa-pinterest-square','fa-periscope','fa-quinscape','fa-reddit-square','fa-readme','fa-red-river','fa-reacteurope','fa-researchgate','fa-salesforce','fa-skype','fa-shopware','fa-slideshare','fa-snapchat-square','fa-sourcetree','fa-squarespace','fa-stack-exchange','fa-sticker-mule','fa-stripe','fa-stumbleupon-circle','fa-steam-square','fa-telegram-plane','fa-tencent-weibo','fa-themeisle','fa-themeco','fa-suse','fa-twitter','fa-twitter-square','fa-uber','fa-tumblr','fa-tumblr-square','fa-tripadvisor','fa-trello','fa-usb','fa-vimeo','fa-vimeo-square','fa-viadeo','fa-weibo','fa-waze','fa-viber','fa-viadeo-square','fa-vine','fa-whatsapp-square','fa-wpexplorer','fa-wpbeginner','fa-wordpress-simple','fa-y-combinator','fa-yahoo','fa-yammer','fa-wpressr','fa-xing-square','fa-youtube','fa-youtube-square');
?>

<link  href="css/all.css" rel="stylesheet" />
<script src="../js/jquery.min.js"></script>
<?php $i=0;
    $textareaclass="";
    foreach($rules as $class){
        if($i>43)
        {
            $fontClass=ltrim(str_replace(":before","",$class),".");
            echo'<div class="icon" id="'.$fontClass.'" >';
                    if(in_array($fontClass,$classFab)){
                        echo "<div class='font' id='font$i' ><i  class=' fab fa-4x $fontClass' ></i></div>";
                        echo "<div  > .fab .$fontClass </div>";
                        echo "<textarea id='$i' ><i class='fab fa-4x $fontClass' ></i></textarea>";
                        $textareaclass.=",'".$fontClass."'";
                    }else{
                        echo "<div id='font$i' ><i class=' fas fa-4x $fontClass' ></i></div>";
                        echo "<div  class='font' > .fas  .$fontClass </div>";
                        echo "<textarea id='$i' ><i class='fas fa-4x $fontClass' ></i></textarea>";
                         
                    }
                        
                        
            echo '</div>'."\r\n";
        }
     $i++;
    }
 ?>
<textarea id="fontClass" rows="10" cols="30" ></textarea>
<style>
    .icon{
        width: 200px;
        height: 200px;
        margin: 10px;
        border: 1px solid #eee;
        float: right;
        text-align: center;
        padding-top: 20px;
        transition: all 0.5s;
    }
    
    i{
     margin-bottom: 10px;
     transition: all 0.5s;
    }
    .font{
     transition: all 0.5s;
    }
    textarea{
     border: none;
     width: 190px;
     height: 90px;
     margin-top: 5px;
     text-align: center;
    }
</style>

<script>

    $("textarea").change(function(){
     
     var id=$(this).attr("id");
     var code=$(this).val();
     $("#font"+id).hide().html(code).fadeIn();
    });
</script>