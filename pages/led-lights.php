<div class="container">
  <h1 class="mb-4 pb-2">Led Lights</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>Light emitting diode (LED) use electric current to release photons which emit light. Whereas a halogen use a lot more current to heat up a filament that produce light and heat. Therefore in order to reduce energy used to light house LED can be installed.</p>
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
    <p>Depending on the light fixture different types of LED light will need to be installed. However they are design to be removed and installed in the same way as the previous light bulb.</p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p>LED lights are used as any other lights are used. However, in order to save energy even more only use lights when necessary and turn them off when leaving the room. Unlike other types of lights LEDs have no negative side effects from turning them on and off. </p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>LED are semiconductors where bring two slightly different materials together which have a positive and a negative charge. The gap between the two materials is called the PN junction. When voltage is applied to the diode a reaction between the two materials occur and emits light.<br>
      Whereas halogen bulb uses a much greater electric current that passes through a thin tungsten filament which is encapsulated in a quartz capsule which is filled with a gas. The gas is used to allow the particles that burns off the tungsten as the current passes through it to be reused through the halogen cycle.
    </p>
  </div>
</div>
