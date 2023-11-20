<?php include "includes/header.php"; ?>

<link rel="stylesheet" href="assets/css/accommodation-styles.css">

<title>Accommodation Page</title>

</head>

<body class="accommodation-view-img">

  <div class="accommodation-view">
    <?php

    include $_SERVER['DOCUMENT_ROOT'] . "/project/AccommodationBLL.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/project/FoodBLL.php";

    $objAccommodationBLL = new AccommodationBLL();
    $objFoodBLL = new FoodBLL();

    $foodList = $objFoodBLL->showAllFoods();

    if (isset($_POST["pageState"])) {
      switch ($_POST["pageState"]) {
        case "Insert":
          $objAccommodationEntity = new AccommodationEntity();

          $objAccommodationEntity->setAccommodationID($_POST["accommodationID"]);
          $objAccommodationEntity->setAccommodationName($_POST["accommodationName"]);
          $objAccommodationEntity->setFoodID($_POST["foodID"]);

          $objAccommodationBLL->insertAccommodation($objAccommodationEntity);
          break;
        case "Update":
          $objAccommodationEntity = new AccommodationEntity();

          $objAccommodationEntity->setAccommodationID($_POST["accommodationID"]);
          $objAccommodationEntity->setAccommodationName($_POST["accommodationName"]);
          $objAccommodationEntity->setFoodID($_POST["foodID"]);

          $objAccommodationBLL->updateAccommodation($objAccommodationEntity);
          break;
        // case "Search":
        //   $objAccommodationBLL->getAccommodationByID($_POST["accommodationID"]);
        //   break;

        case "Delete":
          $objAccommodationBLL->deleteAccommodationByID($_POST["accommodationID"]);
          break;
      }
    }
    $objAccommodationEntity = NULL;
    $AccommodationList = $objAccommodationBLL->showAllAccommodations();
    if (isset($_POST["accommodationID"]) && $_POST["pageState"] != "Delete") {
      $objAccommodationEntity = $objAccommodationBLL->getAccommodationByID($_POST["accommodationID"]);
    } else {
      $objAccommodationEntity = $AccommodationList[0];
    }
    ?>
    <form method="POST" action="AccommodationView.php" id="AccommodationForm">
      <div class="container">
        <div class="row">
          <div class="col-12 px-0">
            <h2 class="form-title">Accommodation Data</h2>

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
                <label for="aID">List of Accommodations</label>
                <select name="accommodationID" id="aID">
                  <?php
                  foreach ($AccommodationList as $objAccommodation) {
                    echo "<option value =" . $objAccommodation->getAccommodationID();
                    if ($objAccommodation->getAccommodationID() == $objAccommodationEntity->getAccommodationID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . $objAccommodation . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-items">
                <label for="ID">
                  Enter ID:
                </label>
                <input type=" number" id="ID" name="accommodationID" placeholder="Enter ID" value="<?PHP print($objAccommodationEntity->getAccommodationID()); ?>">
              </div>

              <div class="form-items">
                <label for="txtName">
                  Enter Name:
                </label>
                <input type="text" id="txtName" name="accommodationName" placeholder="Enter Name" value="<?PHP print($objAccommodationEntity->getAccommodationName()); ?>">
              </div>

              <div class="form-items">
                <label for="fID">List of Foods</label>
                <select name="foodID" id="fID">
                  <?php
                  foreach ($foodList as $objFood) {
                    echo "<option value =" . $objFood->getFoodID();
                    if ($objFood->getFoodID() == $objAccommodationEntity->getFoodID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . $objFood . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div>
                <!-- <input class='btn' type="button" id="btnSearch" value="Search"> -->
                <input class='btn' type="button" id="btnSave" value="Save">
                <input class='btn' type="button" id="btnCancel" value="Cancel">
              </div>
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
      document.getElementById("aID").disabled = false;
      document.getElementById("AccommodationForm").submit();
    };
    document.getElementById("btnCancel").onclick = function() {
      document.getElementById("aID").disabled = false;
      document.getElementById("txtPageState").value = "View";
      document.getElementById("AccommodationForm").submit();
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
      document.getElementById("AccommodationForm").submit();
    };
    // document.getElementById("btnSearch").onclick = function() {
    //   document.getElementById("txtPageState").value = "Search";
    //   formControls(false);

    // };
    document.getElementById("aID").onchange = function() {
      document.getElementById("AccommodationForm").submit();
    };
  </script>
  </div>
</body>

</html>