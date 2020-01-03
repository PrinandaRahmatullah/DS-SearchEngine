<?php
// include_once "machine.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Search Engine</title>
</head>

<body>
    <div class="col-md-12 center">
        <div class="container">
            <form action="index.php" method="GET">
                <div class="form-row gambar">
                    <img src="images/image.png" alt="">
                </div>
                <div class="form-row inputan">
                    <div class="form-group col-lg-4">
                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keyword" required>
                    </div>
                    <div class="form-group col-lg-2">
                        <select class="custom-select mr-sm-2" name="number" id="inlineFormCustomSelect">
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-1">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="container">
        <div class="container col-md-12 konten">
            <?php
                $keyword = $_GET["keyword"];
                $number = $_GET["number"];

                $output = shell_exec('python3 query.py ' . $number . ' ' . $keyword);
                // echo $output;
                $json = json_decode($output);

                foreach ($json as $obj) {
                    $doc = $obj->doc;
                    $fp = file('data/crawling/' . $doc);

                    $fill = $fp[1];
                    $title = $fp[0];
                    $url = $obj->url;

                    echo "<p><a href='$url' id='judul'>".$title."</a><br><span id='link'>".$url."</span><br><span id='fill'>".$fill." ...</span></p>";
                }
            ?>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>