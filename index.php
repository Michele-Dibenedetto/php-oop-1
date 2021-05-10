<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP primi passi</title>
</head>
<body>
    <?php
        ini_set("display_errors", 1);
        class Movie {
            public $title;
            public $producer;
            public $genre;
            private $vote;
            private $duration;
            private $publication_year;

            function __construct($_title, $_producer, $_genre)
            {
                $this->title = $_title;
                $this->producer = $_producer;
                $this->genre = $_genre;
            }


            // SET E GET DI VOTE
            public function setVote($_vote) {
                if ($_vote > 0 && $_vote < 6) {
                    $this->vote = $_vote;
                }
            }

            public function getVote() {
                return $this->vote;
            }

            // SET E GET DI DURATION
            public function setDuration($_duration) {
                if (preg_match("#^\d{1}:\d{2}$#", $_duration)) {  //controllo se il formato della data è del tipo hh:mm
                    $this->duration = $_duration;
                }
            }

            public function getDuration() {
                return $this->duration;
            }

            // SET E GET PUBLICATION YEAR
            public function setPublicationYear($_publication_year) {
                $temp = strval($_publication_year);
                if (strlen($temp) == 4) {
                    $this->publication_year = $_publication_year;
                }
            }

            public function getPublicationYear() {
                return $this->publication_year;
            }


            public function ageMovie() {
                return 2021 - $this->publication_year;
            }
        }

        // INSTANZA DEL PRIMO FILM
        $film1 = new Movie("matrix", "Lana e lilli Wachowski", "fantascenza");
        $film1->setVote(5);
        $film1->setDuration("2:16");
        $film1->setPublicationYear(1999);
        // var_dump($film1);
        
        

        // INSTANZA DEL SECONDO FILM
        $film2 = new Movie("joker", "Todd Phillips", "drammatico");
        $film2->setVote(0);
        $film2->setDuration("2:165");
        $film2->setPublicationYear(2019);
        // var_dump($film2);
        
    ?>
    <h1>FILM 1</h1>
    <?php foreach ($film1 as $key => $detail) { ?> 
        <h3><?php echo $key . ": " . $detail ?></h3>
    <?php } ?>
    <h3>voto: <?php echo $film1->getVote() ?></h3>
    <h3>durata: <?php echo $film1->getDuration() ?></h3>
    <h3>anno publicazione: <?php echo $film1->getPublicationYear() ?></h3>
    <h3>
        <?php if ($film1->getPublicationYear() != NULL) {
                echo "il film ha " . $film1->ageMovie() . " anni";
            }  
        ?>
    </h3>
    <hr>
    <h1>FILM 2</h1>
    <?php foreach ($film2 as $key => $detail) { ?> 
        <h3><?php echo $key . ": " . $detail ?></h3>
    <?php } ?>
    <h3>voto: <?php echo $film2->getVote() ?></h3>
    <h3>durata: <?php echo $film2->getDuration() ?></h3>
    <h3>anno publicazione: <?php echo $film2->getPublicationYear() ?></h3>
    <h3>
        <?php if ($film2->getPublicationYear() != NULL) {
                echo "il film ha " . $film2->ageMovie() . " anni";
            }  
        ?>
    </h3>
</body>
</html>
