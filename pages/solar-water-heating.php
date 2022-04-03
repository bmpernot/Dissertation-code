<div class="container">
  <h1 class="mb-4 pb-2">Solar Water Heating</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>A solar water heater is a device that harness the energy from the sun to either heat a non-freezing liquid that then heats the water mains or heats the water directly depending on house climate. The solar energy is capture via solar collects which can be either solar panels or a transparent storage device.</p>
    </div>
    <div id="even" class="col-md-6">
      <?php if($_SESSION['is_logged_in']){
            $user_House = new House($Conn);
            $User_House = $user_House->getHouse();
            if($User_House){
              if ($User_House['current_heating_device'] == "old_gas" || $User_House['current_heating_device'] == "new_gas"){
                $profit = 50;
                $CO2 = 270;
              }
              elseif($User_House['current_heating_device'] == "old_electric" || $User_House['current_heating_device'] == "new_eletric"){
                $profit = 55;
                $CO2 = 350;
              }
              elseif($User_House['current_heating_device'] == "old_oil" || $User_House['current_heating_device'] == "new_oil"){
                $profit = 65;
                $CO2 = 5450;
              }
              elseif($User_House['current_heating_device'] == "old_lpg" || $User_House['current_heating_device'] == "new_lpg"){
                $profit = 80;
                $CO2 = 390;
              }
              elseif($User_House['current_heating_device'] == "coal") {
                $profit = 95;
                $CO2 = 310;
              }
              ?>
              <h2>Estimated Price (Size of System - Number of People it accomidates - Average Price)</h2>
              <h1>2m<sup>2</sup> - 2 People - £2500 – £3000<br>3m<sup>2</sup> - 3 People - £3100–£3600<br>4m<sup>2</sup> - 4 People - £3700–£4200<br>5m<sup>2</sup> -	5 People - £4300–£4800<br>6m<sup>2</sup> - 6 People - £4900–£5400</h1>
              <h2>Estimated Energy Bill Savings per Year (Energy Bill Savings - Renewable Heat Incentive Payment):</h2>
              <h1>£<?php echo $profit; ?> - Depending on size of teh system the goverment should pay you a set amount per year<br>2m<sup>2</sup> - £200<br>3m<sup>2</sup> - £270<br>4m<sup>2</sup> - £345<br>5m<sup>2</sup> - £445<br>6m<sup>2</sup> - £485</h1>
              <h2>Estimated CO<sub>2</sub> Savings per Year:</h2>
              <h1><?php echo $CO2; ?>Kg</h1>
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
    <p>In most cases planning permission is not required in order to install a solar water heater. Depending on what type of solar water heater is getting installed different factors will affect the installation for the contractors. For example if a solar collector is already installed it can be connected to the storage thereby making the installation easier. There are different types of storage and depending on what type it will be installed on the roof or in the house. Finally, the components are connected together and then connected to the hot water systems and the water mains. </p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p>Depending on what type of system is installed requires different levels of maintenance. However the solar collectors need to be cleaned to ensure that they are most efficient. All other components do not require maintenance however is recommend to get the system checked by a professional every 3-5 years. </p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>Solar water heaters have two components, storage and a solar collector. However there are two types of solar water heating system, active and passive. An active system has a pump that controls the circulation of the water whereas a passive system does not. <br>
      Within the active system it can be a direct or an indirect circulating system. A direct system pumps the water through solar collector into the house. Whereas an indirect system pumps a non-freezing fluid through the solar collector which is then used to heat the water that is used in the house. Indirect systems are recommended from freezing environments.<br>
      On the other hand, passive system can be split into two systems, Integral collector-storage and Thermosyphon systems. Integral collector-storage systems use a storage tank with a transparent material that allows the sun to heat the water. This type of system requires a lot of sunshine and daylight hours to be effective. While thermosyphon systems uses a solar collector to heat the heat on the roof and allows gravity to add pressure to the wot water system in the house.
    </p>
  </div>
</div>
