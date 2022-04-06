<div class="container">
  <h1 class="mb-4 pb-2">Wall Insulation</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>There are two types of wall insulation, solid wall and cavity wall insulation. They both do the same thing however the household owner does not get to choose which one they get as it depends on how the house was build.<br>
        If the brick work has uniform brick spaced evenly and it is wider than 260mm then it is most likely to be a cavity wall. However, if the wall has brickwork with alternating patterns and it is narrower than 260mm then it is most likely a solid wall.<br>
        Solid wall insulation can be installed on either side of the wall but varies in cost and will change the size of the house. This is due to needing approximately 100mm to put the insulation on the inside or outside of the house. Whereas the cavity wall insulation will be placed on the inside of the wall.<br>
        This will not apply to all houses as all house in the UK build after 1990 will have either of the two wall insulations. However, house built before this time period do not have wall insulation.
      </p>
    </div>
    <div id="even" class="col-md-6">
      <?php if($_SESSION['is_logged_in']){
            $user_House = new House($Conn);
            $User_House = $user_House->getHouse();
            if($User_House){
              $wall_surface_area = 2 * (($User_House['house_length'] * $User_House['house_height'])+($User_House['house_width'] * $User_House['house_height']));
              if($User_House['house_type'] == "detached_house"){
                $solid_profit = 425;
                $solid_CO2 = 1490;
                $cavity_price_beads_low = 610 + (18 * $wall_surface_area);
                $cavity_price_firbe_low = 610 + (13 * $wall_surface_area);
                $cavity_price_foam_low = 610 + (22 * $wall_surface_area);
                $cavity_price_beads_high = 610 + (22 * $wall_surface_area);
                $cavity_price_firbe_high = 610 + (18 * $wall_surface_area);
                $cavity_price_foam_high = 610 + (26 * $wall_surface_area);
                $cavity_profit = 185;
                $cavity_CO2 = 1100;
              }elseif ($User_House['house_type'] == "semi_detached_house") {
                $solid_profit = 255;
                $solid_CO2 = 890;
                $cavity_price_beads_low = 475 + (18 * $wall_surface_area);
                $cavity_price_firbe_low = 475 + (13 * $wall_surface_area);
                $cavity_price_foam_low = 475 + (22 * $wall_surface_area);
                $cavity_price_beads_high = 475 + (22 * $wall_surface_area);
                $cavity_price_firbe_high = 475 + (18 * $wall_surface_area);
                $cavity_price_foam_high = 475 + (26 * $wall_surface_area);
                $cavity_profit = 310;
                $cavity_CO2 = 660;
              }elseif ($User_House['house_type'] == "mid_terrace_house") {
                $solid_profit = 160;
                $solid_CO2 = 560;
                $cavity_price_beads_low = 390 + (18 * $wall_surface_area);
                $cavity_price_firbe_low = 390 + (13 * $wall_surface_area);
                $cavity_price_foam_low = 390 + (22 * $wall_surface_area);
                $cavity_price_beads_high = 390 + (22 * $wall_surface_area);
                $cavity_price_firbe_high = 390 + (18 * $wall_surface_area);
                $cavity_price_foam_high = 390 + (26 * $wall_surface_area);
                $cavity_profit = 120;
                $cavity_CO2 = 415;
              }elseif ($User_House['house_type'] == "detached_bungalow") {
                $solid_profit = 170;
                $solid_CO2 = 600;
                $cavity_price_beads_low = 460 + (18 * $wall_surface_area);
                $cavity_price_firbe_low = 460 + (13 * $wall_surface_area);
                $cavity_price_foam_low = 460 + (22 * $wall_surface_area);
                $cavity_price_beads_high = 460 + (22 * $wall_surface_area);
                $cavity_price_firbe_high = 460 + (18 * $wall_surface_area);
                $cavity_price_foam_high = 460 + (26 * $wall_surface_area);
                $cavity_profit = 125;
                $cavity_CO2 = 440;
              }elseif ($User_House['house_type'] == "mid_floor_flat") {
                $solid_profit = 125;
                $solid_CO2 = 440;
                $cavity_price_beads_low = 345 + (18 * $wall_surface_area);
                $cavity_price_firbe_low = 345 + (13 * $wall_surface_area);
                $cavity_price_foam_low = 345 + (22 * $wall_surface_area);
                $cavity_price_beads_high = 345 + (22 * $wall_surface_area);
                $cavity_price_firbe_high = 345 + (18 * $wall_surface_area);
                $cavity_price_foam_high = 345 + (26 * $wall_surface_area);
                $cavity_profit = 95;
                $cavity_CO2 = 325;
              }
              $solid_payback_internal = 8200 / $solid_profit;
              $solid_payback_external = 10000 / $solid_profit;
              $cavity_payback_beads_low = $cavity_price_beads_low / $cavity_profit;
              $cavity_payback_firbe_low = $cavity_price_firbe_low / $cavity_profit;
              $cavity_payback_foam_low = $cavity_price_foam_low / $cavity_profit;
              $cavity_payback_beads_high = $cavity_price_beads_high / $cavity_profit;
              $cavity_payback_firbe_high = $cavity_price_firbe_high / $cavity_profit;
              $cavity_payback_foam_high = $cavity_price_foam_high / $cavity_profit;?>
                <h1>Solid Wall Installation:</h1>
                <h2>Estimated Price <small>(Typical price for a 3-bedroom, semi-detached house)</small>:</h2>
                <h1>External: £10000<br>
                Internal: £8200</h1>
                <h2>Estimated Energy Bill Savings per Year:</h2>
                <h1>£<?php echo $solid_profit; ?></h1>
                <h2>Estimated CO<sub>2</sub> Savings per Year:</h2>
                <h1><?php echo $solid_CO2; ?>Kg</h1>
                <h2>Payback Time:</h2>
                <h1>Internal: <?php  echo(round($solid_payback_internal, 2)); ?> Years<br>External: <?php echo(round($solid_payback_external, 2));?></h1>
                <h1>Cavaity Wall Installation:</h1>
                <h2>Estimated Price:</h2>
                <h1>Polystyrene beads: £<?php echo($cavity_price_beads_low); ?>-£<?php echo($cavity_price_beads_high); ?><br>
                    Blown mineral fibre: £<?php echo ($cavity_price_firbe_low); ?>-£<?php echo($cavity_price_firbe_high); ?><br>
                    Polyurethane foam: £<?php echo ($cavity_price_foam_low); ?>-£<?php echo($cavity_price_foam_high); ?></h1>
                <h2>Estimated Energy Bill Savings per Year:</h2>
                <h1>£<?php echo $cavity_profit; ?></h1>
                <h2>Estimated CO<sub>2</sub> Savings per Year:</h2>
                <h1><?php echo $cavity_CO2; ?>Kg</h2>
                <h2>Payback Time:</h1>
                <h1>Polystyrene beads: <?php echo(round($cavity_payback_beads_low, 2)); ?>-<?php echo(round($cavity_payback_beads_high, 2)); ?> Years<br>
                    Blown mineral fibre: <?php echo(round($cavity_payback_firbe_low, 2)); ?>-<?php echo(round($cavity_payback_firbe_high, 2)); ?> Years<br>
                    Polyurethane foam: <?php echo(round($cavity_payback_foam_low, 2)); ?>-<?php echo(round($cavity_payback_foam_high, 2));?> Years</h1>
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
    <p>When installing the cavity wall insulation multiple holes are drilled into the wall and the insulation material is piped into the wall at high pressure to fill the cavity in the wall.<br>
      For the wall insulation, an insulation barrier is added to the inside or outside of the walls then covered up using cladding which can be modified to be a variety of different textures.
    </p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p>A 25 year guarantee should come with the installation as it comes under the Ofgem approved guarantee schemes. Therefore if there are any problems make sure to get it fixed.</p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>Due to the same reasons stated in 3.1.6 This is done by lining the walls in a poorly conducting material such as the material stated in table X so that heat transfer is limited. A different material is used for solid wall insulation.</p>
  </div>
</div>
