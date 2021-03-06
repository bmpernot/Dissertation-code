<div class="container">
  <h1 class="mb-4 pb-2">Radiator Reflectors and Pipe and Tank Insulation</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>The tank and pipe insulation is applied to reduce the amount of heat transfer from the tank or pipes to the atmosphere by lining the tank or pipe with a non-heat conductive materials. This will reduce heat loss and therefore reducing the heating bill as the water stays hotter for longer so doesn’t require more heating.<br>
          Radiators emit heat from all side so a large portion of the heat is transferred into the walls. Therefore a technology has been developed to reflect the heat back into the rooms by installing a reflector behind the radiator.
      </p>
    </div>
    <div id="even" class="col-md-6">
      <?php if($_SESSION['is_logged_in']){
            $user_House = new House($Conn);
            $User_House = $user_House->getHouse();
            if($User_House){
              if($User_House['radiator_no'] > 0 && $User_House['radiator_area'] > 0){
                $price = $User_House['radiator_area'];
                $profit_reflector_low = $User_House['radiator_area'] * 19 * 0.28;
                $CO2_reflector_low = $User_House['radiator_area'] * 4.74;
                $profit_reflector_high = $User_House['radiator_area'] * 94.9 * 0.28;
                $CO2_reflector_high = $User_House['radiator_area'] * 23.72;
                if($User_House['house_type'] == "detached_house"){
                  $profit = 100;
                  $CO2 = 500;
                }elseif ($User_House['house_type'] == "semi_detached_house") {
                  $profit = 90;
                  $CO2 = 455;
                }elseif ($User_House['house_type'] == "mid_terrace_house") {
                  $profit = 110;
                  $CO2 = 530;
                }elseif ($User_House['house_type'] == "detached_bungalow") {
                  $profit = 95;
                  $CO2 = 485;
                }elseif ($User_House['house_type'] == "mid_floor_flat") {
                  $profit = 1000;
                  $CO2 = 490;
                }
                ?>
                <h2>Estimated Price:</h2>
                <h1>Radiator reflectors: £<?php echo $price; ?><br>Pipe insulation: £1.50 per Metre<?php if($User_House['hot_water_tank'] == 1){ ?><br>Hot Water Tank Insulation: £20<?php } ?></h1>
                <h2>Estimated Energy Bill Savings per Year:</h2>
                <h1>Radiator reflectors: £<?php echo(round($profit_reflector_low, 2)); ?>-£<?php echo(round($profit_reflector_high, 2)); ?><br>Hot Water Tank Insulation: £<?php echo $profit; ?></h1>
                <h2>Estimated CO<sub>2</sub> Savings per Year:</h2>
                <h1>Radiator reflectors: <?php echo(round($CO2_reflector_low, 2)); ?>-<?php echo(round($CO2_reflector_high, 2)); ?>Kg<br>Hot Water Tank Insulation: <?php echo $CO2; ?>Kg</h1>
                <p><small>Information may not be accurate due to the house's circumstance that can not be accounted for.</small></p>
              <?php } else {?>
                <h3>Your house does not meet the requirements to accomidate this eco housing option as the house requires radiators.<h3>
            <?php }} else { ?>
              <h3>Enter your house details for accurate information about this eco housing option.</h3>
      <?php }} else { ?>
        <h3>Login / Register and enter your house details for accurate information about this eco housing option.</h3>
      <?php } ?>
    </div>
  </div>
  <div id="odd" class="row">
    <h2>How it will be installed:</h2>
    <p>The tank insulation goes around the tank to try and cover as much of the surface area as possible to help reduce the heat transfer into the atmosphere. The pipe insulation is a hollow tube that goes around the pipe to fully cover the pipe from the atmosphere. The radiator reflectors can be applied to the wall where the radiator is attached. It should not be applied to the radiator but the wall between it to reduce heat transfer between the radiator and the wall.</p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p>These types of installation do not need to be maintained or monitored so once installed replace them at the recommended time to ensure maximum installation.</p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>Radiator reflectors are panels made from a reflective film which encases a polyethylene core which is a great insulator due to its long molecules structure. Reflective film is used as it is great at reflecting heat. This is why it is used in the medical field to combat hypothermia. This is placed between the radiator and the walls so that the heat that is emits towards the wall by the radiator is reflector back into the room.<br>
      Pipe and hot water tank insulation use the same principle as wall insulation as they are acting as a layer between the pipe or tank and the atmosphere there by reducing heats loss as the material used as insulation is used as it does not absorb heat efficiently.
    </p>
  </div>
</div>
