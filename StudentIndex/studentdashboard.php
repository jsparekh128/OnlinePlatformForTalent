<?php
require("config.php");
if(session_status()==PHP_SESSION_NONE)
{
  session_start();
}

 if(isset($_SESSION['StudId']))
  {
$mstudid=$_SESSION['StudId'];
  }

$cmd1=mysqli_query($con,"SELECT count(UploadMasterId) from uploadmaster where StudentId=$mstudid and UploadFileType=1 and isNull=0");
$res1=mysqli_fetch_array($cmd1);
$timage=$res1[0];

$cmd2=mysqli_query($con,"SELECT count(UploadMasterId) from uploadmaster where StudentId=$mstudid and UploadFileType=2 and isNull=0");
$res2=mysqli_fetch_array($cmd2);
$tvideo=$res2[0];

$cmd3=mysqli_query($con,"SELECT count(ParticipationMasterId) from participationmaster where StudentId=$mstudid");
$res3=mysqli_fetch_array($cmd3);
$tevent=$res3[0];

$cmd4=mysqli_query($con,"SELECT count(WinnerMas terId) from winnermaster where StudentId=$mstudid");
$res4=mysqli_fetch_array($cmd4);
$torg=$res4[0];

include("studentheader.php");
?>


 <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                    <div class="card card-statistics">
                        <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                            <i class="fa fa-mortar-board text-info icon-lg"></i>
                            </div>
                            <div class="float-right">
                            <p class="mb-0 text-right">Images Uploaded</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0"><?php echo $timage; ?></h3>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                   
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                    <div class="card card-statistics">
                        <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                            <i class="fa fa-mortar-board text-info icon-lg"></i>
                            </div>
                            <div class="float-right">
                            <p class="mb-0 text-right">Videos Uploaded</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0"><?php echo $tvideo; ?></h3>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                 
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                    <div class="card card-statistics">
                        <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                            <i class="fa fa-mortar-board text-info icon-lg"></i>
                            </div>
                            <div class="float-right">
                            <p class="mb-0 text-right">Events Participation</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0"><?php echo $tevent; ?></h3>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                    <div class="card card-statistics">
                        <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                            <i class="fa fa-mortar-board text-info icon-lg"></i>
                            </div>
                            <div class="float-right">
                            <p class="mb-0 text-right">Winner</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">0</h3>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                 
                     
                        <div class="response"></div>
                        <div id='calendar'></div>
                           
                              
                         
               
    
</div>
</div>

<?php
include("studentfooter.php");
?>
<script>

$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "fetch-event.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: 'add-event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>
