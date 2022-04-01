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
