<div class="container">
  <h1 class="mb-4 pb-2">Airtightness</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>Draught proofing is the act of making the house airtight to ensure the heat stays in the house. There are many area where draughts are most common such as:<br>
        -	Windows<br>
        -	Doors<br>
        -	Chimneys<br>
        -	Floorboards and skirting boards<br>
        -	Loft hatches<br>
        -	Pipework<br>
        -	Old extractor fans<br>
        -	Cracks in walls<br>
        However there are product that have been designed to make these areas airtight.
      </p>
    </div>
    <div id="even" class="col-md-6">
      <?php if($_SESSION['is_logged_in']){
            $user_House = new House($Conn);
            $User_House = $user_House->getHouse();
            if($User_House){
              if(// house requirements){ ?>
                <h2>Estimated Price:</h1>
                <h1>£<?php echo $price ?></h1>
                <h2>Estimated Profit per Week:</h1>
                <h1>£<?php echo $profit ?></h1>
                <h2>Payback Time:</h1>
                <h1><?php  echo $Payback ?> Years</h1>
                <p><small>Information may not be accurate due to the house's circumstance that can not be accounted for.</small></p>
              <?php } else {?>
                <h3>Your house does not meet the requirements to accomidate this eco housing option.<h3>
            <?php }} else { ?>
              <h3>Enter your house details for accurate information about this eco housing option.</h3>
      <?php }} else { ?>
        <h3>Login / Register and enter your house details for accurate information about this eco housing option.</h3>
      <?php } ?>
    </div>
  </div>
  <div id="odd" class="row">
    <h2>How it will be installed:</h2>
    <p>Each draught proofing product will come with its own instructions. However for draughtproofing doors and windows make sure to line the edges of the doors and windows to have a continuous seal to ensure it is airtight when the doors and windows are closed.</p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p>When operating the device after making it airtight make sure not to damage the draught proofing as it will not be effective if it cannot make a continuous seal.</p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>If the house is airtight it force all heat that wants to get out of the house to transfer the heat though the insulation which is not very effective, therefore keeping the heat inside the house.</p>
  </div>
</div>
