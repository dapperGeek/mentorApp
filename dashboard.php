<?php
$title = 'My Dashboard';

include 'views/header.php';
include 'includes/DashboardController.php';

include 'views/greeting.php';
?>

        <table class="list-table">
            <thead>
                <tr>
                    <td>Full Name</td>
                    <td>Username</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>

            <?php
            foreach ($getMentees as $mentee)
            {
            ?>
                <tr>
                    <td><?php echo $mentee['name'] ?></td>
                    <td><?php echo $mentee['username'] ?></td>
                    <td><a href="assign.php?id=<?php echo $mentee['id'] ?>">Assign Mentors</a></td>
                </tr>
            <?php
               }
            ?>
            </tbody>
        </table>

    </div>

<?php
include 'views/footer.php';
