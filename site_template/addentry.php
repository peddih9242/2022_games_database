<?php include("topbit.php");

// get genre list from database
$genre_sql = "SELECT * FROM `genre` ORDER BY `genre`.`Genre` ASC";
$genre_query = mysqli_query($dbconnect, $genre_sql);
$genre_rs = mysqli_fetch_assoc($genre_query);

$app_name = "";
$subtitle = "";
$url = "";
$genreID = "";
$dev_name = "";
$age = "";
$rating = "";
$rate_count = "";
$cost = "";
$inapp = 1;
$description = "";

$has_error = "no";

// Code below executes when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "You pushed the button";
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
                <option value="" selected>Genre...</option>

                <!-- get options from database -->

            </select>
            
            <!-- Developer Name (required) -->
            <input class="add-field" type="text" name="dev_name" value="<?php echo $dev_name; ?>" placeholder="Dev Name (required) ..."/>
            
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

            <!-- Description text area -->
            <input class="add-field" type="text" name="description" value="<?php echo $description; ?>" placeholder="Description (required) ..."/>
            
            <!-- Submit Button -->
            <p>
                <input class="submit advanced-button" type="submit" value="Submit" />
            </p>

            </form>

        
            </div> <!-- / add entry -->
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>