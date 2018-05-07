

<html lang="en-ca">

<body  class="container">  <!-- id indicates page; is used by menu CSS to indicate active page.  No JS needed. -->

    <header >
        <!-- BEGIN mynav.php INCLUDE -->
        <?php include "./mynav.php"; ?>
        <!-- END mynav.php INCLUDE -->

    </header>

    <main class="section">
        <div class="row center">
            <div class="about-content" style="width:60%; height: 450px;
        float: left; background-color: #ffffff; margin-top: 25px; ">

                <table>
                    <thead>
                    <tr>
                        <th></th>
                        <th>Open from</th>
                        <th>Closed</th>
                    </tr>
                    </thead>
<?php $weekquery=mysqli_query($GLOBALS['connection'],"SELECT * FROM `openinghours`");
$Opentime=mysqli_fetch_array($weekquery);
?>
                    <tbody>
                    <tr>
                        <td>Moday></td>
                        <td><?php echo $Opentime['MonOpen'] ?></td>
                        <td><?php echo $Opentime['MonClose'] ?></td>
                    </tr>
                    <tr>
                        <td>Tuesday</td>
                        <td><?php echo $Opentime["TuesOpen"];?></td>
                        <td><?php echo $Opentime["TueClose"];?></td>
                    </tr>
                    <tr>
                        <td>Wednesday</td>
                        <td><?php echo $Opentime["WedOpen"];?></td>
                        <td><?php echo $Opentime["WedClose"];?></td>
                    </tr>
                    <tr>
                        <td>Thursday</td>
                        <td><?php echo $Opentime["ThursOpen"];?></td>
                        <td><?php echo $Opentime["ThursClose"];?></td>
                    </tr>
                    <tr>
                        <td>Friday</td>
                        <td><?php echo $Opentime["FriOpen"];?></td>
                        <td><?php echo $Opentime["FriClose"];?></td>
                    </tr>
                    <tr>
                        <td>Saturday</td>
                        <td><?php echo $Opentime["SatOpen"];?></td>
                        <td><?php echo $Opentime["SatClose"];?></td>
                    </tr>
                    <tr>
                        <td>Sunday</td>
                        <td><?php echo $Opentime["SunOpen"];?></td>
                        <td><?php echo $Opentime["SunClose"];?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </main>

<footer class="page-footer teal darken-4">
<?php include "./footer.php"; ?>
</footer>

</body>
</html>

<?php  /*
INSERT INTO `openinghours` (`OpeningID`, `Monday`, `Thuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sonday`)
VALUES (NULL, '8:00 - 17:00', '8:00 - 17:00', '8:00 - 17:00', '8:00 - 17:00', '8:00 - 14:00', '10:00 - 14:00', '10:00 - 14:00'); */?>