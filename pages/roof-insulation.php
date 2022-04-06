<div class="container">
  <h1 class="mb-4 pb-2">Roof Insulation</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>Roof insulation creates a protective barrier between areas of different temperate that insulated homes to keep it warm. This also help reduce the energy used to heat up the house and reduce carbon emissions. Most house have roof insulation but is usually not enough as to be to most effective 270mm insulation must be fitted.</p>
    </div>
    <div id="even" class="col-md-6">
      <?php if($_SESSION['is_logged_in']){
            $user_House = new House($Conn);
            $User_House = $user_House->getHouse();
            if($User_House){
              if($User_House['house_type'] != "mid_floor_flat"){
                $roof_surface_area = 2 * ($User_House['house_length'] * ((0.5 *  $User_House['house_width']) / cos($User_House['roof_angle'])));
                if($User_House['house_type'] == "detached_house"){
                  $price = 395 + ($roof_surface_area)*12;
                  $profit = 380;
                  $CO2 = 1310;
                }elseif ($User_House['house_type'] == "semi_detached_house") {
                  $price = 300 + ($roof_surface_area)*12;
                  $profit = 165;
                  $CO2 = 580;
                }elseif ($User_House['house_type'] == "mid_terrace_house") {
                  $price = 285 + ($roof_surface_area)*12;
                  $profit = 150;
                  $CO2 = 530;
                }elseif ($User_House['house_type'] == "detached_bungalow") {
                  $price = 375 + ($roof_surface_area)*12;
                  $profit = 235;
                  $CO2 = 830;
                }
                $payback = $price/$profit;?>
                <h2>Estimated Price:</h2>
                <h1>£<?php echo(round($price, 2)); ?></h1>
                <h2>Estimated Energy Bill Savings per Year:</h2>
                <h1>£<?php echo $profit; ?></h1>
                <h2>Estimated CO<sub>2</sub> Savings per Year:</h2>
                <h1><?php echo $CO2; ?>Kg</h1>
                <h2>Payback Time:</h2>
                <h1><?php  echo(round($payback, 2)); ?> Years</h1>
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
    <p>The old insulation is removed and disposed of carefully as it is a dangerous material to breath in. Once the roof is prepared the insulation can either be installed between the rafters or under neater the rafters depending on the situation of the house. </p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p>Once installed touching the insulation with bear skin is not recommended so with wear protection when touching the insulation or cover the insulation with something. However, once installed a change in heat in the house should be noticeable.</p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>Due to the laws of thermodynamics hot will always transfer to cold, this has a negative effect on houses continually heating the house is energy inefficient. Therefore, in order to keep the heat in the houses the houses must be insulated. <br>
      Heat is transfer in three ways conduction, convection and radiation. As heat raise the heat will escape out of the roof. Therefore, loft insulation aims to minimise the effects of conduction and convection. This is done by lining the roof in a poorly conducting material such as glass fibre so that heat transfer is limited.
    </p>
  </div>
</div>
