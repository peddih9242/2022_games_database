<div class="box side">
           
<h2>Add an App | <a class="side" href="showall.php">Show All</a></h2>

<form class="searchform" method="post" action="name_dev.php" enctype="multipart/form-data">

    <input class="search" type="text" name="dev_name" size="30" value="" required placeholder="App Name / Developer Name..."/>
    
    <input class="submit" type="submit" name="find_dev_name" value="&#xf002;" />

</form>

<form class="searchform" method="post" action="free.php" enctype="multipart/form-data">

    <input class="submit free" type="submit" name="free" value="Free with no In App Purchase &nbsp; &#xf002;" />

</form>

<br />
<hr />
<br />

<div class="advanced-frame">

<form class="searchform" method="post" action="advanced.php" enctype="multipart/form-data">

<input class="adv" type="text" name="app_name" size="30" value="" placeholder="App Name / Title..."/>

<input class="adv" type="text" name="developer" size="30" value="" placeholder="Developer..."/>

<!-- Genre Dropdown -->

<select class="search adv" name="genre">

<option value="" selected>Genre...</option>

<!-- get options from database -->
<?php
    $genre_sql = "SELECT * FROM `genre` ORDER BY `genre`.`Genre` ASC";
    $genre_query = mysqli_query($dbconnect, $genre_sql);
    $genre_rs = mysqli_fetch_assoc($genre_query);

    do {
        ?>

    <option value="<?php echo $genre_rs['Genre']; ?>"><?php echo $genre_rs['Genre']; ?></option>

    <?php
    } // end genre do loop

    while ($genre_rs = mysqli_fetch_assoc($genre_query))

    ?>

</select>

<!-- Cost -->
<div class="flex-container">

    <div class="adv-txt">
        Cost&nbsp;(less&nbsp;than):
    </div> <!-- / cost label -->
    <div>
        <input class="adv" type="text" name="cost" size="30" value="" placeholder="$..." />
    </div> <!-- / cost input box -->

</div> <!-- / cost flexbox -->

<!-- In app purchase checkbox -->

<input class="adv-txt" type="checkbox" name="in_app" value="0" />No In App Purchase

<!-- Age -->

<div class="flex-container">
    <div class="adv-txt">Age</div> <!-- / age label -->
    <div>
        <select class="search adv" name="age_more_less">
            <option value="" selected>Choose</option>
            <option value="higher">Larger than</option>
            <option value="lower">Lower than</option>
        </select>

    </div> <!-- / age drop down -->
    
    <div>
        <input class="adv" type="text" name="age" size="3" value="" placeholder="" />
    </div> <!-- / age amount -->


</div> <!-- / age flexbox -->

<!-- Rating -->

<div class="flex-container">
    <div class="adv-txt">Rating</div> <!-- / rating label -->
    <div>
        <select class="search adv" name="rating_more_less">
            <option value="" selected>Choose</option>
            <option value="higher">Larger than</option>
            <option value="equal">Equal to</option>
            <option value="lower">Lower than</option>
        </select>

    </div> <!-- / rating drop down -->
    
    <div>
        <input class="adv" type="text" name="rating" size="3" value="" placeholder="" />
    </div> <!-- / rating amount -->

</div> <!-- / rating flexbox -->

<input class="submit advanced-button" type="submit" name="advanced" value="Search &nbsp; &#xf002;" />

</form>

</div> <!-- / advanced frame -->

 
</div> <!-- / side bar -->

<div class="box footer">
 CC HP 2022
</div> <!-- / footer -->
     

</div> <!-- / wrapper -->

 
</body>