<?php include "includes/header.php"; ?>

<link rel="stylesheet" href="assets/css/booking-styles.css">

<title>Booking Page</title>

</head>

<body class="booking-view-img">
  <div class="booking-view">
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/project/bookingBLL.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/project/agentBLL.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/project/departureBLL.php";

    $objDepartureBLL = new DepartureBLL();
    $objAgentBLL = new AgentBLL();
    $objBookingBLL = new BookingBLL();
    $departureList = $objDepartureBLL->showAllDepartures();
    $agentList = $objAgentBLL->showAllAgent();
    if (isset($_POST["pageState"])) {
      switch ($_POST["pageState"]) {
        case "Insert":
          $objBookingEntity = new BookingEntity();

          $objBookingEntity->setBookingID($_POST["bookingID"]);
          $objBookingEntity->setAgentID($_POST["agentID"]);
          $objBookingEntity->setAgentName($_POST["agentName"]);
          $objBookingEntity->setDepartureID($_POST["departureID"]);


          $objBookingBLL->insertBooking($objBookingEntity);
          break;
        case "Update":
          $objBookingEntity = new BookingEntity();

          $objBookingEntity->setBookingID($_POST["bookingID"]);
          $objBookingEntity->setAgentID($_POST["agentID"]);
          $objBookingEntity->setAgentName($_POST["agentName"]);
          $objBookingEntity->setDepartureID($_POST["departureID"]);

          $objBookingBLL->updateBooking($objBookingEntity);
          break;
        case "Delete":
          $objBookingBLL->deleteBookingByID($_POST["bookingID"]);
          break;
      }
    }
    $objBookingEntity = NULL;
    $bookingList = $objBookingBLL->showAllBooking();
    if (isset($_POST["bookingID"]) && $_POST["pageState"] != "Delete") {
      $objBookingEntity = $objBookingBLL->getBookingByID($_POST["bookingID"]);
    } else {
      $objBookingEntity = $bookingList[0];
    }
    ?>
    <form method="POST" action="bookingView.php" id="bookingForm">
      <div class="container">
        <div class="row">
          <div class="col-12 px-0">
            <h2 class="form-title">Booking Data</h2>

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
                <label for="bID">Select Booking</label>
                <select name="bookingID" id="bID">
                  <?php
                  foreach ($bookingList as $objBooking) {
                    echo "<option value=" . $objBooking->getBookingID();
                    if ($objBooking->getBookingID() == $objBookingEntity->getBookingID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . $objBooking . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-items">
                <label for="txtBID">Enter Booking ID:</label>
                <input type="number" id="txtBID" name="bookingID" placeholder="Enter Booking ID" value="<?PHP print($objBookingEntity->getBookingID()); ?>">
              </div>

              <div class="form-items">
                <label for="txtName">Enter Agent Name: </label>
                <input type="text" id="txtName" name="agentName" placeholder="Enter Agent Name" value="<?php print($objBookingEntity->getAgentName()); ?>" />
              </div>

              <div class="form-items">
                <label for="aID">Select Agent</label>
                <select name="agentID" id="aID">
                  <?php
                  foreach ($agentList as $objAgent) {
                    echo "<option value =" . $objAgent->getAgentID();
                    if ($objAgent->getAgentID() == $objBookingEntity->getAgentID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . $objAgent . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-items">
                <label for="dID">Select Departure</label>
                <select name="departureID" id="dID">
                  <?php
                  foreach ($departureList as $objDeparture) {
                    echo "<option value =" . $objDeparture->getDepartureID();
                    if ($objDeparture->getDepartureID() == $objBookingEntity->getDepartureID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . "Departure ID: " . $objDeparture->getDepartureID() . " Package ID: " . $objDeparture->getPackageID() . "</option>";
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
        document.getElementById("txtName").disabled = isEditable;
        document.getElementById("txtBID").disabled = isEditable;
        document.getElementById("aID").disabled = isEditable;
        document.getElementById("dID").disabled = isEditable;
        document.getElementById("btnSave").disabled = isEditable;
        document.getElementById("btnCancel").disabled = isEditable;

        document.getElementById("bID").disabled = !isEditable;
        document.getElementById("btnInsert").disabled = !isEditable;
        document.getElementById("btnUpdate").disabled = !isEditable;
        document.getElementById("btnDelete").disabled = !isEditable;
      }

      function reset() {
        document.getElementById("txtName").value = "";
        document.getElementById("txtBID").value = 0;
      }
      formControls(true);
      document.getElementById("btnSave").onclick = function() {
        document.getElementById("bID").disabled = false;
        document.getElementById("bookingForm").submit();
      };
      document.getElementById("btnCancel").onclick = function() {
        document.getElementById("bID").disabled = false;
        document.getElementById("txtPageState").value = "View";
        document.getElementById("bookingForm").submit();
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
        document.getElementById("bookingForm").submit();
      }
      document.getElementById("bID").onchange = function() {
        document.getElementById("bookingForm").submit();
      }
    </script>
  </div>
</body>

</html>