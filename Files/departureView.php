<?php include "includes/header.php"; ?>

<link rel="stylesheet" href="assets/css/departure-styles.css">

<title>Departure Page</title>

</head>

<body class="departure-view-img">
  <div class="departure-view">

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/project/departureBLL.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/project/packageBLL.php";

    $objPackageBLL = new PackageBLL();
    $objDepartureBLL = new DepartureBLL();
    $packageList = $objPackageBLL->showAllPackage();
    if (isset($_POST["pageState"])) {
      switch ($_POST["pageState"]) {
        case "Insert":
          $objDepartureEntity = new DepartureEntity();

          $objDepartureEntity->setDepartureID($_POST["departureID"]);
          $objDepartureEntity->setPackageID($_POST["packageID"]);

          $objDepartureBLL->insertDeparture($objDepartureEntity);
          break;
        case "Update":
          $objDepartureEntity = new DepartureEntity();

          $objDepartureEntity->setDepartureID($_POST["departureID"]);
          $objDepartureEntity->setPackageID($_POST["packageID"]);

          $objDepartureBLL->updateDeparture($objDepartureEntity);
          break;
        case "Delete":
          $objDepartureBLL->getDepartureByID($_POST["departureID"]);
          break;
      }
    }
    $objDepartureEntity = NULL;
    $departureList = $objDepartureBLL->showAllDepartures();
    if (isset($_POST["departureID"]) && $_POST["pageState"] != "Delete") {
      $objDepartureEntity = $objDepartureBLL->getDepartureByID($_POST["departureID"]);
    } else {
      $objDepartureEntity = $departureList[0];
    }
    ?>
    <form method="POST" action="departureView.php" id="departureForm">
      <div class="container">
        <div class="row">
          <div class="col-12 px-0">
            <h2 class="form-title">Departure Data</h2>
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
                <label for="dID">Select Departure</label>
                <select name="departureID" id="dID">
                  <?php
                  foreach ($departureList as $objDeparture) {
                    echo "<option value =" . $objDeparture->getDepartureID();
                    if ($objDeparture->getDepartureID() == $objDepartureEntity->getDepartureID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . $objDeparture . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-items">
                <label for="txtID">Enter Departure ID:</label>
                <input type="number" id="txtID" name="departureID" placeholder="Enter Departure ID" value="<?PHP print($objDepartureEntity->getDepartureID()); ?>">
              </div>

              <div class="form-items">
                <label for="pID">Select Package ID:</label>
                <select name="packageID" id="pID">
                  <?php
                  foreach ($packageList as $objPackage) {
                    echo "<option value =" . $objPackage->getPackageID();
                    if ($objPackage->getPackageID() == $objDepartureEntity->getPackageID()) {
                      print(" selected ='selected'");
                    }
                    echo ">" . $objPackage . "</option>";
                  }
                  ?>
                </select>
              </div>
              <div>
                <input class="btn" type="button" id="btnSave" value="Save">
                <input class="btn" type="button" id="btnCancel" value="Cancel">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <script>
      function formControls(isEditable) {
        document.getElementById("dID").disabled = isEditable;
        document.getElementById("txtID").disabled = isEditable;
        document.getElementById("pID").disabled = isEditable;
        document.getElementById("btnSave").disabled = isEditable;
        document.getElementById("btnCancel").disabled = isEditable;


        document.getElementById("dID").disabled = !isEditable;
        document.getElementById("btnInsert").disabled = !isEditable;
        document.getElementById("btnUpdate").disabled = !isEditable;
        document.getElementById("btnDelete").disabled = !isEditable;
      }

      function reset() {
        document.getElementById("txtID").value = 0;
      }
      formControls(true);
      document.getElementById("btnSave").onclick = function() {
        document.getElementById("dID").disabled = false;
        document.getElementById("departureForm").submit();
      };
      document.getElementById("btnCancel").onclick = function() {
        document.getElementById("dID").disabled = false;
        document.getElementById("txtPageState").value = "View";
        document.getElementById("departureForm").submit();
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
        document.getElementById("departureForm").submit();
      }
      document.getElementById("dID").onchange = function() {
        document.getElementById("departureForm").submit();
      }
    </script>
  </div>
</body>

</html>