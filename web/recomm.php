<?php

//variables to access the endpoint from WALMARTLABS
$urlBase = "https://api.walmartlabs.com";
$tokenApi = "8d97n679j89udpwveju6naw3";

//Require function to use CURL to get data from Walmart API
require('functions/getDataWebApi.php');

//Requre HTML header with SearchBar
require('header.html');

//Get the String passed by GET from HTML page
$itemId = filter_input(INPUT_GET, 'itemId', FILTER_SANITIZE_SPECIAL_CHARS);

//Call the function passing the Endpoint URL for Recommendations Item by itemId
$response = getDataWebApi("https://api.walmartlabs.com/v1/nbp?apiKey=8d97n679j89udpwveju6naw3&itemId=$itemId");

//Call the function passing the Endpoint URL for Item by itemId
$responseProd = getDataWebApi("http://api.walmartlabs.com/v1/items/$itemId?apiKey=8d97n679j89udpwveju6naw3&format=json");

//Converting do array and decoding JSON
$resArr = array();
$resArr = json_decode($response);
$resArrProd = array();
$resArrProd = json_decode($responseProd);

//Show the item by itemId selected during the search 
echo "<div>";
    echo "<div class=desc>";
    echo "<img src=".$resArrProd->largeImage.">";
    echo "<br />";
    echo $resArrProd->name;
    echo "<br />";
    echo "<strong>$".number_format($resArrProd->salePrice, 2, '.', ',')."</strong>";
    echo "<hr>";
    echo "<br />";
echo "</div></div>";

//if search returns some error code, show the message to the user
if (!empty($resArr->errors[0]->code))
{
    echo "<div class=zeroResults>";
        echo "<strong>Sorry, there are no recommendations for $resArrProd->name.</strong>";
        echo "<ul>";
            echo "<li>Try with others produtcs</li>";
        echo "</ul>";
    echo "</div>";
}
else
{   
    //The API is returning more than 10 items.
    echo "<h2>Recommendations for <i>$resArrProd->name</i></h2>";
    
    //define the size to be used in the looping and to show only 10 items
    if (count($resArr) > 10)
    {
        $size = 10;
    }
    else
    {
        $size = count($resArr);
    }

    //Looping through Recommendations items for specific itemId
    for ($i = 0; $i < $size; $i++)
    {
        echo "<div class=responsive>";
            echo "<div class=gallery>";
                echo "<a href=recomm.php?itemId=".$resArr[$i]->itemId.">";
                    echo "<img src=".$resArr[$i]->largeImage.">";
                echo "<hr>";
            echo "<div class=desc>";
                echo "<a href=recomm.php?itemId=".$resArr[$i]->itemId.">";
                    echo $resArr[$i]->name;
                echo "<br /><br />";
                echo "<strong>$".number_format($resArr[$i]->salePrice, 2, '.', ',')."</strong>";
                echo "<br /><br />";
                echo($resArr[$i]->shortDescription);
            echo "</div></div>";
        echo "</div>";
    }
}
?>
</body>
</html>