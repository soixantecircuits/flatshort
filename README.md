#Flatshort

Flatshort allows to create shortlink from any url. Optionnaly you can choose your own short id !

From : http://thelongestlistofthelongeststuffatthelongestdomainnameatlonglast.com/wearejustdoingthistobestupidnowsincethiscangoonforeverandeverandeverbutitstilllookskindaneatinthebrowsereventhoughitsabigwasteoftimeandenergyandhasnorealpointbutwehadtodoitanyways.html to http://127.0.0.1/apsok.php

## Install

Make sure you have composer.
then: `composer install`

To create a short url just query like this :
`http://127.0.0.1:8000/?id=MYURL`

This will generate a short url for you and return a json response

```
{
"short": "ZSYmxTt"
}
```

If you want to specify your short id simply run it like this :

`http://127.0.0.1:8000/?uri=MYURL&shortid=MYSHORT`
