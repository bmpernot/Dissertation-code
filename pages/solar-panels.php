<div class="container">
  <h1 class="mb-4 pb-2">Solar Panels</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>Solar panels are a method of making electricity using the power of the sun making it a renewable source of energy. This will reduce the energy bill as the amount of energy purchased will reduce as it will be made from the solar panels.</p>
    </div>
    <div id="even" class="col-md-6">
      <?php if($_SESSION['is_logged_in']){
            $user_House = new House($Conn);
            $User_House = $user_House->getHouse();
            if($User_House){
              if($User_House['house_type'] != "mid_floor_flat"){
                $half_roof_surface_area = ($User_House['house_length'] * ((0.5 *  $User_House['house_width']) / cos($User_House['roof_angle'])));
                $solar_panel = false;
                if ($half_roof_surface_area >= 43) {
                  $solar_panel = true;
                  $price_low = 8000;
                  $price_high = 10000;
                }
                elseif ($half_roof_surface_area >= 32) {
                  $solar_panel = true;
                  $price_low = 7000;
                  $price_high = 9000;
                }
                elseif ($half_roof_surface_area >= 29) {
                  $solar_panel = true;
                  $price_low = 6000;
                  $price_high = 8000;
                }
                elseif ($half_roof_surface_area >= 22) {
                  $solar_panel = true;
                  $price_low = 5000;
                  $price_high = 6000;
                }
                if($User_House['closest_area'] == "london"){
                  $CO2 = 940;
                  $profit_low = 120;
                  $payback = 16;
                  $profit_high = 410;
                } elseif ($User_House['closest_area'] == "aberystwyth") {
                  $CO2 = 840;
                  $profit_low = 115;
                  $payback = 17;
                  $profit_high = 385;
                } elseif ($User_House['closest_area'] == "manchester") {
                  $CO2 = 820;
                  $profit_low = 115;
                  $payback = 18;
                  $profit_high = 380;
                }elseif ($User_House['closest_area'] == "stirling") {
                  $CO2 = 740;
                  $profit_low = 110;
                  $payback = 19;
                  $profit_high = 360;
                }elseif ($User_House['closest_area'] == "belfast") {
                  $CO2 = 780;
                  $profit_low = 120;
                  $payback = 23;
                  $profit_high = 375;
                }
                if($solar_panel == true){
                ?>
                <h2>Estimated Price:</h2>
                <h1>£<?php echo $price_low; ?>-£<?php echo $price_high; ?></h1>
                <h2>Estimated Energy Bill Savings per Year:</h2>
                <h1>£<?php echo $profit_low; ?>-£<?php echo $profit_high; ?></h1>
                <h2>Estimated CO<sub>2</sub> Savings per Year:</h2>
                <h1><?php echo $CO2; ?>Kg</h1>
                <h2>Payback Time:</h2>
                <h1>Ranging between <?php  echo $payback ?> Years and Never depending on how much time is spent at home.</h1>
                <p><small>Information may not be accurate due to the house's circumstance that can not be accounted for.</small></p>
                <?php } else {?>
                  <h3>Your house does not meet the requirements to accomidate this eco housing option as you need a bigger roof.<h3>
              <?php }} else { ?>
                <h3>Your house does not meet the requirements to accomidate this eco housing option as you need a roof.<h3>
            <?php }} else { ?>
              <h3>Enter your house details for accurate information about this eco housing option.</h3>
      <?php }} else { ?>
        <h3>Login / Register and enter your house details for accurate information about this eco housing option.</h3>
      <?php } ?>
    </div>
  </div>
  <div id="odd" class="row">
    <h2>How it will be installed:</h2>
    <p>For installation of the solar panel, without the distribution network operator approval, the energy supply must be below 3.68 kW for a single phase supply or 11.04kW for a three phase supply as amperes will be below 16 per phase.<br>
      Approximately 15-20 m2 of roof space is required. The roof must be at a 15° or more in order to reduce the number of debris that lands on the solar panels. Depending on the amount of shade the house roof is in and what is causing the shade the objects can be removed to reduce the shade to make the solar panels more effective however optimisers can be installed if the shade cannot be removed.<br>
      Once scaffolding is setup, the mounting point for the solar panels are installed which attach to the rafters on the roof. Then the solar panels are secured to the mounts and wired in and other optional are installed. Finally, the system is connected to the consumer unit which will be installed next to the fuse box.
     </p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p>Make sure that all debris is cleared to make sure that the solar panels have maximum potential to generate energy and that they do not get damaged. Furthermore, solar panels should be cleaned to remove bird poo, dust and dirt if the rain doesn’t remove it. Once installed the installer while leave any details of maintenance checks and troubleshooting guidance. <br>
      It is a good habit to monitor the amount of energy generated. The data can be used to see if anything goes wrong with the data. <br>
      Panels have a lifetime of about 25 years, but inverts will between 5-15years and will cost £600-1000 to replace.
    </p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>Solar panels are made of photovoltaic cells. These cells are made of two pieces of silicon, one positively charge and the other negatively charged. This creates an electric field that will allow for current. When sunlight is on the cell the light particle release some electrons and the electrons want to go to the positively charge piece of silicon. The electric field only allows for electrons to go from positive to negative. Therefore a conductive metal plate is used to draw the electrons from the solar cell into a circuit where they act as electricity.</p>
  </div>
</div>
