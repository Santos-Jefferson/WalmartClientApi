<?php

//variables to access the endpoint from WALMARTLABS
$urlBase = "https://api.walmartlabs.com";
$tokenApi = "8d97n679j89udpwveju6naw3";

//Require function to use CURL to get data from Walmart API
require('functions/getDataWebApi.php');

//Requre HTML header with SearchBar
require('header.html');

//Get the String passed by GET from HTML page
$inputUser = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);

//Call the function passing the Endpoint URL for Lookup Item by string
$response = getDataWebApi("$urlBase/v1/search?query=$inputUser&apiKey=$tokenApi");

//Converting do array and decoding JSON
$resArr = array();
$resArr = json_decode($response);

//If the search returns empty, show a message to the user
if (empty($resArr->items))
{
    echo "<div class=zeroResults>";
        echo "<strong>Sorry, no products matched $inputUser.</strong>";
        echo "<ul>";
            echo "<li>Check your spelling</li>";
            echo "<li>Use different keywords and try again</li>";
        echo "</ul>";
    echo "</div>";
}
//else, show the sentence below
else
{
    echo "<h2>Results for item: $inputUser</h2>";
}

//Looping to get all items provided by API to show to the user
for ($i = 0; $i < count($resArr->items); $i++)
{
    echo "<div class=responsive>";
    echo "<div class=gallery>";
        echo "<a href=recomm.php?itemId=".$resArr->items[$i]->itemId.">";
            echo "<img src=".$resArr->items[$i]->largeImage."></a>";
        echo "<hr />";
        echo "<div class=desc>";
            echo "<a href=recomm.php?itemId=".$resArr->items[$i]->itemId.">";
                echo $resArr->items[$i]->name."</a>";
            echo "<br /><br />";
            echo "<strong>$";
                echo number_format($resArr->items[$i]->salePrice, 2, '.', ',');
            echo "</strong>";
            echo "<br /><br />";
            echo $resArr->items[$i]->shortDescription;
        echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
</body>
</html>