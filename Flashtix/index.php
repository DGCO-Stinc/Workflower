<?php
	require_once("session.php");
	
	require_once("class.user");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM bp5login WHERE userID=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <link rel="stylesheet" href="flashtix.css">
    <script src="flashtix.js"></script>
    <title>Flash Tix</title>
</head>

<body>
    <div data-role="page" class="page" id="homepage">
        <div class="header" data-role="header" data-theme="b">
            <div class="ui-grid-b">
                <div class="ui-block-a">
                    <a class="knop" href="#homepage" data-role="button" data-icon="home" data-iconpos="left">Home</a>
                </div>
                <div class="ui-block-b">
                    <a class="knop" href="#homepage" data-role="button">Welkom</a>
                </div>
                <div class="ui-block-c">
                    <a class="knop" href="#lastminutepage" data-role="button" data-icon="arrow-r"
                        data-iconpos="left">Lastminute</a>
                </div>
            </div>
        </div>


        <div class="content" id="homecontent" data-role="content">
            <br><br>
            <h1>Flashtix</h1>
            <img id="poster" class="poster" src="img/BLØF_ZIGGO-1180x490.jpg" alt="*">
        </div>

        <div class="footer" data-role="footer" data-theme="b">
            <div class="nav" data-role="controlgroup">
                <div class="ui-grid-b">
                    <div class="ui-block-a">
                        <a class="knop" href="#agendapage" data-role="button" data-icon="grid"
                            data-iconpos="left">Agenda</a>
                    </div>
                    <div class="ui-block-b">
                        <a class="knop" href="#locatiepage" data-role="button" data-icon="search"
                            data-iconpos="left">Locaties</a>
                    </div>
                    <div class="ui-block-c">
                        <a class="knop" href="logout.php?logout=true" data-role="button" data-icon="home"
                            data-iconpos="left">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div data-role="page" id="lastminutepage">
        <div class="header" data-role="header" data-theme="b">
            <div class="ui-grid-b">
                <div class="ui-block-a">
                    <a class="knop" href="#homepage" data-role="button" data-icon="home" data-iconpos="left">Vorige</a>
                </div>
                <div class="ui-block-b">
                    <a class="knop" href="#homepage" data-role="button">Home</a>
                </div>
                <div class="ui-block-c">
                    <a class="knop" href="#bestelpage" data-role="button" data-icon="arrow-r"
                        data-iconpos="left">Bestel</a>
                </div>
            </div>
        </div>
        <div data-role="content" class="content" id="lastminutecontent"><br>
            <ul data-role="listview">
                <li id="pop" data-role="list-divider" data-theme="b">POP</li>
                <li id="shakira-concert">
                    <a href="#shakira-biopage">
                        <img class="poster" src="img/shakiraposter.png">
                        <h3>Shakira</h3>
                        <p>Amsterdam</p>
                        <p>Vandaag 22:00 uur</p>
                    </a>
                    <a href="#jennifer-biopage" data-transition="flip"></a>
                </li>
                <li id="jennifer-concert">
                    <a href="#jennifer-biopage">
                        <img class="poster" src="img/jenniferposter.jpg">
                        <h3>Jennifer Lopez</h3>
                        <p>Heiniken concert hall Amsterdam</p>
                        <p>Vandaag 22:30 uur</p>
                    </a>
                    <a href="#-biopage" data-transition="flip"></a>
                </li>
                <li id="jazz" data-role="list-divider" data-theme="b">JAZZ</li>
                <li id="nora-concert">
                    <a href="#nora-biopage">
                        <img class="poster" src="img/noraposter.jpg">
                        <h3>Nora</h3>
                        <p>Bimhuis Amsterdam</p>
                        <p>Vandaag 22:00 uur</p>
                    </a>
                    <a href="nora-biopage" data-transition="flip"></a>
                </li>
                <li id="Rock" data-role="list-divider" data-theme="b">ROCK</li>
                <li id="bruce-concert">
                    <a href="#bruce-biopage">
                        <img class="poster" src="img/bruceposter.jpg">
                        <h3>Bruce Springsteen</h3>
                        <p>Melkweg Amsterdam</p>
                        <p>Vandaag 22:00 uur</p>
                    </a>
                    <a href="#bruce-biopage" data-transition="flip"></a>
                </li>
            </ul>
            <!--/listview-->
        </div>
        <!--/content-->
    </div>

    <div data-role="page" class="page" id="shakira-biopage">
        <div class="header" data-role="header" data-theme="b">
            <div class="ui-grid-b">
                <div class="ui-block-a">
                    <a class="knop" href="#lastminutepage" data-role="button" data-icon="home"
                        data-iconpos="left">Vorige</a>
                </div>
                <div class="ui-block-b">
                    <a class="knop" href="#homepage" data-role="button">Home</a>
                </div>
                <div class="ui-block-c">
                    <a class="knop" href="#bestel" data-role="button" data-icon="arrow-r"
                        data-iconpos="left">E-tickets</a>
                </div>
            </div>
        </div>
        <div data-role="content">
            <video controls="controls" width="90%" preload id="video" poster="img/shakiraposter.png">
                <source src="img/shakira.mp4" type="video/mp4">
                <p>add content...</p>
            </video>
        </div>
        <div class="footer" data-role="footer" data-theme="b">
            <div class="nav" data-role="controlgroup">
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <a class="knop" href="#agendapage" data-role="button" data-icon="grid"
                            data-iconpos="left">Agenda</a>
                    </div>
                    <div class="ui-block-b">
                        <a class="knop" href="#locatiepage" data-role="button" data-icon="search"
                            data-iconpos="left">Locaties</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--einde shakira-biopage-->

    <div data-role="page" class="page" id="jennifer-biopage">
        <div class="header" data-role="header" data-theme="b">
            <div class="ui-grid-b">
                <div class="ui-block-a">
                    <a class="knop" href="#lastminutepage" data-role="button" data-icon="home"
                        data-iconpos="left">Vorige</a>
                </div>
                <div class="ui-block-b">
                    <a class="knop" href="#homepage" data-role="button">Home</a>
                </div>
                <div class="ui-block-c">
                    <a class="knop" href="#bestel" data-role="button" data-icon="arrow-r"
                        data-iconpos="left">E-tickets</a>
                </div>
            </div>
        </div>
        <div data-role="content">
            <video controls="controls" width="90%" preload id="video" poster="img/jenniferposter.jpg">
                <source src="img/jennifer.mp4" type="video/mp4">
                <p>add content...</p>
            </video>
        </div>
        <div class="footer" data-role="footer" data-theme="b">
            <div class="nav" data-role="controlgroup">
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <a class="knop" href="#agendapage" data-role="button" data-icon="grid"
                            data-iconpos="left">Agenda</a>
                    </div>
                    <div class="ui-block-b">
                        <a class="knop" href="#locatiepage" data-role="button" data-icon="search"
                            data-iconpos="left">Locaties</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--einde jennifer-biopage-->

    <div data-role="page" class="page" id="nora-biopage">
        <div class="header" data-role="header" data-theme="b">
            <div class="ui-grid-b">
                <div class="ui-block-a">
                    <a class="knop" href="#lastminutepage" data-role="button" data-icon="home"
                        data-iconpos="left">Vorige</a>
                </div>
                <div class="ui-block-b">
                    <a class="knop" href="#homepage" data-role="button">Home</a>
                </div>
                <div class="ui-block-c">
                    <a class="knop" href="#bestel" data-role="button" data-icon="arrow-r"
                        data-iconpos="left">E-tickets</a>
                </div>
            </div>
        </div>
        <div data-role="content">
            <video controls="controls" width="90%" preload id="video" poster="img/noraposter.jpg">
                <source src="img/nora.mp4" type="video/mp4">
                <p>add content...</p>
            </video>
        </div>
        <div class="footer" data-role="footer" data-theme="b">
            <div class="nav" data-role="controlgroup">
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <a class="knop" href="#agendapage" data-role="button" data-icon="grid"
                            data-iconpos="left">Agenda</a>
                    </div>
                    <div class="ui-block-b">
                        <a class="knop" href="#locatiepage" data-role="button" data-icon="search"
                            data-iconpos="left">Locaties</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--einde nora-biopage-->

    <div data-role="page" class="page" id="bruce-biopage">
        <div class="header" data-role="header" data-theme="b">
            <div class="ui-grid-b">
                <div class="ui-block-a">
                    <a class="knop" href="#lastminutepage" data-role="button" data-icon="home"
                        data-iconpos="left">Vorige</a>
                </div>
                <div class="ui-block-b">
                    <a class="knop" href="#homepage" data-role="button">Home</a>
                </div>
                <div class="ui-block-c">
                    <a class="knop" href="#bestel" data-role="button" data-icon="arrow-r"
                        data-iconpos="left">E-tickets</a>
                </div>
            </div>
        </div>
        <div data-role="content">
            <video controls="controls" width="90%" preload id="video" poster="img/bruceposter.jpg">
                <source src="img/bruce.mp4" type="video/mp4">
                <p>add content...</p>
            </video>
        </div>
        <div class="footer" data-role="footer" data-theme="b">
            <div class="nav" data-role="controlgroup">
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <a class="knop" href="#agendapage" data-role="button" data-icon="grid"
                            data-iconpos="left">Agenda</a>
                    </div>
                    <div class="ui-block-b">
                        <a class="knop" href="#locatiepage" data-role="button" data-icon="search"
                            data-iconpos="left">Locaties</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--einde bruce-biopage-->

    <div data-role="page" id="bestelpage" class="page">
        <div class="header" data-role="header" data-theme="b">
            <div class="ui-grid-b">
                <div class="ui-block-a">
                    <a class="knop" href="#lastminutepage" data-role="button" data-icon="home"
                        data-iconpos="left">Vorige</a>
                </div>
                <div class="ui-block-b">
                    <a class="knop" href="#homepage" data-role="button">Home</a>
                </div>
                <div class="ui-block-c">
                    <a class="knop" href="#bestel" data-role="button" data-icon="arrow-r"
                        data-iconpos="left">E-tickets</a>
                </div>
            </div>
        </div>
        <div data-role="content" class="content">
            <form name="form" id="form">
                <p style="font-size: 15px;">Kies een concert</p>
                <input type="radio" name="concert" value="shakira">
                <label for="shakira">Shakira</label>
                <input type="radio" name="concert" value="jennifer">
                <label for="jennifer">Jennifer Lopez</label>
                <input type="radio" name="concert" value="nora">
                <label for="nora">Nora</label>
                <input type="radio" name="concert" value="bruce">
                <label for="bruce">Bruce Springstien</label><br>
                <label for="aantal">Aantal Sterren</label>
                <input type="range" name="aantal" id="aantal" min="1" max="3">
                <div data-role="fieldcontain">
                    <input class="required" type="text" id="name" name="name" placeholder="Type hier je naam">
                    <input class="required" type="tel" id="mobiel" name="mobiel" placeholder="Mobiele Nummer: +31 6~" pattern="[0-9]{2} [0-9]{1} [0-9]{8}">
                    <input class="required" type="email" id="email" name="email" placeholder="E-mail: voorbeeld@mail.nl" size="30">
                    <input type="text" name="plaats" id="plaats" list="steden" placeholder="Woonplaats">
                    <datalist id="steden">
                        <option value="Almere"></option>
                        <option value="Amstelveen"></option>
                        <option value="Amstredam"></option>
                        <option value="Den Haag"></option>
                        <option value="Hilversum"></option>
                        <option value="Leeuwarden"></option>
                        <option value="Maastricht"></option>
                        <option value="Naarden"></option>
                        <option value="Utrecht"></option>
                    </datalist>
                    <label for="minderjarig">Minderjarig:</label>
                    <select name="slider" id="minderjarig" data-role="slider" data-mini="true">
                        <option value="nee">Nee</option>
                        <option value="ja">Ja</option>
                    </select><br><br><br>
                    <textarea name="reactie" id="reactie" cols="35" rows="4" placeholder="mail ons je reactie"></textarea>
                    <div data-role="controlgroup">
                        <p style="font-size: 15px;">Kies een gratis Abonnement</p>
                        <input type="checkbox" name="news" id="news">
                        <label for="news">FlashTixNewsLetter</label>
                        <input type="checkbox" name="gids" id="gids">
                        <label for="gids">Uitgids</label>
                        <input type="checkbox" name="fest" id="fest">
                        <label for="fest">Festival Gids</label>
                    </div><!--einde controlgroup-->
                </div><!--einde fieldcontain-->
            <input type="submit" id="submit" value="verzend">
        </form><!--einde formulier-->
        </div><!--/content-->
        <div class="footer" data-role="footer" data-theme="b">
            <div class="nav" data-role="controlgroup">
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <a class="knop" href="#agendapage" data-role="button" data-icon="grid"
                            data-iconpos="left">Agenda</a>
                    </div>
                    <div class="ui-block-b">
                        <a class="knop" href="#locatiepage" data-role="button" data-icon="search"
                            data-iconpos="left">Locaties</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--einde bestelpage-->
</body>

</html>