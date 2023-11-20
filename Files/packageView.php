<?php include "includes/header.php"; ?>

<link rel="stylesheet" href="assets/css/package-styles.css">

<title>Package Page</title>

</head>

<body class="package-view-img">
  <div class="package-view">
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/project/packageBLL.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/project/transportBLL.php";

    $objTransportBLL = new TransportBLL();
    $objPackageBLL = new PackageBLL();
    $transportList = $objTransportBLL->showAllTransports();
    if (isset($_POST["pageState"])) {
      switch ($_POST["pageState"]) {
        case "Insert":
          $objPackageEntity = new PackageEntity();

          $objPackageEntity->setPackageID($_POST["packageID"]);
          $objPackageEntity->setPackagePrice($_POST["packagePrice"]);
          $objPackageEntity->setPackageName($_POST["packageName"]);
          $objPackageEntity->setTransportID($_POST["transportID"]);

          $objPackageBLL->insertPackage($objPackageEntity);
          break;
        case "Update":
          $objPackageEntity = new PackageEntity();

          $objPackageEntity->setPackageID($_POST["packageID"]);
          $objPackageEntity->setPackagePrice($_POST["packagePrice"]);
          $objPackageEntity->setPackageName($_POST["packageName"]);
          $objPackageEntity->setTransportID($_POST["transportID"]);

          $objPackageBLL->updatePackage($objPackageEntity);
          break;
        case "Delete":
          $objPackageBLL->deletePackageByID($_POST["packageID"]);
          break;
      }
    }
    $objPackageEntity = NULL;
    $packageList = $objPackageBLL->showAllPackage();
    if (isset($_POST["packageID"]) && $_POST["pageState"] != "Delete") {
      $objPackageEntity = $objPackageBLL->getPackageByID($_POST["packageID"]);
    } else {
      $objPackageEntity = $packageList[0];
    }
    ?>
    <form method="POST" action="packageView.php" id="packageForm">
      <div class="container">
        <div class="row">
          <div class="col-12 px-0">
            <h2 class="form-title">Package Data</h2>
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
                <label for="pID">Select Package</label>
                <select name="packageID" id="pID">
                  <?php
                  foreach ($packageList as $objPackage) {
                    echo "<option value =" . $objPackage->getPackageID();
                    if ($objPackage->getPackageID() == $objPackageEntity->getPackageID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . $objPackage . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-items">
                <label for="txtID">Enter Package ID:</label>
                <input type="number" id="txtID" name="packageID" placeholder="Enter Package ID" value="<?PHP print($objPackageEntity->getPackageID()); ?>">
              </div>

              <div class="form-items">
                <label for="txtName">Enter Package Name:</label>
                <input type="text" id="txtName" name="packageName" placeholder="Enter Package Name" value="<?PHP print($objPackageEntity->getPackageName()); ?>">
              </div>

              <div class="form-items">
                <label for="txtPrice">Enter Price:</label>
                <input type="number" id="txtPrice" name="packagePrice" placeholder="Enter Package Price" value="<?PHP print($objPackageEntity->getPackagePrice()); ?>">
              </div>

              <div class="form-items">
                <label for="tID">Select Transport</label>
                <select name="transportID" id="tID">
                  <?php
                  foreach ($transportList as $objTransport) {
                    echo "<option value =" . $objTransport->getTransportID();
                    if ($objTransport->getTransportID() == $objPackageEntity->getTransportID()) {
                      print(" selected ='selected'");
                    }
                    echo ">" . $objTransport . "</option>";
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
        document.getElementById("pID").disabled = isEditable;
        document.getElementById("txtID").disabled = isEditable;
        document.getElementById("txtName").disabled = isEditable;
        document.getElementById("txtPrice").disabled = isEditable;
        document.getElementById("tID").disabled = isEditable;
        document.getElementById("btnSave").disabled = isEditable;
        document.getElementById("btnCancel").disabled = isEditable;


        document.getElementById("pID").disabled = !isEditable;
        document.getElementById("btnInsert").disabled = !isEditable;
        document.getElementById("btnUpdate").disabled = !isEditable;
        document.getElementById("btnDelete").disabled = !isEditable;
      }

      function reset() {
        document.getElementById("txtID").value = 0;
        document.getElementById("txtName").value = "";
        document.getElementById("txtPrice").value = 0;
      }
      formControls(true);
      document.getElementById("btnSave").onclick = function() {
        document.getElementById("pID").disabled = false;
        document.getElementById("packageForm").submit();
      };
      document.getElementById("btnCancel").onclick = function() {
        document.getElementById("pID").disabled = false;
        document.getElementById("txtPageState").value = "View";
        document.getElementById("packageForm").submit();
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
        document.getElementById("packageForm").submit();
      }
      document.getElementById("pID").onchange = function() {
        document.getElementById("packageForm").submit();
      }
    </script>
  </div>
</body>

</html>