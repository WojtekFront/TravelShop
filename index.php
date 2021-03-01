<?php
include_once 'php/conn.php';
?>

<!Doctype html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href='http://fonts.googleapis.com/css?family=VT323&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <title>Strona do wystawiania faktur:</title>
</head>

<body>

<nav><ul class="nav-links">
    <li>
        <a href="#">faktury</a>
    </li>
    <li>
        <a href="#">usun</a>
    </li>
    <li>
        <a href="#">dodaj</a>
    </li>
    <li>
        <a href="#">kontakt</a>
    </li>
</ul>
<div class="burger">
    <div class="line1"></div>
    <div class="line2"></div>
    <div class="line3"></div>
</div>
</nav>
    <main>
        <div id="wydruk">

            <?php
            $sqlll = "SELECT * FROM new_order WHERE active = '1';";
            $resultS = mysqli_query($conn, $sqlll);
            $resultCheck = mysqli_num_rows($resultS);
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($resultS)) {
                    echo "<h3> ID:" . $row['id'] . " |    Data: " . $row['datetimeO'] . " |    Nazwa: " . $row['nameC'] . "</h3>" . "<table class='druk2'>"
                        . "<tr><td>nazwa: " . $row['nameC'] . "</td></tr>"
                        . "<tr><td class='longInput'> ulica: " . $row['streetC'] . "  " . $row['buildingC'] . "  " . $row['localC'] . "</td></tr>"
                        . "<tr><td>nazwa: " . $row['postCodeC'] . " " . $row['cityC'] . " " . $row['countryC'] . "</td></tr>"
                        . "</table>"
                        . "<table class='druk1'>"
                        . "<tr><td><p>LP</p></td><td>Nazwa</td><td class='tableS'>cena</td><td class='tableS'>ilosc</td><td class='tableS'>Stawka Vat</td></tr>"
                        . "<tr class='hideValue" . $row['name1'] . "'><td><p>1</p></td><td>" . $row['name1'] . "</td><td>" . $row['cena1'] . "</td><td>" . $row['ilosc1'] . "</td><td>" . $row['vat1'] . "</td></tr>"
                        . "<tr class='hideValue" . $row['name2'] . "'><td><p>2</p></td><td>" . $row['name2'] . "</td><td>" . $row['cena2'] . "</td><td>" . $row['ilosc2'] . "</td><td>" . $row['vat2'] . "</td></tr>"
                        . "<tr class='hideValue" . $row['name3'] . "'><td><p>3</p></td><td>" . $row['name3'] . "</td><td>" . $row['cena3'] . "</td><td>" . $row['ilosc3'] . "</td><td>" . $row['vat3'] . "</td></tr>"
                        . "<tr class='hideValue" . $row['name4'] . "'><td><p>4</p></td><td>" . $row['name4'] . "</td><td>" . $row['cena4'] . "</td><td>" . $row['ilosc4'] . "</td><td>" . $row['vat4'] . "</td></tr>"
                        . "<tr class='hideValue" . $row['name5'] . "'><td><p>5</p></td><td>" . $row['name5'] . "</td><td>" . $row['cena5'] . "</td><td>" . $row['ilosc5'] . "</td><td>" . $row['vat5'] . "</td></tr>"
                        . "<tr class='hideValue" . $row['name6'] . "'><td><p>6</p></td><td>" . $row['name6'] . "</td><td>" . $row['cena6'] . "</td><td>" . $row['ilosc6'] . "</td><td>" . $row['vat6'] . "</td></tr>"
                        . "<tr class='hideValue'><td><p>7</p></td><td>" . $row['name7'] . "</td><td>" . $row['cena7'] . "</td><td>" . $row['ilosc7'] . "</td><td>" . $row['vat7'] . "</td></tr>"
                        . "</table>";
                }
            }
            ?>
            <div id="divUsun"></br>
                <form action='php/orderUpdate.php' method='POST'>
                    <label for="deleteI">wpisz nr ID faktury do usunięcia</label>
                    <input type='number' id="deleteI" name="deleteI" placeholder="ID faktury"></br>
                    <button type='submit' name='usun' value='usuń'>skasuj</button>
                </form>
                </br></br>

            </div>
        </div>


        <!------------------------------------------------------------------------------>



        <div id="formS">
            <h1>Dane do faktury</h1>

            <div id="wydrukJS"></div>
            <form method="POST" action="php/orderInsert.php">


                <div class="dateC">
                    <h3>Nabywca</h3>
                    <div><label for="nameC">Nazwa</label>
                        <input type="text" id="nameC" name="nameC" placeholder="wpisz nazwę" required>
                    </div>
                    </br>
                    <div><label for="streetC">Ulica:</label>
                        <input type="text" id="streetC" name="streetC" required>
                    </div>
                    </br>
                    <div><label for="buildingC">Budynek</label>
                        <input type="text" id="buildingC" name="buildingC" required>
                    </div>
                    </br>
                    <div><label for="localC">Mieszkanie</label>
                        <input type="text" id="localC" name="localC">
                    </div>
                    </br>
                    <div><label for="postCodeC">Kod pocztowy:</label>
                        <input type="text" id="postCodeC" name="postCodeC" required>
                    </div>
                    </br>
                    <div><label for="cityC">Miasto</label>
                        <input type="text" id="cityC" name="cityC" required>
                    </div>
                    </br>

                    <div><label for="nipC">nip lub pesel:</label>
                        <input type="tel" id="nipC" name="nipC" required>
                    </div>
                    </br>
                    <div><label for="countryC">Kraj</label>
                        <input type="tel" id="countryC" name="countryC">
                    </div>
                </div>



                </br>
                <div><label for="datetimeO">Data Faktury</label><input type="date" name="datetimeO" min="2020-01-01" id="datetimeO" required>
                </div>
                </br>
                <div><label for="describeO">Numer faktury: </label><input type="text" name="describeO" id="describeO" required>
                    <div>
                        </br>
                        <table>
                            <tr>
                                <td>LP</td>
                                <td>nazwa produktu</td>
                                <td>cena</td>
                                <td>ilość</td>
                                <td>stawka VAT</td>
                                <td>podatek</td>
                                <td>łącznie</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><input type="text" name="name1"></td>
                                <td class="tableS"><input type="number" name="cena1" id="cena1" required></td>
                                <td class="tableS"><input type="number" name="ilosc1" id="ilosc1" required></td>
                                <td class="tableS"><input type="number" name="Vat1" value="23" id="Vat1" required></td>
                                <td class="tableS">
                                    <div id="wylicz1"></div>
                                </td>
                                <td class="tableS">
                                    <div id="lacz1"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><input type="text" name="name2"></td>
                                <td class="tableS"><input type="number" name="cena2" id="cena2"></td>
                                <td class="tableS"><input type="number" name="ilosc2" id="ilosc2"></td>
                                <td class="tableS"><input type="number" name="Vat2" value="23" id="Vat2"></td>
                                <td class="tableS">
                                    <div id="wylicz2"></div>
                                </td>
                                <td class="tableS">
                                    <div id="lacz2"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><input type="text" name="name3"></td>
                                <td class="tableS"><input type="number" name="cena3" id="cena3"></td>
                                <td class="tableS"><input type="number" name="ilosc3" id="ilosc3"></td>
                                <td class="tableS"><input type="number" name="Vat3" value="23" id="Vat3"></td>
                                <td class="tableS">
                                    <div id="wylicz3"></div>
                                </td>
                                <td class="tableS">
                                    <div id="lacz3"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><input type="text" name="name4"></td>
                                <td class="tableS"><input type="number" name="cena4" id="cena4"></td>
                                <td class="tableS"><input type="number" name="ilosc4" id="ilosc4"></td>
                                <td class="tableS"><input type="number" name="Vat4" value="23" id="Vat4"></td>
                                <td class="tableS">
                                    <div id="wylicz4"></div>
                                </td>
                                <td class="tableS">
                                    <div id="lacz4"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><input type="text" name="name5"></td>
                                <td class="tableS"><input type="number" name="cena5" id="cena5"></td>
                                <td class="tableS"><input type="number" name="ilosc5" id="ilosc5"></td>
                                <td class="tableS"><input type="number" name="Vat5" value="23" id="Vat5"></td>
                                <td class="tableS">
                                    <div id="wylicz5"></div>
                                </td>
                                <td class="tableS">
                                    <div id="lacz5"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td><input type="text" name="name6"></td>
                                <td class="tableS"><input type="number" name="cena6" id="cena6"></td>
                                <td class="tableS"><input type="number" name="ilosc6" id="ilosc6"></td>
                                <td class="tableS"><input type="number" name="Vat6" value="23" id="Vat6"></td>
                                <td class="tableS">
                                    <div id="wylicz6"></div>
                                </td>
                                <td class="tableS">
                                    <div id="lacz6"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td><input type="text" name="name7"></td>
                                <td class="tableS"><input type="number" name="cena7" id="cena7"></td>
                                <td class="tableS"><input type="number" name="ilosc7" id="ilosc7"></td>
                                <td class="tableS"><input type="number" name="Vat7" value="23" id="Vat7"></td>
                                <td class="tableS">
                                    <div id="wylicz7"></div>
                                </td>
                                <td class="tableS">
                                    <div id="lacz7"></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    </br>
                    <button type="submit" name="submit">Zatwierdź</button>
            </form>
        </div>















        <main>
            <script src="./js/validation.js" type="text/javascript"></script>

</body>

</html>
