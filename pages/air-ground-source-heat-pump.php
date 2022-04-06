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
              if ($User_House['current_heating_device'] == "old_gas"){
                $profit_air = 450;
                $profit_ground = 540;
                $CO2_air = 5400;
                $CO2_ground = 5500;
              }
              elseif($User_House['current_heating_device'] == "new_gas"){
                $profit_air = -205;
                $profit_ground = -115;
                $CO2_air = 2650;
                $CO2_ground = 2800;
              }
              elseif($User_House['current_heating_device'] == "old_electric"){
                $profit_air = 1330;
                $profit_ground = 1420;
                $CO2_air = 3750;
                $CO2_ground = 3850;
              }
              elseif($User_House['current_heating_device'] == "new_eletric"){
                $profit_air = 720;
                $profit_ground = 810;
                $CO2_air = 2550;
                $CO2_ground = 2650;
              }
              elseif($User_House['current_heating_device'] == "old_oil"){
                $profit_air = 435;
                $profit_ground = 530;
                $CO2_air = 8500;
                $CO2_ground = 8700;
              }
              elseif($User_House['current_heating_device'] == "new_oil"){
                $profit_air = -290;
                $profit_ground = -200;
                $CO2_air = 4300;
                $CO2_ground = 4450;
              }
              elseif($User_House['current_heating_device'] == "old_lpg"){
                $profit_air = 1410;
                $profit_ground = 1500;
                $CO2_air = 6500;
                $CO2_ground = 6600;
              }
              elseif($User_House['current_heating_device'] == "new_lpg"){
                $profit_air = 360;
                $profit_ground = 450;
                $CO2_air = 3300;
                $CO2_ground = 3450;
              }
              elseif($User_House['current_heating_device'] == "coal") {
                $profit_air = 395;
                $profit_ground = 485;
                $CO2_air = 11500;
                $CO2_ground = 11600;
              }
              $payback_air_low = 7000/$profit_air;
              $payback_ground_low = 14000/$profit_ground;
              $payback_air_high = 13000/$profit_air;
              $payback_ground_high = 19000/$profit_ground;
              if ($payback_air <= 0){
                $payback_air = "Never";
              }
              if ($payback_ground <= 0){
                $payback_air = "Never";
              }
              ?>
                <h2>Estimated Price:</h2>
                <h1>Air Source Heat Pump: £7000-£13000<br>Ground Source Heat Pump: £14000-£19000</h1>
                <h2>Estimated Energy Bill Savings per Year:</h2>
                <h1>Air Source Heat Pump: £<?php echo $profit_air; ?><br>Ground Source Heat Pump: £<?php echo $profit_ground; ?></h1>
                <h2>Estimated CO<sub>2</sub> Savings per Year:</h2>
                <h1>Air Source Heat Pump: £<?php echo $CO2_air; ?>Kg<br>Ground Source Heat Pump: <?php echo $CO2_ground; ?>Kg</h1>
                <h2>Payback Time:</h2>
                <h1>Air Source Heat Pump: <?php  echo(round($payback_air_low, 2));?>-<?php  echo(round($payback_air_high, 2)); ?> Years<br>Ground Source Heat Pump: <?php  echo(round($payback_ground_low, 2)); ?>-<?php  echo(round($payback_ground_high, 2)); ?> Years</h1>
                <p><small>Information may not be accurate due to the house's circumstance that can not be accounted for.</small></p>
            <?php } else { ?>
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
