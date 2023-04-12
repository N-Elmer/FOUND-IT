<?php include("Header.php"); ?>
<?php include("DatabaseTableConnection.php"); ?>

<h2 id="admin_sub_title"><strong>USER DASHBOARD</strong></h2>

<br>
<br>

<div class="box1">
    <h2>LOST ARTICLES</h2>
        <!-- button trigger modal-->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AnticForm">ADD ANTIC PROECT</button> -->
</div>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <!-- <th>MATRICLE</th> -->
            <th>DESCRIPTION</th>
            <th>STATUS</th>
            <!-- <th>UPDATE</th>
            <th>DELETE</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $database_connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        $query = ("SELECT * FROM antic");
        $result = mysqli_query($database_connection, $query);

        if (!$result) {
            die("Connection Failed" . mysqli_error());
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <!-- <td><?php echo $row['id']; ?></th> -->
                    <td><?php echo $row['title']; ?></th>
                    <td><?php echo $row['status']; ?></th>

                    <!-- <td><a href="AnticUpdateFunction.php?id=<?php echo $row['id']; ?>" class="btn btn-success">UPDATE</a></td>
                    <td><a href="AnticDeleteFunction.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">DELETE</a></td> -->
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<?php
if (isset($_GET["antic_message"])) {
    echo "<h5>" . $_GET["antic_message"] . "</h5>";
}
?>

<?php
if (isset($_GET["antic_insert_message"])) {
    echo "<h5>" . $_GET["antic_insert_message"] . "</h5>";
}
?>

<?php
if (isset($_GET["antic_update_message"])) {
    echo "<h5>" . $_GET["antic_update_message"] . "</h5>";
}
?>

<?php
if (isset($_GET["antic_delete_message"])) {
    echo "<h6>" . $_GET["antic_delete_message"] . "</h6>";
}
?>

<!-- Modal -->
<form action="AnticInsertFunction.php" method="post">
    <div class="modal fade" id="AnticForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">LOST ARTICLES REGISTRATION FORM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="matricle">Matricle</label>
                        <input type="text" name="matricle" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Description</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                    <input type="submit" class="btn btn-success" name="add_antic" value="SAVE">
                </div>

            </div>
        </div>
    </div>
</form>

<br>
<br>

<a href="Logout.php"><strong><b>LOGOUT</b></strong></a>

<br>
<br>

<?php include("Footer.php"); ?>