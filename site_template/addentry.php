<?php include("topbit.php");

// get genre list from database
$genre_sql = "SELECT * FROM `genre` ORDER BY `genre`.`Genre` ASC";
$genre_query = mysqli_query($dbconnect, $genre_sql);
$genre_rs = mysqli_fetch_assoc($genre_query);

$developer_sql = "SELECT * FROM `developer` ORDER BY `developer`.`DevName` ASC";
$developer_query = mysqli_query($dbconnect, $developer_sql);
$developer_rs = mysqli_fetch_assoc($developer_query);

$app_name = "";
$subtitle = "";
$url = "";
$genreID = "";
$devID = "";
$age = "";
$rating = "";
$rate_count = "";
$cost = "";
$inapp = 1;
$description = "";

$has_errors = "no";

// Code below executes when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get values from form...
    $app_name = mysqli_real_escape_string($dbconnect, $_POST['app_name']);
    
    if ($app_name==""){
        $has_errors = "yes";
    } // end app name has errors else

    $subtitle = mysqli_real_escape_string($dbconnect, $_POST['subtitle']);
    $url = mysqli_real_escape_string($dbconnect, $_POST['url']);
    if($url==""){
        $has_errors = "yes";
    } // end url has errors else
    $genreID = mysqli_real_escape_string($dbconnect, $_POST['genre']);
    
    // if GenreID, is not blank, get genre so that genre box does
    // not lose its value if there are errors
    if ($genreID != "") {
        $genreitem_sql = "SELECT * FROM `genre` WHERE `GenreID` = $genreID";
        $genreitem_query = mysqli_query($dbconnect, $genreitem_sql);
        $genreitem_rs = mysqli_fetch_assoc($genreitem_query);

        $genre = $genreitem_rs['Genre'];

    } // End GenreID if

    else {
        $has_errors = "yes";
    } // end genre has errors else



    $devID = mysqli_real_escape_string($dbconnect, $_POST['devID']);
    
    if ($devID != "") {
        $devitem_sql = "SELECT * FROM `developer` WHERE `DeveloperID` = $devID";
        $devitem_query = mysqli_query($dbconnect, $devitem_sql);
        $devitem_rs = mysqli_fetch_assoc($devitem_query);

        $dev = $devitem_rs['DevName'];

    } // End GenreID if

    else {
        $has_errors = "yes";
    } // end dev has errors else

    $age = mysqli_real_escape_string($dbconnect, $_POST['age']);
    $rating = mysqli_real_escape_string($dbconnect, $_POST['rating']);
    $rate_count = mysqli_real_escape_string($dbconnect, $_POST['rate_count']);
    $cost = mysqli_real_escape_string($dbconnect, $_POST['cost']);
    $inapp = mysqli_real_escape_string($dbconnect, $_POST['in_app']);
    $description = mysqli_real_escape_string($dbconnect, $_POST['description']);
    
    // check for errors
    if ($has_errors == "no") {

        $add_entry_sql = "INSERT INTO `game_details` (`ID`, `Name`, `Subtitle`, 
        `URL`, `GenreID`, `DeveloperID`, `Age`, `User Rating`, 
        `Rating Count`, `Price`, `Purchases`, `Description`) 
        VALUES (NULL, '$app_name', '$subtitle', '$url', $genreID, $devID, $age, 
        $rating, $rate_count, $cost, $inapp, '$description')";
        $add_entry_query = mysqli_query($dbconnect, $add_entry_sql);        
        
        // go to success page
        // header('Location: add_success.php');
    }

    // Get ID for next page
    $getid_sql = "SELECT * FROM `game_details` WHERE 
    `Name` LIKE '$app_name' AND 
    `Subtitle` LIKE '$subtitle' AND 
    `URL` LIKE '$url' AND
    `GenreID` = $genreID AND
    `DeveloperID` = $devID AND
    `Age` = $age AND
    `User Rating` = $rating AND
    `Rating Count` = $rate_count AND
    `Price` = $cost AND
    `Purchases` = $inapp";

    $getid_query = mysqli_query($dbconnect, $getid_sql);
    $getid_rs = mysqli_fetch_assoc($getid_query);

    echo $app_name;
    echo $subtitle;
    echo $url;
    echo $genreID;
    echo $devID;
    echo $age;
    echo $rating;
    echo $rate_count;
    echo $cost;
    echo $inapp;

    $ID = $getid_rs['ID'];
    $_SESSION['ID'] = $ID;

    echo "ID: ".$ID;

} // end of button submitted code

