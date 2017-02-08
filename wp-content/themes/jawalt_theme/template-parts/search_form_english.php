
<h2>Search</h2>
<div class="row">
    <form id="test" action="search/" method="post">


        <div class="col-sm-4">
            <div class="form-group">
                <label for="disabledTextInput">Type Your Destination</label>
                <input type="text" name="your_destination" value="" class="form-control" placeholder="Type Your Destination">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="disabledTextInput">All Destination</label>
                <select name="All_Destination" class="form-control"  >
                    <option value="all" >All Destination</option>
                    <?php
                    foreach ($SelectItems['destination'] as $place) {
                        $destination_explode = ( explode( "_", $place ) );
                        $city                = $destination_explode[0];
                        $post_id             = $destination_explode[1];
                        ?>
                        <option value="<?php echo $post_id; ?>" ><?php echo ucwords($city); ?></option>
                    <?php }	?>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="disabledTextInput">All Typologies</label>
                <select name="All_package" class="form-control"  >
                    <option value="all" >All Typologies</option>
                    <?php
                    foreach ($SelectItems['package_type'] as $packages) {
                        $explode_pkg = ( explode( "_", $packages ) );
                        $package_type        = $explode_pkg[0];
                        $post_id             = $explode_pkg[1];
                        ?>
                        <option value="<?php echo $post_id; ?>" ><?php echo ucwords($package_type); ?></option>
                    <?php }	?>
                </select>

            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="disabledTextInput">All Duration</label>
                <select name="All_duration" class="form-control"  >
                    <option value="all" >All Duration</option>
                    <option value="3" >1 - 3 Days</option>
                    <option value="6" >3 - 6 Days</option>
                    <option value="9" >6 - 9 Days</option>
                </select>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group col-sm-6">
                <label for="disabledTextInput">Date From </label>
                <input type="date"  min="2012-01-01" max="2013-01-01"  name="from_date" value="" class="form-control" >
            </div>
            <div class="form-group col-sm-6">
                <label for="disabledTextInput">Date To </label>
                <input type="date"  name="to_date" value=""  class="form-control">
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group col-sm-6">
                <label for="disabledTextInput">Price From </label>
                <input type="text"  name="price_from" value="" class="form-control " placeholder="Price From">
            </div>
            <div class="form-group col-sm-6">
                <label for="disabledTextInput">Price To </label>
                <input type="text"  name="price_to" value=""  class="form-control " placeholder="Price To">
            </div>
        </div>

        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="disabledTextInput">&nbsp;</label>
                <input type="submit"  class="btn btn-primary btn-lg btn-block" name="Search" value="Search">
            </div>
        </div>
        <div class="col-sm-4"></div>
    </form>

</div>
