<div class="container">
  <h1 class="mb-4 pb-2">Daylight Exposure</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>The sun is a massive source of energy and is a light source. Therefore, in order to harness the suns energy and light houses must be exposed to the sun so that less resources are used to heat and light the house. In addition, to expose the house to more daylight windows should be washed regularly to ensure not sun light is limited. Unfortunately there is little reason to install a roof window into an attic however if the roof is connected to a room it could increase light level.<br> Depending on the angle of the roof there are different types of windows that are best suited for that roof. For Example, roofs with a 15°-75° angle, a top-hung window is recommended, where a 75°+ angle roof, a centre-pivot window in recommended, however this type of window can also be installed on roof wiyth an angle between 15°-90°. finally, roof with an angle between 0°-15° skylights are recommended.</p>
    </div>
    <div id="even" class="col-md-6">
      <?php if($_SESSION['is_logged_in']){
            $user_House = new House($Conn);
            $User_House = $user_House->getHouse();
            $skylights = false;
            $top_hung = false;
            $centre = false;
            $centre_recommended = false;
            if($User_House){
              if($User_House['house_type'] != "mid_floor_flat"){
                if ($User_House['roof_angle'] != 90) {
                  if ($User_House['roof_angle'] > 0 && $User_House['roof_angle'] <= 15) {
                    $skylights = true;
                  }
                  if ($User_House['roof_angle'] >= 15 && $User_House['roof_angle'] <= 75) {
                    $top_hung = true;
                  }
                  if ($User_House['roof_angle'] > 15 && $User_House['roof_angle'] < 90) {
                    $centre = true;
                    if ($User_House['roof_angle'] >= 75){
                      $centre_recommended = true;
                    }
                  }
                ?>
                <h2>Estimated Price:</h2>
                <?php if($skylights == true) { ?><h1>Skylights (recommend):<br>£1450-£3000 Per Window</h1><?php }
                if($top_hung == true) { ?><h1>Top-Hung Window (recommend):<br>£1300-£1800 Per Window</h1><?php }
                if($centre_recommended == true) { ?><h1>Centre-Pivot Window (recommend):<br>£1450-£3000 Per Window</h1><?php }
                elseif($centre == true) { ?><h1>Centre-Pivot Window:<br>£1160-£1600 Per Window</h1><?php } ?>
                <h2>Estimated Energy Bill Savings per Year:</h2>
                <h1>16-20% <small>(Depending on electricity bill, house location and orientation.)</h1>
                <p><small>Information may not be accurate due to the house's circumstance that can not be accounted for.</small></p>
              <?php }} else {?>
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
    <p>Depending on the roof structure, surface area and orientation of the house a project team will come and survey the house to come up will a tailored solution to the house. Then once the solution is finalised the contractors will be hired to install the window. </p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p>These windows can be used as any other window however the high end roof windows can be electronic and can be controlled via a phone or smart device allowing for easy access if the window is too high to reach manually.</p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>The more sunlight that can energy the house and the more heat that can be retained by the glass will reduce the amount of energy used to heat the house. This is independent of the temperature outside; however it is dependent on cloud coverage in the sky and if the house is in the shade.<br>
      In addition the more coverage of the roof the windows has, allowing the light to enter the house, will reduce the energy bill in lighting as it will be bright enough throughout the day without the need of turning the lights on.
    </p>
  </div>
</div>
