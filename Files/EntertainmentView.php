<?php include "includes/header.php"; ?>

<link rel="stylesheet" href="assets/css/entertainment-styles.css">

<title>Entertainment Page</title>

</head>

<body class="entertainment-view-img">

  <div class="entertainemt-view">

    <?php

    include $_SERVER['DOCUMENT_ROOT'] . "/project/EntertainmentBLL.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/project/AccommodationBLL.php";

    $objEntertainmentBLL = new EntertainmentBLL();
    $objAccommodationBLL = new AccommodationBLL();

    $AccommodationList = $objAccommodationBLL->showAllAccommodations();
    if (isset($_POST["pageState"])) {
      switch ($_POST["pageState"]) {
        case "Insert":
          $objEntertainmentEntity = new EntertainmentEntity();

          $objEntertainmentEntity->setEntertainmentID($_POST["entertainmentID"]);
          $objEntertainmentEntity->setEntertainmentName($_POST["entertainmentName"]);
          $objEntertainmentEntity->setAccommodationID($_POST["accommodationID"]);

          $objEntertainmentBLL->insertEntertainment($objEntertainmentEntity);
          break;
        case "Update":
          $objEntertainmentEntity = new EntertainmentEntity();

          $objEntertainmentEntity->setEntertainmentID($_POST["entertainmentID"]);
          $objEntertainmentEntity->setEntertainmentName($_POST["entertainmentName"]);
          $objEntertainmentEntity->setAccommodationID($_POST["accommodationID"]);

          $objEntertainmentBLL->updateEntertainment($objEntertainmentEntity);
          break;
          // case "Search":
          //   $objEntertainmentBLL->getEntertainmentByID($_POST["entertainmentID"]);
          //   break;

        case "Delete":
          $objEntertainmentBLL->deleteEntertainmentByID($_POST["entertainmentID"]);
          break;
      }
    }
    $objEntertainmentEntity = NULL;
    $EntertainmentList = $objEntertainmentBLL->showAllEntertainments();
    if (isset($_POST["entertainmentID"]) && $_POST["pageState"] != "Delete") {
      $objEntertainmentEntity = $objEntertainmentBLL->getEntertainmentByID($_POST["entertainmentID"]);
    } else {
      $objEntertainmentEntity = $EntertainmentList[0];
    }
    ?>
    <form method="POST" action="EntertainmentView.php" id="EntertainmentForm">
      <div class="container">
        <div class="row">
          <div class="col-12 px-0">
            <h2 class="form-title">Entertainment Data</h2>

            <div class="form-content">
              <input class="btn" type="hidden" id="txtPageState" name="pageState" value="View">

              <div class="form-opts">
                <div class="fa fa-pencil">
                  <input title="insert" class="btn" type="button" id="btnInsert" value="Insert">
                </div>

                <div class="fa fa-trash">
                  <input title="delete" class="btn" type="button" id="btnDelete" value="Delete">
                </div>

                <div class="fa fa-cloud-upload">
                  <input title="update" class="btn" type="button" id="btnUpdate" value="Update">
                </div>
              </div>

              <div class="form-items">
                <label for="eID">Entertainments</label>
                <select name="entertainmentID" id="eID">
                  <?php
                  foreach ($EntertainmentList as $objEntertainment) {
                    echo "<option value =" . $objEntertainment->getEntertainmentID();
                    if ($objEntertainment->getEntertainmentID() == $objEntertainmentEntity->getEntertainmentID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . $objEntertainment . "</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-items">
                <label for="enID">
                  Enter ID:
                </label>
                <input type="number" id="enID" name="entertainmentID" placeholder="Enter ID" value="<?PHP print($objEntertainmentEntity->getEntertainmentID()); ?>">
              </div>

              <div class="form-items">
                <label for="txtName">
                  Enter Name:
                </label>
                <input type="text" id="txtName" name="entertainmentName" placeholder="Enter Name" value="<?PHP print($objEntertainmentEntity->getEntertainmentName()); ?>">
              </div>


              <div class="form-items">
                <label for="aID">Accommodations</label>
                <select name="accommodationID" id="aID">
                  <?php
                  foreach ($AccommodationList as $objAccommodation) {
                    echo "<option value =" . $objAccommodation->getAccommodationID();
                    if ($objAccommodation->getAccommodationID() == $objEntertainmentEntity->getAccommodationID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . $objAccommodation . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div>
                <input class='btn' type="button" id="btnSave" value="Save">
                <input class='btn' type="button" id="btnCancel" value="Cancel">
              </div>

            </div>
          </div>
        </div>
      </div>
    </form>
    <script>
      function formControls(isEditable) {
        document.getElementById("enID").disabled = isEditable;
        document.getElementById("txtName").disabled = isEditable;
        document.getElementById("btnSave").disabled = isEditable;
        document.getElementById("btnCancel").disabled = isEditable;

        document.getElementById("btnInsert").disabled = !isEditable;
        document.getElementById("btnUpdate").disabled = !isEditable;
        document.getElementById("btnDelete").disabled = !isEditable;
        // document.getElementById("btnSearch").disabled = !isEditable;
      }

      function reset() {
        document.getElementById("enID").value = 0;
        document.getElementById("txtName").value = "";
      }
      formControls(true);
      document.getElementById("btnSave").onclick = function() {
        document.getElementById("eID").disabled = false;
        document.getElementById("EntertainmentForm").submit();
      };
      document.getElementById("btnCancel").onclick = function() {
        document.getElementById("eID").disabled = false;
        document.getElementById("txtPageState").value = "View";
        document.getElementById("EntertainmentForm").submit();
      };
      document.getElementById("btnInsert").onclick = function() {
        document.getElementById("txtPageState").value = "Insert";
        formControls(false);
        reset();
      };
      document.getElementById("btnUpdate").onclick = function() {
        document.getElementById("txtPageState").value = "Update";
        formControls(false);
      }
      document.getElementById("btnDelete").onclick = function() {
        document.getElementById("txtPageState").value = "Delete";
        document.getElementById("EntertainmentForm").submit();
      }
      // document.getElementById("btnSearch").onclick = function() {
      //   document.getElementById("txtPageState").value = "Search";
      //   formControls(false);

      // }
      document.getElementById("eID").onchange = function() {
        document.getElementById("EntertainmentForm").submit();
      }
    </script>
  </div>

</body>

</html>