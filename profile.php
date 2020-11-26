<?php
$title = 'My Profile';

include 'views/header.php';
include 'includes/ProfileController.php';

include 'views/greeting.php';
?>

    <div class="row" style="clear: both;">
        <h4>My Assigned Mentees</h4>
        <?php
        //                print_r($myMentors);
        $s_no = 1;
            foreach ($myMentees as $myMentee)
            {
        ?>
            <span><?php echo " $s_no. " . $myMentee['menteeName'] . '</br>' ?></span>

        <?php
            $s_no++;
        }
        ?>

        </div>
    </div>

<?php
include 'views/footer.php';