?>           
            
        <div class="box main">
            <div class="add-entry">
            
            <h2>Add An Entry</h2>
            
            <form method="post" enctype="multipart/form-data"
            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

            <!-- App Name (Required) -->
            <input class="add-field" type="text" name="app_name" value="<?php echo $app_name; ?>" placeholder="App Name (required) ..."/>

            <!-- Subtitle (optional) -->
            <input class="add-field" type="text" name="subtitle" value="<?php echo $subtitle; ?>" placeholder="Subtitle (optional) ..."/>
            
            <!-- URL (required, must start http://) -->
            <input class="add-field" type="text" name="url" value="<?php echo $url; ?>" placeholder="URL (required) ..."/>
            
            <!-- Genre dropdown (required) -->
            <select class="adv" name="genre">
                <?php 
                if ($genreID == "") {
                    ?>
                    <option value="" selected>Genre...</option>
                <?php
                }

                else {
                    ?>
                <option value="<?php echo $genreID?>"><?php echo $genre; ?></option>
                <?php
                }
                ?>

            <!-- get options from database -->
            <?php
            do {
            ?>

            <option value="<?php echo $genre_rs['GenreID']; ?>"><?php echo $genre_rs['Genre']; ?></option>

            <?php
            } // end genre do loop

            while ($genre_rs = mysqli_fetch_assoc($genre_query))
            
            ?>

            </select>
            
            <!-- Developer Name (required) -->
            <select class="add-field" name="devID">
            
            <?php
            if ($devID == "") {
                ?>
                <option value="" selected>Developer...</option>
            <?php
            }

            else {
                ?>
            <option value="<?php echo $devID?>"><?php echo $dev; ?></option>
            <?php
            }
            ?>

            <!-- get options from database -->
            <?php
            do {
            ?>

            <option value="<?php echo $developer_rs['DeveloperID']; ?>"><?php echo $developer_rs['DevName']; ?></option>

            <?php
            } // end genre do loop

            while ($developer_rs = mysqli_fetch_assoc($developer_query))
            
            ?>

            </select>
            
            <!-- Age (set to 0 if left blank) -->
            <input class="add-field" type="text" name="age" value="<?php echo $age; ?>" placeholder="Age" />
            
            <!-- Rating (Number between 0 - 5, 1 dp) -->
            <div>
                <input class="add-field" type="text" name="rating" value="<?php echo $rating; ?>" placeholder="Rating (0-5)" />
            </div>

            <!-- # of ratings (integer more than 0) -->
            <input class="add-field" type="text" name="rate_count" value="<?php echo $rate_count; ?>" placeholder="# of Ratings" />
            
            <!-- Cost (Decimal 2dp, must be more than 0) -->
            <input class="add-field" type="text" name="cost" value="<?php echo $cost; ?>" placeholder="Cost" />
            
            <!-- In App Purchase radio buttons -->
            <br />
            <br />

            <div>
            <b>In App Purchase: </b>

            <!-- defaults to 'yes' -->
            <!-- NOTE: value in database is boolean, so 'no' becomes 0 and 'yes' becomes 1 -->
            <?php
            if($inapp==1) {
            // Default value, 'yes' is selected
            ?>
            <input type="radio" name="in_app" value="1" checked="checked"/>Yes
            <input type="radio" name="in_app" value="0"/>No
            <?php
            } // end 'yes in_app if

            else{
                ?>
                <input type="radio" name="in_app" value="1" />Yes
                <input type="radio" name="in_app" value="0" checked="checked" />No
            <?php
            } // end 'in_app' else
            ?>
            </div>
            
            <!-- Description text area -->
            <br />
            <textarea class="add-field" name="description" value="<?php echo $description; ?>" placeholder="Description..." rows="6"><?php echo $description; ?></textarea>
            
            <!-- Submit Button -->
            <p>
                <input class="submit advanced-button" type="submit" value="Submit" />
            </p>

            </form>

        
            </div> <!-- / add entry -->
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>