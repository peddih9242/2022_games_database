<?php include("topbit.php");

    // get information from form...
    $app_name = mysqli_real_escape_string($dbconnect, $_POST['app_name']);
    $developer = mysqli_real_escape_string($dbconnect, $_POST['developer']);
    $genre = mysqli_real_escape_string($dbconnect, $_POST['genre']);
    $cost = mysqli_real_escape_string($dbconnect, $_POST['cost']);
    
    // In app purchases...
    if (isset($_POST['in_app'])) {
        $in_app = 0;
    } // end if isset

    else {
        $in_app = 1;
    } // end else

    // Ratings
    $rating_more_less = mysqli_real_escape_string($dbconnect, $_POST['rating_more_less']);
    $rating = mysqli_real_escape_string($dbconnect, $_POST['rating']);

    if ($rating_more_less == "higher") {
        $rate_op = ">=";
    }

    elseif ($rating_more_less == "lower") {
        $rate_op = "<=";
    }

    elseif ($rating_more_less == "equal") {
        $rate_op = "=";
    }

    else {
        $rate_op = "<=";
        $rating = 0;
    } // end rating if / elseif / else

    // Age
    $age_more_less = mysqli_real_escape_string($dbconnect, $_POST['age_more_less']);
    $age = mysqli_real_escape_string($dbconnect, $_POST['age']);

    if ($age_more_less == "higher") {
        $age_op = ">=";
    }

    elseif ($age_more_less == "lower") {
        $age_op = "<=";
    }

    else {
        $age_op = "<=";
        $age = 0;
    } // end rating if / elseif / else

    // Cost (handling when not specified)

    if ($cost == "") {
        $cost_op = ">=";
        $cost = 0;
    }
    else {
        $cost_op = "<=";
    }

    $find_sql = "SELECT * FROM `game_details`
    JOIN genre ON (game_details.GenreID = genre.GenreID)
    JOIN developer ON (`game_details`.`DeveloperID` = `developer`.`DeveloperID`)
    WHERE `Name` LIKE '%$app_name%'
    AND `DevName` LIKE '%$developer%'
    AND `Genre` LIKE '%$genre%'
    AND `Price` $cost_op '$cost'
    AND (`Purchases` = $in_app OR `Purchases` = 0)
    AND `User Rating` $rate_op '$rating'
    AND `Age` $age_op '$age'
    ";

    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>
            
        <div class="box main">
            <h2>Advanced Search Results</h2>

            
        <?php include("results.php"); ?>
            
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>