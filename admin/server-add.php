<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>


<div class="section white-text" style="background: #B35458;">

	<div class="section">
		<h3>Add Servers</h3>
	</div>


    <div class="section center" style="padding: 40px;">

        <form action="../backends/admin/server-add.php" method="post">

            <?php

            if (isset($_SESSION['msg'])) {
                echo '<div class="row" style="background: red; color: white;">
                <div class="col s12">
                    <h6>'.$_SESSION['msg'].'</h6>
                    </div>
                </div>';
                unset($_SESSION['msg']);
            }

            ?>

            <div class="row">
            <div class="col s6" style="">
                            <div class="input-field">
                            <input id="s_id" name="s_id" type="text" class="validate" style="color: white; width: 70%">
                            <label for="s_id" style="color: white;"><b>Server Id :</b></label>
                            </div>
                </div>
                <div class="col s6" style="">
                            <div class="input-field">
                            <input id="s_name" name="s_name" type="text" class="validate" style="color: white; width: 70%">
                            <label for="s_name" style="color: white;"><b>Server Name :</b></label>
                            </div>
                </div>
                <div class="col s6" style="">
                            <div class="input-field">
                            <input id="s_age" name="s_age" type="text" class="validate" style="color: white; width: 70%">
                            <label for="s_age" style="color: white;"><b>Age :</b></label>
                            </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12">

                <div class="input-field">
                <input id="s_phone" name="s_phone" type="text" class="validate" style="color: white; width: 70%">
                <label for="s_phone" style="color: white;"><b>Phone :</b></label>
                </div>
                
                </div>
            
            </div>

            <div class="row">
                <div class="col s12">
                    <div class="section right" style="padding: 15px 10px;">
                        <a href="category-list.php" class="waves-effect waves-light btn">Dismiss</a>
                    </div>
                    <div class="section right" style="padding: 15px 20px;">
                        <button type="submit" class="waves-effect waves-light btn">Add New</button>
                    </div>
                </div>
            </div>

        </form>


    </div>

</div>

<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>