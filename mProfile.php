<?php
$title = 'My Profile';

include 'views/header.php';
include 'includes/mProfileController.php';

include 'views/greeting.php';
?>
        <div class="row" style="clear: both;">
            <h4>My Assigned Mentors</h4>
            <?php
            //                print_r($myMentors);
            $s_no = 1;
            foreach ($myMentors as $myMentor)
            {
                ?>
                <span><?php echo " $s_no. " . $myMentor['mentorName'] . '</br>' ?></span>

                <?php
                $s_no++;
            }
            ?>
        </div>

    </div>

<?php
include 'views/footer.php';