<?php include("topbit.php");

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
            <input class="add-field" type="text" name="app_name" required value="<?php echo $app_name; ?>" placeholder="App Name (required) ..."/>


            <!-- Subtitle (optional) -->

            <!-- URL (required, must start http://) -->
            
            <!-- Genre dropdown (required) -->

            <!-- Developer Name (required) -->

            <!-- Age (set to 0 if left blank) -->

            <!-- Rating (Number between 0 - 5, 1 dp) -->

            <!-- # of ratings (integer more than 0) -->

            <!-- Cost (Decimal 2dp, must be more than 0) -->

            <!-- In App Purchase radio buttons -->

            <!-- Description text area -->

            <!-- Submit Button -->
            
            <p>
                <input class="submit advanced-button" type="submit" value="Submit" />
            </p>

            </form>

        
            </div> <!-- / add entry -->
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>