<div class="container">
  <h1 class="mb-4 pb-2">Water Collection</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>There are two main types of water collection systems rainwater collection and rainwater harvesting.<br>
        The rainwater collection involves attaching a water butt or rain barrel to the guttering that collects the rain off of the roof.<br>
        The rainwater harvesting involves collecting water in the same way, but it puts the water through a filtration system so that the water can then be supplier to the house. Unfortunately not all houses are appliable as the size of the roof must be adequate to supply the household, in addition the land must have sufficient space in order to place the tank.
      </p>
    </div>
    <div id="even" class="col-md-6">
      <?php if($_SESSION['is_logged_in']){
            $user_House = new House($Conn);
            $User_House = $user_House->getHouse();
            if($User_House){
              if($User_House['garden_width']*$User_House['garden_length'] >= 0){
                $rainwater_harvest_system_profit = ((($User_House['house_length'] * $User_House['house_width'])/ 0.01266769)*0.11639*138.18)/100;
                $rainwater_harvest_system_payback_low = 1000/$rainwater_harvest_system_profit;
                $rainwater_harvest_system_payback_High = 4000/$rainwater_harvest_system_profit; ?>
                <h2>Estimated Price:</h2>
                <h1>Rainwater Collection System: £35-£100<br>Rainwater Harvesting System: £1000-£4000</h1>
                <h2>Estimated Water Bill savings per Year:</h2>
                <h1>Rainwater Collection System: minimal<br>Rainwater Harvesting System: <?php  echo(round($rainwater_harvest_system_profit, 2)); ?></h1>
                <h2>Payback Time:</h2>
                <h1>Rainwater Collection System: Never<br>Rainwater Harvesting System: <?php  echo(round($rainwater_harvest_system_payback_low, 2)); ?>-<?php  echo(round($rainwater_harvest_system_payback_high, 2)); ?> Years</h1>
                <p><small>Information may not be accurate due to the house's circumstance that can not be accounted for.</small></p>
              <?php } else {?>
                <h3>Your house does not meet the requirements to accomidate this eco housing option as it requires space to put either by the side of the house or underground.<h3>
            <?php }} else { ?>
              <h3>Enter your house details for accurate information about this eco housing option.</h3>
      <?php }} else { ?>
        <h3>Login / Register and enter your house details for accurate information about this eco housing option.</h3>
      <?php } ?>
    </div>
  </div>
  <div id="odd" class="row">
    <h2>How it will be installed:</h2>
    <p>For a rainwater harvesting system a small excavation pit is dug to place the water tank in and is easily filled in and your garden will look just like it did before.<br>
      For the rainwater collection system a cut is made on a downwards gutter pipe that is slightly higher than level in which the water enters the water butt or rain barrel. This is so that the collector can be placed between the two pipes and connected to the water butt or rain barrel. The water butt or rain barrel should be placed on a level surface.
    </p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p>The rainwater collection system will be used in the garden at the gardener’s leisure whereas the rainwater harvesting system will be connected to the house and can be used at any time. The house will still be connected to the main water supply so if the tank does run out of water the house will still be able to get water.</p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>The rain cycle is as follows. the rain evaporates in to the atmoshpere due to the energy of the sun, then the rain condensates as it cools down to form rain clouds, finally, when the rain cloud become dense enough it precipitated. In the precipitation phase some of the rain lands on the house. <br>
      In order to collect the rainwater that land on the roofs of houses a guttering system is installed. The gutters should have already been installed when the house was first created to try and prevent any water damage from happening to the walls of the house.<br>
      The water then falls down the side of the guttering and into the collector. When the water butt or rain barrel is full the collector overflows and goes into the drainage system.<br>
      However, the rainwater harvesting system follow a different system where the rain is put into a tank which is installed under ground where the water can be filtered, stored and used by the house as a main source of water, but can also use the water mains as backup encase of lacked of rain water.
    </p>
  </div>
</div>
