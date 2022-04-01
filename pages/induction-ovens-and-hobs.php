<div class="container">
  <h1 class="mb-4 pb-2">Induction Cooking</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>Induction hobs directly heat the pan or tray by using magnetic fields to generate energy. This is better than the traditional hob which use gas, electric rings or heating elements which generate heat which is then transferred to the pan or tray. This reduces heating time, and which reduces the fuels  or electric bills depending on what system the homeowner is upgrading from. It is safer the hob only heats the pan or tray, so the hob is cool as soon as the pan is removed. </p>
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
    <p>In order to install a new appliance the old device has to be disconnected and removed. Then depending on if the homeowner is installing the same or different size hob or oven, changes made need to be made in order to fit the new device. However, once the correct size is made the device can be fitted the new device is connected and fitted. If there is no fitting such as electrically sockets then some will need to be installed by an electrician.</p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p>The hob can be used as any other hob but has to be used with the correct equipment in order to function.</p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>This Induction hobs relies on the principle of magnetic induction. This uses eddy currents which are excited in a ferromagnetic cookware when in the presence of an oscillating magnetic field. These induced currents dissipate heat by the Joule effect, generating the heat for cooking directly in the cooking vessel. As such, less heat is lost in inefficient thermal conduction between heating element and cookware. To generate sufficient heat for cooking, cookware must be used that has relatively high permeability and resistivity. Due to induction cookers operating at frequency between 25 kHz and 50 kHz the cookware must be ferromagnetic, such as cast iron and some alloys of stainless steel. cookware made from copper, aluminium and non-magnetic alloys of stainless steel.</p>
  </div>
</div>
