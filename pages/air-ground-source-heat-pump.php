<div class="container">
  <h1 class="mb-4 pb-2">Air/Ground Source Heat Pump</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>In order to reach net zero carbon emission gas boilers will need to be replaced with an eco-friendly option such Air and ground to water heat pumps. These heat pumps use the temperature in the air or ground to heat up the water. Ground to water heat pumps are more effective, unfortunately they require a certain soil type and a large area in order to put the water pipes under the ground.</p>
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
    <p>A level concrete base is made so that the heat pump can be placed on it securely and connected to the houses water heating system and electricity. If the heat pump is a ground to water source heat pump a deep hole is dug so that the pipes can be placed. Then the hole is carefully filled and compacted, and the pipes are connected to the heat pump.</p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p>The heat pump will automatically turn on and off when heat is needed in the house using a thermostat or can be setup using a timer system.</p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>Air to water heat pump absorb heat from the air outside up to -15°C into a refrigerant. The refrigerant is compressed to increase the temperature which is then provided to the heating system and hot water taps.<br>
      The difference for a ground to water heat pump is that the heat is absorbed from the ground. Whereas the air temperature is constantly changing, the ground, approximately 5 metres deep, is a constant 10°C which make exacting the heat easier and reduce the electricity needed to exact the heat no matter what time of year it is.
    </p>
  </div>
</div>
