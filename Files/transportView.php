<?php include "includes/header.php"; ?>

<link rel="stylesheet" href="assets/css/transport-styles.css">

<title>Transport Page</title>

</head>

<body class="transport-view-img">

  <div class="transport-view">
    <?php include "transportBLL.php";

    $objTransportBLL = new TransportBLL();
    if (isset($_POST["pageState"])) {
      switch ($_POST["pageState"]) {
        case "Insert":
          $objTransportEntity = new TransportEntity();

          $objTransportEntity->setTransportName($_POST["transportName"]);
          $objTransportEntity->setTransportID($_POST["transportID"]);


          $objTransportBLL->insertTransport($objTransportEntity);
          break;
        case "Update":
          $objTransportEntity = new TransportEntity();

          $objTransportEntity->setTransportName($_POST["transportName"]);
          $objTransportEntity->setTransportID($_POST["transportID"]);

          $objTransportBLL->updateTransport($objTransportEntity);
          break;
        case "Delete":
          $objTransportBLL->deleteTransportByID($_POST["transportID"]);
          break;
      }
    }
    $objTransportEntity = NULL;
    $transportList = $objTransportBLL->showAllTransports();
    if (isset($_POST["transportID"]) && $_POST["pageState"] != "Delete") {
      $objTransportEntity = $objTransportBLL->getTransportByID($_POST["transportID"]);
    } else {
      $objTransportEntity = $transportList[0];
    }
    ?>
    <form class="container" method="POST" action="transportView.php" id="transportForm">
      <div class="container">
        <div class="row">
          <div class="col-12 px-0">
            <h2 class="form-title">Transport Data</h2>

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
                <label for="tID">Select Transport</label>
                <select name=" transportID" id="tID">
                  <?php
                  foreach ($transportList as $objTransport) {
                    echo "<option value =" . $objTransport->getTransportID();
                    if ($objTransport->getTransportID() == $objTransportEntity->getTransportID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . $objTransport . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-items">
                <label for="txtID">Enter ID:</label>
                <input type="number" id="txtID" name="transportID" placeholder="Enter ID" value="<?PHP print($objTransportEntity->getTransportID()); ?>">
              </div>

              <div class="form-items">
                <label for="txtName">Enter Name:</label>
                <input type="text" id="txtName" name="transportName" placeholder="Enter Transport Name" value="<?PHP print($objTransportEntity->getTransportName()); ?>">
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
        document.getElementById("txtName").disabled = isEditable;
        document.getElementById("txtID").disabled = isEditable;
        document.getElementById("btnSave").disabled = isEditable;
        document.getElementById("btnCancel").disabled = isEditable;

        document.getElementById("btnInsert").disabled = !isEditable;
        document.getElementById("btnUpdate").disabled = !isEditable;
        document.getElementById("btnDelete").disabled = !isEditable;
      }

      function reset() {
        document.getElementById("txtName").value = "";
        document.getElementById("txtID").value = 0;
      }
      formControls(true);
      document.getElementById("btnSave").onclick = function() {
        document.getElementById("tID").disabled = false;
        document.getElementById("transportForm").submit();
      };
      document.getElementById("btnCancel").onclick = function() {
        document.getElementById("tID").disabled = false;
        document.getElementById("txtPageState").value = "View";
        document.getElementById("transportForm").submit();
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
        document.getElementById("transportForm").submit();
      }
      document.getElementById("tID").onchange = function() {
        document.getElementById("transportForm").submit();
      }
    </script>
  </div>
</body>

</html>