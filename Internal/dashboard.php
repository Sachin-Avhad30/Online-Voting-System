<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location:../");
}

$userdata = $_SESSION['userdata'];

$groupsdata = $_SESSION['groupsdata'];

if($_SESSION['userdata']['status']==0){
    $status='<b style="color:red">Not Voted</b>';

}
else{
    $status='<b style="color:green"> Voted</b>';
}
?>


<html lang="en">

<head>
    <title>Online Voting System -Dashboard</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <style>
        #backbtn {
            padding: 5px;
            border-radius: 5px;
            background-color: blue;
            color: white;
            float: left;
            margin: 10px;
        }

        #logoutbtn {
            padding: 5px;
            border-radius: 5px;
            background-color: blue;
            color: white;
            float: right;
            margin: 10px;
        }

        #profile {
            background-color: white;
            width: 20%;
            padding: 10px;
            float: left;
            ;
        }

        #group {
            background-color: white;
            width: 70%;
            padding: 10px;
            float: right;
        }

        #votebtn {
            padding: 5px;
            border-radius: 5px;
            background-color: blue;
            color: white;

        }

        #mainpannel {
            padding: 10px;
        }

        #headerSection{
            padding: 10px;
        }

        #voted{
            padding: 5px;
            border-radius: 5px;
            background-color: green;
            color: white;
        }
    </style>
    <div id="mainSection">
        <center>
            <div id="headerSection">
                <a href="../"><button id="backbtn"> back</button></a>
                <a href="logout.php"><button id="logoutbtn"> Logout</button></a>
                <h1>Online Voting System</h1>
            </div>
        </center>
        <hr>

        <div id="mainpannel">
            <div id="profile">
                <center><img src="../uploads/<?php echo $userdata['photo'] ?>" height="100" width="100" alt=""></center><br><br>
                <b>Name:</b><?php echo $userdata['name'] ?><br><br>
                <b>Mobile:</b><?php echo $userdata['mobile'] ?><br><br>
                <b>Address:</b><?php echo $userdata['address'] ?><br><br>
                <b>Status:</b><?php echo $status ?><br><br>
            </div>

            <div id="group">
                <?php
                    if ($_SESSION['groupsdata']) {
                        for ($i = 0; $i < count($groupsdata); $i++) {
                            ?>
                            <div>
                                <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100" alt="sam"> 
                                <b>Group Name:</b><?php echo $groupsdata[$i]['name'] ?><br><br>
                                <b>Votes:</b><?php echo $groupsdata[$i]['votes'] ?><br><br>
                                <form action="../API/vote.php" method="post">
                                    <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                                    <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                                    <?php
                                        if($_SESSION['userdata']['status']==0){
                                            ?>
                                                <input type="submit" name="votebtn" id="votebtn" value="Vote">
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <button disabled type="button" name="votebtn" value="Vote" id="voted">Voted</button>
                                            <?php
                                        }
                                        
                                    ?>
                                </form>
                            </div>
                            <hr>
                    <?php
                        }
                    } else {
                    }
                ?>
            </div>

        </div>

    </div>

</body>

</html>