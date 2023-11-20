<?php include "includes/header.php"; ?>

<link rel="stylesheet" href="assets/css/food-styles.css">

<title>Food Page</title>

</head>

<body class="food-view-img">

  <div class="food-view">

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/project/FoodBLL.php";

    $objFoodBLL = new FoodBLL();
    if (isset($_POST["pageState"])) {
      switch ($_POST["pageState"]) {
        case "Insert":
          $objFoodEntity = new FoodEntity();

          $objFoodEntity->setFoodID($_POST["foodID"]);
          $objFoodEntity->setFoodName($_POST["foodName"]);
          $objFoodEntity->setFoodPrice($_POST["foodPrice"]);

          $objFoodBLL->insertFood($objFoodEntity);
          break;
        case "Update":
          $objFoodEntity = new FoodEntity();

          $objFoodEntity->setFoodID($_POST["foodID"]);
          $objFoodEntity->setFoodName($_POST["foodName"]);
          $objFoodEntity->setFoodPrice($_POST["foodPrice"]);

          $objFoodBLL->updateFood($objFoodEntity);
          break;
          // case "Search":
          //   $objFoodBLL->getFoodByID($_POST["foodID"]);
          //   break;

        case "Delete":
          $objFoodBLL->deleteFoodByID($_POST["foodID"]);
          break;
      }
    }
    $objFoodEntity = NULL;
    $foodList = $objFoodBLL->showAllFoods();
    if (isset($_POST["foodID"]) && $_POST["pageState"] != "Delete") {
      $objFoodEntity = $objFoodBLL->getFoodByID($_POST["foodID"]);
    } else {
      $objFoodEntity = $foodList[0];
    }
    ?>
    <form method="POST" action="FoodView.php" id="FoodForm">
      <div class="container">
        <div class="row">
          <div class="col-12 px-0">
            <h2 class="form-title">Food Data</h2>

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
                <label for="fID">Foods</label>
                <select name="foodID" id="fID">
                  <?php
                  foreach ($foodList as $objFood) {
                    echo "<option value =" . $objFood->getFoodID();
                    if ($objFood->getFoodID() == $objFoodEntity->getFoodID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . $objFood->getFoodID() . "-" . $objFood->getFoodName() . "-" . $objFood->getFoodPrice() . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-items">
                <label for="txtID">
                  Enter Food ID:
                </label>
                <input type="number" id="txtID" name="foodID" autocomplete="off" placeholder="Enter Food ID" value="<?PHP print($objFoodEntity->getFoodID()); ?>">
              </div>

              <div class="form-items">
                <label for="txtName">
                  Enter Name:
                </label>
                <input type="text" id="txtName" name="foodName" autocomplete="off" placeholder="Enter Name" value="<?PHP print($objFoodEntity->getFoodName()); ?>">
              </div>

              <div class="form-items">
                <label for="txtPrice">
                  Enter Price:
                </label>
                <input type="number" id="txtPrice" name="foodPrice" autocomplete="off" placeholder="Enter Price" value="<?PHP print($objFoodEntity->getFoodPrice()); ?>">
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
        document.getElementById("txtID").disabled = isEditable;
        document.getElementById("txtName").disabled = isEditable;
        document.getElementById("txtPrice").disabled = isEditable;
        document.getElementById("btnSave").disabled = isEditable;
        document.getElementById("btnCancel").disabled = isEditable;

        document.getElementById("btnInsert").disabled = !isEditable;
        document.getElementById("btnUpdate").disabled = !isEditable;
        document.getElementById("btnDelete").disabled = !isEditable;
      }

      function reset() {
        document.getElementById("txtID").value = 0;
        document.getElementById("txtName").value = "";
        document.getElementById("txtPrice").value = "";
      }
      formControls(true);
      document.getElementById("btnSave").onclick = function() {
        document.getElementById("fID").disabled = false;
        document.getElementById("FoodForm").submit();
      };
      document.getElementById("btnCancel").onclick = function() {
        document.getElementById("fID").disabled = false;
        document.getElementById("txtPageState").value = "View";
        document.getElementById("FoodForm").submit();
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
        document.getElementById("FoodForm").submit();
      }
      // document.getElementById("btnSearch").onclick = function() {
      //   document.getElementById("txtPageState").value = "Search";
      //   formControls(false);

      // }
      document.getElementById("fID").onchange = function() {
        document.getElementById("FoodForm").submit();
      }
    </script>
  </div>
</body>

</html>