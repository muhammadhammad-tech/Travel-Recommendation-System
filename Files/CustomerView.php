<?php include "includes/header.php"; ?>

<link rel="stylesheet" href="assets/css/customer-styles.css">

<title>Customer Page</title>

</head>

<body class="customer-view-img">

  <div class="customer-view">

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/project/CustomerBLL.php";

    $objCustomerBLL = new CustomerBLL();
    if (isset($_POST["pageState"])) {
      switch ($_POST["pageState"]) {
        case "Insert":
          $objCustomerEntity = new CustomerEntity();

          $objCustomerEntity->setCustomerID($_POST["customerID"]);
          $objCustomerEntity->setCustomerName($_POST["customerName"]);
          $objCustomerEntity->setCustomerNumber($_POST["customerNumber"]);

          $objCustomerBLL->insertCustomer($objCustomerEntity);
          break;
        case "Update":
          $objCustomerEntity = new CustomerEntity();

          $objCustomerEntity->setCustomerID($_POST["customerID"]);
          $objCustomerEntity->setCustomerName($_POST["customerName"]);
          $objCustomerEntity->setCustomerNumber($_POST["customerNumber"]);

          $objCustomerBLL->updateCustomer($objCustomerEntity);
          break;
          // case "Search":
          //   $objCustomerBLL->getCustomerByID($_POST["customerID"]);
          //   break;

        case "Delete":
          $objCustomerBLL->deleteCustomerByID($_POST["customerID"]);
          break;
      }
    }
    $objCustomerEntity = NULL;
    $CustomerList = $objCustomerBLL->showAllCustomers();
    if (isset($_POST["customerID"]) && $_POST["pageState"] != "Delete") {
      $objCustomerEntity = $objCustomerBLL->getCustomerByID($_POST["customerID"]);
    } else {
      $objCustomerEntity = $CustomerList[0];
    }
    ?>
    <form method="POST" action="CustomerView.php" id="CustomerForm">
      <div class="container">
        <div class="row">
          <div class="col-12 px-0">
            <h2 class="form-title">Customer Data</h2>

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
                <label for="cID">Customers</label>
                <select name="customerID" id="cID">
                  <?php
                  foreach ($CustomerList as $objCustomer) {
                    echo "<option value =" . $objCustomer->getCustomerID();
                    if ($objCustomer->getCustomerID() == $objCustomerEntity->getCustomerID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . $objCustomer . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-items">
                <label for="ID">
                  Enter ID:
                </label>
                <input type="number" id="ID" name="customerID" placeholder="Enter ID" value="<?PHP print($objCustomerEntity->getCustomerID()); ?>">
              </div>

              <div class="form-items">
                <label for="txtName">
                  Enter Name:
                </label>
                <input type="text" id="txtName" name="customerName" placeholder="Enter Name" value="<?PHP print($objCustomerEntity->getCustomerName()); ?>">
              </div>

              <div class="form-items">
                <label for="txtNo">
                  Enter Phone number:
                </label>
                <input type="text" id="txtNo" name="customerNumber" placeholder="Enter Phone Number" value="<?PHP print($objCustomerEntity->getCustomerNumber()); ?>">
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
        document.getElementById("txtNo").disabled = isEditable;
        document.getElementById("btnSave").disabled = isEditable;
        document.getElementById("btnCancel").disabled = isEditable;

        document.getElementById("btnInsert").disabled = !isEditable;
        document.getElementById("btnUpdate").disabled = !isEditable;
        document.getElementById("btnDelete").disabled = !isEditable;
        // document.getElementById("btnSearch").disabled = !isEditable;
      }

      function reset() {
        document.getElementById("ID").value = 0;
        document.getElementById("txtName").value = "";
        document.getElementById("txtNo").value = "";
      }
      formControls(true);
      document.getElementById("btnSave").onclick = function() {
        document.getElementById("cID").disabled = false;
        document.getElementById("CustomerForm").submit();
      };
      document.getElementById("btnCancel").onclick = function() {
        document.getElementById("cID").disabled = false;
        document.getElementById("txtPageState").value = "View";
        document.getElementById("CustomerForm").submit();
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
        document.getElementById("CustomerForm").submit();
      }
      // document.getElementById("btnSearch").onclick = function() {
      //   document.getElementById("txtPageState").value = "Search";
      //   formControls(false);

      // }
      document.getElementById("cID").onchange = function() {
        document.getElementById("CustomerForm").submit();
      }
    </script>
  </div>
</body>


</html>