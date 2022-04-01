<div class="container">
  <h1 class="mb-4 pb-2">Recycling</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Description:</h2>
      <p>The UK government is making a nationwide effort to try and make recycling easier for the people. They are doing this by making companies responsible for what they produce. They are making more market for recycled materials and are improving recycling collection from households. </p>
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
    <p>There are products that can be brought to put the bins in but as long as they are put in a moderately level location which is sheltered from the wind so it does not get tipped over in the wind it will be fine.</p>
  </div>
  <div id="even" class="row">
    <h2>Instructions:</h2>
    <p></p>
  </div>
  <div id="odd" class="row">
    <h2>The science:</h2>
    <p>Do not bag the item when putting them in the bin and make sure the items are clean and dry. There are only certain item that are allowed to be recycled and the list is constantly expanding as technology is developed to recycle new materials but as it stands the following materials can be recycled:<br>
      -	Aerosol cans<br>
      -	Aluminium foil and trays<br>
      -	Cardboard<br>
      -	Metal food and drink cans<br>
      -	Paper, newspapers, magazines and junk mail<br>
      -	Paperback and hardback books<br>
      -	Plastic bathroom and household cleaning products<br>
      -	Plastic bottles<br>
      -	Plastic yoghurt pots, tubs and food trays<br>
      Anything else cannot be recycled and be put into the waste bin or go to a disposal site. It is always best to check the products to see if they have a recycling sign on it which means that it can be recycled.
    </p>
  </div>
</div>
