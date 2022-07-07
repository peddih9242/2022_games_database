<?php include("topbit.php");

    $find_sql = "SELECT * FROM `game_details`
    JOIN genre ON (game_details.GenreID = genre.GenreID)
    JOIN developer ON (`game_details`.`DeveloperID` = `developer`.`DeveloperID`)
    
    ";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>           
            
        <div class="box main">
            <h2>All Results</h2>
            
            
            <?php 
            
            if($count < 1) {

                ?>
            <div class="error">

                Sorry! There are no results that match your search.
                Please use the search box in the side bar to try again.
            
            </div> <!-- end error  -->

            <?php
            } // end no results if

            else {
                do
                {

                ?>

                <!-- results go here -->
                <div class="results">
                    <span class="sub_heading">
                        <a href="<?php echo $find_rs['URL']; ?>">
                            <?php echo $find_rs['Name']; ?>
                        </a>
                    </span>

                <p>
                    <b>Genre</b>:
                    <?php echo $find_rs['Genre']; ?>

                    <br />

                    <b>Developer</b>:
                    <?php echo $find_rs['DevName']; ?>

                    <br />
                
                    <b>Rating</b>:
                    <?php echo $find_rs['User Rating']; ?>
                    - Based off <?php echo $find_rs['Rating Count']; ?> votes
                    
                
                <hr />
                <?php echo $find_rs['Description']; ?>

                </p>
                    
                </div> <!-- end of results -->

                <br />

                <?php

                } // end results do 

                while ($find_rs=mysqli_fetch_assoc($find_query));

            } // end of else
            ?>
            

            
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>