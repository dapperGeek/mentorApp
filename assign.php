<?php
include 'views/header.php';
$menteeID = $_GET['id'];

$menteeInfo = $dataOps->getMentee($menteeID);
$assignedMentors = $dataOps->getAssignedMentors($menteeID);
$unAssignedMentors = $dataOps->getUnassignedMentors($menteeID);

include 'includes/AssignController.php';
include 'views/greeting.php';
?>

   <div class="row row-cols-1">
       <h3>Assigned Mentors For <?php echo $menteeInfo['name'] ?></h3>
       <?php
       $s_no = 1;
       if ($assignedMentors !== [])
       {
           foreach ($assignedMentors as $mentor)
           {
               echo $s_no . '. ' . $mentor['mentorName'] . '</br>';
               $s_no++;
           }
       }
       else
       {
           echo '<p>No mentor assigned yet</p>';
       }
       ?>
   </div>

   <div class="row">
       <h4>Assign New Mentors</h4>

       <table class="list-table">
           <thead>
           <tr>
               <td>Name</td>
               <td>Action</td>
           </tr>
           </thead>

           <tbody>
           <?php
                if ($unAssignedMentors !== [])
                {
                    $serial = 0;
                    foreach ($unAssignedMentors as $noMentor)
                    {
            ?>
                        <tr>
                            <td><?php echo $noMentor['name'] ?></td>
                            <td><button onclick="assingMentor(<?php echo $noMentor['id'] ?>, <?php echo $menteeID ?>)">Assign</button></td>
                        </tr>
            <?php
                        $serial++;
                    }
                }
                else{
            ?>
                    <tr>
                        <td colspan="2">
                            No Unassigned Mentor To Assign.
                        </td>
                    </tr>
           <?php
                }
           ?>
           </tbody>
       </table>
   </div>
</div>
