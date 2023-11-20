<?php include "includes/header.php"; ?>

<link rel="stylesheet" href="assets/css/custom-styles.css">

<title>Agent Page</title>

</head>

<body class="agent-view-img">

  <div class="agent-view">

    <?php
    include "agentBLL.php";

    $objAgentBLL = new AgentBLL();
    if (isset($_POST["pageState"])) {
      switch ($_POST["pageState"]) {
        case "Insert":
          $objAgentEntity = new AgentEntity();

          $objAgentEntity->setAgentID($_POST["agentID"]);
          $objAgentEntity->setAgentName($_POST["agentName"]);
          $objAgentEntity->setAgentPhoneNo($_POST["phoneNo"]);

          $objAgentBLL->insertAgent($objAgentEntity);
          break;
        case "Update":
          $objAgentEntity = new AgentEntity();

          $objAgentEntity->setAgentID($_POST["agentID"]);
          $objAgentEntity->setAgentName($_POST["agentName"]);
          $objAgentEntity->setAgentPhoneNo($_POST["phoneNo"]);

          $objAgentBLL->updateAgent($objAgentEntity);
          break;
        case "Delete":
          $objAgentBLL->deleteAgentByID($_POST["agentID"]);
          break;
      }
    }
    $objAgentEntity = NULL;
    $agentList = $objAgentBLL->showAllAgent();
    if (isset($_POST["agentID"]) && $_POST["pageState"] != "Delete") {
      $objAgentEntity = $objAgentBLL->getAgentByID($_POST["agentID"]);
    } else {
      $objAgentEntity = $agentList[0];
    }
    ?>
    <form method="POST" action="agentView.php" id="agentForm">
      <div class="container">
        <div class="row">
          <div class="col-12 px-0">
            <h2 class="form-title">Agent Data</h2>

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
                <label for="aID">Select Agent</label>
                <select name="agentID" id="aID">
                  <?php
                  foreach ($agentList as $objAgent) {
                    echo "<option value =" . $objAgent->getAgentID();
                    if ($objAgent->getAgentID() == $objAgentEntity->getAgentID()) {
                      print(" selected = 'selected'");
                    }
                    echo " >" . $objAgent . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-items">
                <label for="txtID">Enter ID:</label>
                <input type="text" id="txtID" name="agentID" placeholder="Enter Name" value="<?PHP print($objAgentEntity->getAgentID()); ?>">
              </div>

              <div class="form-items">
                <label for="txtName">Enter Name:</label>
                <input type="text" id="txtName" name="agentName" placeholder="Enter Name" value="<?PHP print($objAgentEntity->getAgentName()); ?>">
              </div>
              <div class="form-items">
                <label for="txtNo">Enter number:</label>
                <input type="text" id="txtNo" name="phoneNo" placeholder="Enter Phone Number" value="<?PHP print($objAgentEntity->getAgentPhoneNo()); ?>">
              </div>

              <div class="form-btns">
                <input class="btn" type="button" id="btnSave" value="Save">
                <input class="btn" type="button" id="btnCancel" value="Cancel">
                <input class="btn" type="button" id="btnSearch" value="Search">
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
        document.getElementById("txtNo").disabled = isEditable;
        document.getElementById("btnSave").disabled = isEditable;
        document.getElementById("btnCancel").disabled = isEditable;

        document.getElementById("btnInsert").disabled = !isEditable;
        document.getElementById("btnUpdate").disabled = !isEditable;
        document.getElementById("btnDelete").disabled = !isEditable;
        document.getElementById("btnSearch").disabled = !isEditable;
      }

      function reset() {
        document.getElementById("txtID").value = 0;
        document.getElementById("txtName").value = "";
        document.getElementById("txtNo").value = "";
      }
      formControls(true);
      document.getElementById("btnSave").onclick = function() {
        document.getElementById("aID").disabled = false;
        document.getElementById("agentForm").submit();
      };
      document.getElementById("btnCancel").onclick = function() {
        document.getElementById("aID").disabled = false;
        document.getElementById("txtPageState").value = "View";
        document.getElementById("agentForm").submit();
      };
      document.getElementById("btnInsert").onclick = function() {
        document.getElementById("txtPageState").value = "Insert";
        formControls(false);
        reset();
      };
      document.getElementById("btnSearch").onclick = function(){
			   document.getElementById("txtPageState").value = "Search";
			   formControls(false);
      document.getElementById("btnUpdate").onclick = function() {
        document.getElementById("txtPageState").value = "Update";
        formControls(false);
      }
      document.getElementById("btnDelete").onclick = function() {
        document.getElementById("txtPageState").value = "Delete";
        document.getElementById("agentForm").submit();
      }
      document.getElementById("aID").onchange = function() {
        document.getElementById("agentForm").submit();
      }
    </script>
  </div>
</body>

</html>