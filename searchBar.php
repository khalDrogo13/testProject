<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <div>
            <form>
                <div class="form-group col-xs-6 col-md-2">
                    <select class="form-control">
                        <option disabled selected>State</option>
                        <?php
                					include 'stateList.php';
                				?>
                    </select>
                </div>
                <div class="form-group col-xs-6 col-md-2">
                    <select class="form-control">
                        <option disabled selected>Districts</option>
                        <?php
            							include 'district_list.php';
            						?>
                    </select>
                </div>
                <div class="col-xs-6 col-md-2">
                    <input class="form-control" id="ex1" type="text" placeholder="Enter locality here">
                </div>
                <div class="col-xs-6 col-md-2">
                    <input class="form-control" id="ex1" type="text" placeholder="Enter pincode here">
                </div>
                <div class="search col-xs-10 col-md-3">
                    <input class="form-control" id="ex1" type="text" placeholder="Enter pincode here">
                </div>
                <input class="search btn btn-primary" type="submit" value="Search">
            </form>
        </div>
    </body>
</html>
