<div class="container">
  <h1 class="mb-4 pb-2">Thermostat</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>Individual room thermostats otherwise own as multizone heating allows the homeowner to control different parts of the house with different temperatures. This allow the homeowner to choose what parts of the house they want heated. This does depend on the setup that is installed as there are two types of systems, zones and every radiator. If the zones are installed then every radiator in that zone will activate until the temperature has been met. However if a control device is installed on every radiator each room can be controlled, assuming there is a radiator in each room.</p>
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
    <p>If the zone system is going to be installed it is recommended that a professional is contacted to install the system for the house. This is due to the fact that the thermostat has to be connected to the inter and the boiler and the other thermostats. This process can get very complicated so a professional will be needed.<br>
        If the individual room control is going to be installed it can be done by the homeowner. The steps are as follows, turn the radiator off and let it cool down, remove the old radiator control, apply the correct adapter to the value body (this will depend on what value body is installed), insert the batteries into the new radiator control device, fit it onto the radiator and connect the control device to the thermostat, smart device or a phone app.
    </p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p>Each thermostat will be in control of a set of radiators. These zone will not be chosen by the homeowner but by the plumber who installed the radiators. These thermostats can be control separately using the physical device or the app it is connected to.<br>
      For the individual room control system, it can be controlled via the app it is connected to, using the physical device by rotating it to change the temperature or a schedule can be set up to save energy automatically. The batteries will have to be replaced every time the homeowner is notified on the app.
    </p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>The aim of these devices is to give the homeowner more control over what is heated and what is not to reduce the energy used on heating rooms that are not used. In addition these device allow the rooms in the house to be different temperatures at the same thereby making everybody in the house more comfortable by choosing their own temperature they want.</p>
  </div>
</div>
