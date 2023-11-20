<?php include "includes/header.php"; ?>

<link rel="stylesheet" href="assets/css/destination-styles.css">

<title>Destination Page</title>

</head>

<body class="destination-view-img">

  <div class="destination-view">
    <?php

    include $_SERVER['DOCUMENT_ROOT'] . "/project/DestinationBLL.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/project/AccommodationBLL.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/project/packageBLL.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/project/CustomerBLL.php";


    $objDestinationBLL = new DestinationBLL();
    $objAccommodationBLL = new AccommodationBLL();
    $objPackageBLL = new packageBLL();
    $objCustomerBLL = new CustomerBLL();

    $AccommodationList = $objAccommodationBLL->showAllAccommodations();
    $packageList = $objPackageBLL->showAllPackage();
    $CustomerList = $objCustomerBLL->showAllCustomers();


    if (isset($_POST["pageState"])) {
      switch ($_POST["pageState"]) {
        case "Insert":
          $objDestinationEntity = new DestinationEntity();

          $objDestinationEntity->setDestinationID($_POST["destinationID"]);
          $objDestinationEntity->setDestinationName($_POST["destinationName"]);
          $objDestinationEntity->setAccommodationID($_POST["accommodationID"]);
          $objDestinationEntity->setPackageID($_POST["packageID"]);
          $objDestinationEntity->setCustomerID($_POST["customerID"]);

          $objDestinationBLL->insertDestination($objDestinationEntity);
          break;
        case "Update":
          $objDestinationEntity = new DestinationEntity();


          $objDestinationEntity->setDestinationID($_POST["destinationID"]);
          $objDestinationEntity->setDestinationName($_POST["destinationName"]);
          $objDestinationEntity->setAccommodationID($_POST["accommodationID"]);
          $objDestinationEntity->setPackageID($_POST["packageID"]);
          $objDestinationEntity->setCustomerID($_POST["customerID"]);

          $objDestinationBLL->updateDestination($objDestinationEntity);
          break;
          // case "Search":
          //   $objDestinationBLL->getDestinationByID($_POST["destinationID"]);
          //   break;

        case "Delete":
          $objDestinationBLL->deleteDestinationByID($_POST["destinationID"]);
          break;
      }
    }
    $objDestinationEntity = NULL;
    $DestinationList = $objDestinationBLL->showAllDestinations();
    if (isset($_POST["destinationID"]) && $_POST["pageState"] != "Delete") {
      $objDestinationEntity = $objDestinationBLL->getDestinationByID($_POST["destinationID"]);
    } else {
      $objDestinationEntity = $DestinationList[0];
    }
    ?>
    <form method="POST" action="DestinationView.php" id="DestinationForm">
      <div class="container">
        <div class="row">
          <div class="col-12 px-0">
            <h2 class="form-title">Destination Data</h2>

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
                <label for="dID">Destination</label>
                <select name="destinationID" id="dID">
                  <?php
                  foreach ($DestinationList as $objDestination) {
                    echo "<option value =" . $objDestination->getDestinationID();
                    if ($objDestination->getDestinationID() == $objDestinationEntity->getDestinationID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . $objDestination . "</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-items">
                <label for="ID">
                  Enter Destination ID:
                </label>
                <input type="number" id="ID" name="destinationID" placeholder="Enter Destination ID" value="<?PHP print($objDestinationEntity->getDestinationID()); ?>">
              </div>

              <div class="form-items">
                <label for="txtName">
                  Enter Name:
                </label>
                <input type="text" id="txtName" name="destinationName" placeholder="Enter Name" value="<?PHP print($objDestinationEntity->getDestinationName()); ?>">
              </div>

              <div class="form-items">
                <label for="aID"> Accommodations</label>
                <select name="accommodationID" id="aID">
                  <?php
                  foreach ($AccommodationList as $objAccommodation) {
                    echo "<option value =" . $objAccommodation->getAccommodationID();
                    if ($objAccommodation->getAccommodationID() == $objDestinationEntity->getAccommodationID()) {
                      print("  selected = 'selected'");
                    }
                    echo " >" . $objAccommodation . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-items">
                <label for="pID">Package</label>
                <select name="packageID" id="pID">
                  <?php
                  foreach ($packageList as $objPackage) {
                    echo "<option value =" . $objPackage->getPackageID();
                    if ($objPackage->getPackageID() == $objDestinationEntity->getPackageID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . $objPackage . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-items">
                <label for="cID">Customer</label>
                <select name="customerID" id="cID">
                  <?php
                  foreach ($CustomerList as $objCustomer) {
                    echo "<option value =" . $objCustomer->getCustomerID();
                    if ($objCustomer->getCustomerID() == $objDestinationEntity->getCustomerID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . $objCustomer . "</option>";
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
        document.getElementById("ID").disabled = isEditable;
        document.getElementById("txtName").disabled = isEditable;

        document.getElementById("btnSave").disabled = isEditable;
        document.getElementById("btnCancel").disabled = isEditable;

        document.getElementById("btnInsert").disabled = !isEditable;
        document.getElementById("btnUpdate").disabled = !isEditable;
        document.getElementById("btnDelete").disabled = !isEditable;
        // document.getElementById("btnSearch").disabled = !isEditable;
      };

      function reset() {
        document.getElementById("ID").value = 0;
        document.getElementById("txtName").value = "";
      };
      formControls(true);
      document.getElementById("btnSave").onclick = function() {
        document.getElementById("dID").disabled = false;
        document.getElementById("DestinationForm").submit();
      };
      document.getElementById("btnCancel").onclick = function() {
        document.getElementById("dID").disabled = false;
        document.getElementById("txtPageState").value = "View";
        document.getElementById("DestinationForm").submit();
      };
      document.getElementById("btnInsert").onclick = function() {
        document.getElementById("txtPageState").value = "Insert";
        formControls(false);
        reset();
      };
      document.getElementById("btnUpdate").onclick = function() {
        document.getElementById("txtPageState").value = "Update";
        formControls(false);
      };
      document.getElementById("btnDelete").onclick = function() {
        document.getElementById("txtPageState").value = "Delete";
        document.getElementById("DestinationForm").submit();
      };
      // document.getElementById("btnSearch").onclick = function() {
      //   document.getElementById("txtPageState").value = "Search";
      //   formControls(false);

      // };
      document.getElementById("dID").onchange = function() {
        document.getElementById("DestinationForm").submit();
      };
    </script>
  </div>
</body>

</html>